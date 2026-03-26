<?php
declare(strict_types = 1);        

require_login();
$member_id = $_SESSION['id'] ?? false;
if (!$member_id) {
    include APP_ROOT . '/src/pages/page-not-found.php';  
}

$word = $cms->getWord()->getWord($id, $member_id);
if(!$word)
{                                         
    include APP_ROOT . '/src/pages/page-not-found.php';  
}

$data['word']    = $word;
$data['warning'] = $_GET['warning'] ?? '';

echo $twig->render('word.html', $data);         