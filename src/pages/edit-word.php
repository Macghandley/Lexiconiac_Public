<?php
use Lexiconiac\Validate\Validate;      

require_login();
$member_id = $_SESSION['id'] ?? false; // Retrieve member_id from session
if (!$member_id) {// If no valid id
    include APP_ROOT . '/src/pages/page-not-found.php';  // Page not found
}

// To insert into word table
$word = [
    'member_id'         => $member_id,
    'source_id'         => '',
    'rating'            => '',
    'word_id'           => '',
    'word'              => '',
    'definition'        => '',
    'date_added'        => date('Y-m-d H:i:s'),
    'antonyms'          => '',
    'synonyms'          => '',
    'part_of_speech'    => '',
    'first_known_use'   => '',
    'etymology'         => '',
    'stems'             => '',
];

$sources = [];

$errors  = [
    'warning' => '',
    'source'  => '',
    'color'   => '',
];

// If word id doesn't exist
if (!$id) {                                             
    redirect('words/' . $_SESSION['username'], ['failure' => 'Word does not exist']); 
}

// Retrieve word
$word = $cms->getWord()->getWord($id, $member_id);
if (!$word) {                                     
    redirect('words/' . $_SESSION['username'], ['failure' => 'Word not found']); 
}
$word['member_id'] = $member_id;
$word['date_added'] = date('Y-m-d H:i:s');

$sources = $cms->getSource()->getAllFromMember($member_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {             
    $word['word'] = $_POST['word']; 
    $word['source_id'] = $_POST['source_id'];
    $word['rating'] = $_POST['rating'];

    $invalid = (Validate::isText($word['word'], 1, 254))
        ? '' : 'Words should be 1 - 254 characters.';
    $invalid = (Validate::isNumber($word['source_id'], 1, 100000))
        ? '' : 'Source ID is invalid.';
    
    if ($invalid) {                                      
        $warning = 'Please correct error below';         
    } else {
        // Add user's word to the word table if not there already
        $userWord = $cms->getWord()->getWordInfoByWord($word['word']);
        if(!$userWord){
            $saved = $cms->getWord()->create($word); 
            if ($saved != true) {                                                         
                $errors['warning'] = 'An error occured';
            }
            $userWord = $cms->getWord()->getWordInfoByWord($word['word']); //Get new word info (mainly to get the new word's id)
        }
        $word['word_id'] = $userWord['id']; //Set var for later
        // If the user doesn't already have the new word, add it to member_word table and delete the old word
        $memberHasWord = $cms->getWord()->getWordFromMember($userWord['id'], $member_id);
        if(!$memberHasWord)
        {
            $saved = $cms->getWord()->createMemberWord($word);                                              
            if ($saved == true) {  
                $cms->getWord()->delete($id, $member_id); 
                redirect('word/' . $word['word_id'] . '/' . $_SESSION['username']);
            } 
        }
        else{
            //member has word already, update the rating or Source
            $cms->getWord()->update($word, $id); 
            redirect('word/' . $id . '/' . $_SESSION['username']);
        }
    }

}

$data['word'] = $word;  
$data['sources'] = $sources;                           
$data['errors']  = $errors;                             

echo $twig->render('edit_word.html', $data);  