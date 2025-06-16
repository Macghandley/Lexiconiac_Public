<?php
declare(strict_types = 1);         

require_login();
$id = $_SESSION['id'] ?? false; 
if (!$id) {
    include APP_ROOT . '/src/pages/page-not-found.php';  
}

$words = $cms->getWord()->getAllFromMember($id);

$data['words'] = $words;

echo $twig->render('words_display.html', $data);         