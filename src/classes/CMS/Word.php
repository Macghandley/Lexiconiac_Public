<?php
declare(strict_types = 1);
namespace Lexiconiac\CMS;
use Lexiconiac\Validate\Validate;
use Twig\Node\Expression\FunctionExpression;

class Word
{
    protected $db;          // Holds ref to Database object
    protected $dictionary_api_key;
    protected $thesaurus_api_key;

    public function __construct(Database $db, array $config)
    {
        $this->db = $db;    // Store ref to Database object
        $this->dictionary_api_key = $config['dictionary_api_key'];
        $this->thesaurus_api_key  = $config['thesaurus_api_key'];
    }

    public function getWord(int $word_id, int $member_id)
    {
        $sql = "SELECT w.*, mw.rating, mw.date_added AS member_word_date_added,  s.source AS source_name
            FROM word w
            LEFT JOIN member_word mw ON w.id = mw.word_id AND mw.member_id = :member_id
            LEFT JOIN source s ON mw.source_id = s.id
            WHERE w.id = :word_id
            LIMIT 1;";

        $params = [
            'word_id' => $word_id,
            'member_id' => $member_id
        ];

        return $this->db->runSQL($sql, $params)->fetch();
    }

    public function getWordFromMember(int $word_id, int $member_id)
    {
        $sql = "SELECT w.*, mw.rating, mw.source_id
                FROM word w
                JOIN member_word mw ON w.id = mw.word_id
                WHERE w.id = :word_id AND mw.member_id = :member_id
                LIMIT 1;";

        $params = [
            'word_id' => $word_id,
            'member_id' => $member_id
        ];

        return $this->db->runSQL($sql, $params)->fetch();
    }

    public function getWordInfoByWord(string $word): ?array
    {
        $sql = "SELECT * FROM word WHERE word = :word LIMIT 1";
        $params = ['word' => $word];
        $stmt = $this->db->runSQL($sql, $params)->fetch();

        return $stmt ?: null;
    }

    public function getAll()
    {
        $sql = "SELECT * 
                FROM word";
        return $this->db->runSql($sql)->fetchAll();
    }

    public function getAllFromMember(int $member_id)
    {
        $sql = "SELECT w.*, ms.color
            FROM word w
            JOIN member_word mw ON w.id = mw.word_id
            JOIN member_source ms ON mw.source_id = ms.source_id AND ms.member_id = mw.member_id
            WHERE mw.member_id = :member_id
            ORDER BY mw.id DESC";

        $params = ['member_id' => $member_id];

        return $this->db->runSQL($sql, $params)->fetchAll();
    }


    public function search(string $word): array
    {
        $arguments['word1'] = '%' . $word . '%';         // Add wildcards to search term
        $sql = "SELECT *
                FROM word AS w
                WHERE w.word LIKE :word1
                ORDER BY w.id DESC;";
        return $this->db->runSql($sql, $arguments)->fetchAll();
    }

    public function count(): int
    {
        $sql = "SELECT COUNT(id) FROM word;";
        return $this->db->runSql($sql)->fetchColumn();   // Return count from result set
    }

    private function fetchAndDecode ($word, $ref, $key) 
    {
        $url = sprintf(
            'https://dictionaryapi.com/api/v3/references/%s/json/%s?key=%s',
            urlencode($ref),
            urlencode($word),
            urlencode($key)
        );

        $response = @file_get_contents($url);

        if ($response === false) {
            throw new \RuntimeException("Failed to fetch data from API: $url");
        }

        $data = json_decode($response, true);
        if (!is_array($data)) {
            throw new \RuntimeException("Invalid JSON response for $ref lookup");
        }

        return $data;
    }

