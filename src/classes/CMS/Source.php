<?php
namespace Lexiconiac\CMS;

class Source
{
    protected $db;          // Holds ref to Database object

    public function __construct(Database $db)
    {
        $this->db = $db;    // Store ref to Database object
    }

    public function get(int $id)
    {
        $sql = "SELECT *
                FROM source    
                WHERE id = :id"; // SQL statement
        return $this->db->runSql($sql, [$id])->fetch();  // Return source
    }
    
    public function getSourceFromMember(int $source_id, int $member_id)
    {
        $sql = "SELECT s.*, ms.member_id, ms.color
                FROM source s
                JOIN member_source ms ON s.id = ms.source_id
                WHERE s.id = :source_id AND ms.member_id = :member_id
                LIMIT 1;";

        $params = [
            'source_id' => $source_id,
            'member_id' => $member_id
        ];

        return $this->db->runSQL($sql, $params)->fetch();
    }

    public function getSourceInfoBySource (string $source)
    {
        $sql = "SELECT * FROM source WHERE source = :source LIMIT 1";
        $params = ['source' => $source];
        $stmt = $this->db->runSQL($sql, $params)->fetch();

        return $stmt ?: null;
    }

    public function getAll()
    {
        $sql = "SELECT * 
                FROM `source` 
                WHERE 1";
        return $this->db->runSql($sql)->fetchAll();
    }

    public function getAllFromMember(int $member_id)
    {
        $sql = "SELECT s.*, ms.color, ms.date_added
                FROM source s
                JOIN member_source ms ON s.id = ms.source_id
                WHERE ms.member_id = :member_id
                ORDER BY ms.id DESC";

        return $this->db->runSQL($sql, ['member_id' => $member_id])->fetchAll();
    }

    public function getAllFromMemberAlphabetical(int $member_id)
    {
        $sql = "SELECT s.*, ms.color, ms.date_added
                FROM source s
                JOIN member_source ms ON s.id = ms.source_id
                WHERE ms.member_id = :member_id
                ORDER BY s.source ASC";

        return $this->db->runSQL($sql, ['member_id' => $member_id])->fetchAll();
    }


    public function getWordsFromSource(int $member_id, $source_id){
        $sql = "SELECT w.id, w.word 
        FROM member_word mw
        JOIN word w ON mw.word_id = w.id
        WHERE mw.source_id = :source_id AND mw.member_id = :member_id";

        $params = ['member_id' => $member_id, 'source_id' => $source_id];
        return $this->db->runSql($sql, $params)->fetchAll();
    }

    public function doesMemberHaveSource(int $member_id, string $source)
    {
        // Does user have a source with the same name as the input source?
        $sql = "SELECT COUNT(*) 
                FROM source 
                WHERE member_id = :member_id AND source = :source";

        $stmt = $this->db->runSQL($sql, ['member_id' => $member_id, 'source' => $source]);

        return $stmt->fetchColumn() > 0;
    }

    public function create(string $source)
    {
        try{
            $this->db->beginTransaction();     
            $sql = "INSERT INTO source (source)
                    VALUES (:source);"; 
            $this->db->runSQL($sql, ['source' => $source]);           
            $this->db->commit();                         
            return true;                                 
        } catch (\PDOException $e) {  
            $this->db->rollBack();                       
            if ($e->errorInfo[1] === 1062) {             
                return false;                            
            } else {                                     
                throw $e;                                
            }
        }
    }

    public function createMemberSource(array $source)
    {
        try{
            $this->db->beginTransaction();      
            $sql = "INSERT INTO member_source (source_id, member_id, color, date_added)
                    VALUES (:source_id, :member_id, :color, :date_added)"; 
            $params = [
                'source_id'          => $source['source_id'],
                'member_id'          => $source['member_id'],
                'color'              => $source['color'],
                'date_added'         => $source['date_added']
            ];
            $this->db->runSQL($sql, $params);          
            $this->db->commit();                         
            return true;                                 
        } catch (\PDOException $e) {  
            $this->db->rollBack();                       
            if ($e->errorInfo[1] === 1062) {             
                return false;                            
            } else {                                     
                throw $e;                               
            }
        }
    }

    // Update existing source
    public function update(array $source)
    {
        try {                                            
            $this->db->beginTransaction();      
        
            // Update member_source
            $sql = "UPDATE member_source 
                       SET source_id = :source_id,
                           color = :color,
                           date_added = :date_added
                     WHERE member_id = :member_id
                       AND source_id = :old_source_id;";     

            $params = [
                'source_id'        => $source['source_id'],
                'member_id'        => $source['member_id'],
                'color'            => $source['color'],
                'date_added'       => $source['date_added'],
                'old_source_id'    => $source['id']
            ];     

            $this->db->runSQL($sql, $params)->rowCount();  // Update source
            
            // Update all member_word records pointing to the old source_id
            $wordParams = [
                'source_id'     => $source['source_id'],
                'member_id'     => $source['member_id'],
                'old_source_id' => $source['id']
            ];
            $sql = "UPDATE member_word
                       SET source_id = :source_id
                     WHERE member_id = :member_id
                       AND source_id = :old_source_id;";

            $this->db->runSQL($sql, $wordParams);
            $this->db->commit();                         // Commit transaction

            return true;                                 // Update worked
        } catch (\PDOException $e) {                     // If PDOException was raised
            $this->db->rollBack();                       // Rollback transaction
            if ($e->errorInfo[1] === 1062) {             // If an integrity constraint
                return false;                            // Return false
            } else {                                     // For all other reasons
                throw $e;                                // Re-throw exception
            }
        }
    }

    public function deleteFromMember(int $source_id, int $member_id): bool
    {
        try {
            // Check for any member_word linked to this source and member
            $checkSql = "SELECT COUNT(*) as count 
            FROM member_word 
            WHERE source_id = :source_id AND member_id = :member_id;";
            $params = [
                'source_id' => $source_id,
                'member_id' => $member_id,
            ];
            $result = $this->db->runSQL($checkSql, $params)->fetch();   

            // There are words linked to this source for this member — cannot delete
            if (($result && $result['count'] > 0)) {    
                return false;
            }

            // If no words associated, or this is an update to a source, delete source
            $sql = "DELETE FROM member_source WHERE source_id = :source_id AND member_id = :member_id;";   
            $this->db->runSQL($sql, $params);                  
            return true;                                     
        } catch (\PDOException $e) {                     
            if ($e->errorInfo[1] === 1451) {             
                return false;                            
            } else {                                     
                throw $e;                                
            }
        }
    }
}