<?php
declare(strict_types = 1);           // Use strict types

// Part A: Setup
use Lexiconiac\Validate\Validate;

require_login();
$member_id = $_SESSION['id'] ?? false; // Retrieve member_id from session
if (!$member_id) {// If no valid id
    include APP_ROOT . '/src/pages/page-not-found.php';  // Page not found
}

$sources = $cms->getSource()->getAllFromMemberAlphabetical($member_id);
if(!$sources)
{                                         // If article array is empty
    include APP_ROOT . '/src/pages/page-not-found.php';  // Page not found
}

// To insert into word table
$word = [
    'word'              => '',
    'definition'        => '',
    'date_added'        => '',
    'antonyms'          => '',
    'synonyms'          => '',
    'part_of_speech'    => '',
    'first_known_use'   => '',
    'etymology'         => '',
    'stems'             => '',
];

// To insert into member_word table
$memberWord = [
    'member_id'   => $member_id,
    'word_id'     => '',
    'source_id'   => '',
    'rating'      => '',
    'date_added'  => date('Y-m-d H:i:s')
];

$errors  = [
    'warning' => '',
    'source'  => '',
    'color'   => '',
];

$members = $cms->getMember()->getAll();         

// Part B: Get and validate form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{    
    $word['word']       = $_POST['word'] ?? null;  
    $memberWord['source_id']  = $_POST['source_id'] ?? null;        
    $memberWord['rating']     = $_POST['rating'] ?? null;      

    if (!$memberWord['member_id']) {
        die("ERROR: Member ID is missing from session.");
    }

    $purifier = new HTMLPurifier();   
    $purifier->config->set('HTML.Allowed', 'p,br,b,i,a[href]'); 
    $word['word'] = $purifier->purify($word['word']);

    // Check if all data was valid and create error messages if it is invalid
    $errors['word'] = Validate::isText($word['word'], 1, 254)
        ? '' : 'Word should be 1 - 80 characters.'; 
    $errors['source_id'] = Validate::isNumber($memberWord['source_id'], 1, 10000)
        ? '' : 'source_id should be 1 - 10000 characters.';  
    $errors['rating'] = Validate::isNumber($memberWord['rating'], 0, 10)
        ? '' : 'source should be 1 - 254 characters.';  
    $errors['member'] = Validate::isMemberId($memberWord['member_id'], $members)
        ? '' : 'Not a valid member';                  

    $invalid = implode($errors);

    // Part C: Check if data is valid, if so update database
    if ($invalid) {                                                     
        $errors['warning'] = 'Please correct form errors';             
    } else {   
        // Add user's word to the word table if not there already
        $userWord = $cms->getWord()->getWordInfoByWord($word['word']);  
        if (!$userWord) {     
            $saved = $cms->getWord()->create($word); 
            if ($saved != true) {                                                         
                $errors['warning'] = 'An error occured';
            }
            $userWord = $cms->getWord()->getWordInfoByWord($word['word']); //Get new word info (mainly to get the new word's id)
        } 
        
        // If the user doesn't already have the word, add it to member_word table
        $memberHasWord = $cms->getWord()->getWordFromMember($userWord['id'], $member_id);
        if(!$memberHasWord)
        {
            $memberWord['word_id'] = $userWord['id'];
            $saved = $cms->getWord()->createMemberWord($memberWord);                                              
            if ($saved == true) {  
                redirect('words/');
            } 
        }
        else {                                                         
            $errors['warning'] = 'Word already exists';
            redirect('words/');
        }
    }
}

$data['word'] = $word;
$data['sources'] = $sources;

echo $twig->render('add_word.html', $data);