    private function extractDefinitionsAsHtmlList($shortdefArray): string {
        $definitions = [];

        // Check if the expected structure exists
        if (!isset($shortdefArray) || !is_array($shortdefArray)) {
            return "<p>No definition found.</p>";
        }

        $output = "<ul>\n";

        foreach ($shortdefArray as $def) {
            // Escape HTML special characters to prevent injection
            $escapedDef = htmlspecialchars($def, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            $output .= "  <li>{$escapedDef}</li>\n";
        }

        $output .= "</ul>";

        return $output;
    }

    // Add word entry into the word table
    public function create(array $word): bool
    {
        try{                                            
            // Query to Webster dictionary API
            $dictionaryData = $this->fetchAndDecode($word['word'], 'collegiate', $this->dictionary_api_key);
            $thesaurusData  = $this->fetchAndDecode($word['word'], 'thesaurus', $this->thesaurus_api_key);
            $definition = $this->extractDefinitionsAsHtmlList($dictionaryData[0]['shortdef']);
            // var_dump($definition);
            // exit;
            
            // Extract fields from API responses to populate $word   
            $word['date_added']       = date('Y-m-d H:i:s');
            // $word['definition']       = $dictionaryData[0]['shortdef'][0] ?? 'Not defined';
            $word['definition']       = $definition ?? 'No Definition Found';
            $word['part_of_speech']   = $dictionaryData[0]['fl'] ?? 'unknown';
            $word['first_known_use']  = $dictionaryData[0]['date'] ?? '';
            $word['etymology']        = isset($dictionaryData[0]['et']) ? implode('. ', $dictionaryData[0]['et'][0]) : 'No etymology found';
            $word['stems']            = isset($dictionaryData[0]['meta']['stems']) ? implode(', ', $dictionaryData[0]['meta']['stems']) : 'No stems found';
            $word['synonyms'] = isset($thesaurusData[0]['meta']['syns'][0]) 
                ? implode(', ', $thesaurusData[0]['meta']['syns'][0]) 
                : 'No synonyms were found';
            $word['antonyms'] = isset($thesaurusData[0]['meta']['ants'][0]) 
                ? implode(', ', $thesaurusData[0]['meta']['ants'][0]) 
                : 'No antonyms were found';

            //var_dump(array_keys($word));

            $this->db->beginTransaction();  

            $params = [
                'word'             => $word['word'],
                'definition'       => $word['definition'],
                'antonyms'         => $word['antonyms'],
                'synonyms'         => $word['synonyms'],
                'part_of_speech'   => $word['part_of_speech'],
                'first_known_use'  => $word['first_known_use'],
                'etymology'        => $word['etymology'],
                'stems'            => $word['stems'],
                'date_added'       => $word['date_added']
            ];
            
            $sql = "INSERT INTO word (word, definition, antonyms, synonyms,
                                      part_of_speech, first_known_use, etymology, stems, date_added) 
                    VALUES (:word, :definition, :antonyms, :synonyms,
                            :part_of_speech, :first_known_use, :etymology, :stems, :date_added);"; 

            $this->db->runSQL($sql, $params);
            $this->db->commit();           
            return true;                                 
        } catch (\PDOException $e) {
            $this->db->rollBack();
            // If error is integrity constraint
            if (($e instanceof PDOException) and ($e->errorInfo[1] === 1062)) { 
                return false;                            
            } else {                                     
                throw $e;                                
            }
        }
    }

    // Add an entry to the member_word table, with a reference to a word in the word table
    public function createMemberWord(array $word): bool
    {
        try {
            $this->db->beginTransaction();

            //var_dump(array_keys($word));

            $params = [
                'member_id'        => $word['member_id'],
                'word_id'          => $word['word_id'],
                'source_id'        => $word['source_id'],
                'rating'           => $word['rating'],
                'date_added'       => $word['date_added']
            ];
            var_dump($params);

            $sql = "INSERT INTO member_word 
                    (member_id, word_id, source_id, rating, date_added) 
                    VALUES 
                    (:member_id, :word_id, :source_id, :rating, :date_added)";

            $this->db->runSQL($sql, $params);
            $this->db->commit();

            return true;
        } catch (\PDOException $e) {
            $this->db->rollBack();
            // Handle duplicate entry (e.g. same member_id + word_id combo)
            if ($e->errorInfo[1] === 1062) {
                return false;
            } else {
                throw $e;
            }
        }
    }

    public function update(array $word, int $old_word_id) : bool {
        try {
            $this->db->beginTransaction(); 
    
            $sql = "UPDATE member_word
                       SET word_id = :word_id,
                           source_id = :source_id,
                           date_added = :date_added,
                           rating = :rating
                     WHERE member_id = :member_id
                       AND word_id = :old_word_id;";
    
            $params = [
                'word_id'          => $word['word_id'],
                'source_id'        => $word['source_id'],
                'rating'           => $word['rating'],
                'date_added'       => $word['date_added'],
                'member_id'        => $word['member_id'],
                'old_word_id'      => $old_word_id             
            ];
    
            $this->db->runSQL($sql, $params);
            $this->db->commit();
            return true;
    
        } catch (\PDOException $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function delete(int $word_id, int $member_id): bool
    {
        $sql = "DELETE FROM member_word WHERE word_id = :word_id AND member_id = :member_id;";
        $params = [
            'word_id' => $word_id,
            'member_id' => $member_id,
        ];
        $this->db->runSql($sql, $params);
        return true;                           
    }
}