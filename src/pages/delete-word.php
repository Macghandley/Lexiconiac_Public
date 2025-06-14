<?php

use Lexiconiac\CMS\Word;

require_login();

$word = [];
$deleted = null;

$member_id = $_SESSION['id'] ?? false;
if (!$member_id) {
    include APP_ROOT . '/src/pages/page-not-found.php';  
}

if (!$id) {                                             
    redirect('words/' . $_SESSION['username'], ['failure' => 'Word not found']);
}

$word = $cms->getWord()->getWord($id, $member_id);
if (!$word) {
    redirect('words/' . $_SESSION['username'], ['failure' => 'Word not found']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {              
    if ($id) {                                           
        $deleted  = $cms->getWord()->delete($id, $member_id);   
        if ($deleted  === true) {               
            redirect('words/' . $_SESSION['username'], ['success' => 'Word deleted']); 
        }
        if ($deleted  === false) {                       
            redirect('words/' . $_SESSION['username'], ['failure' => 'Word not deleted']); 
        }
    }
}

$data['word'] = $word;                           
echo $twig->render('delete_word.html', $data); 