<?php
declare(strict_types = 1);           // Use strict types

require_login();
$id = $_SESSION['id'] ?? false; // Retrieve member_id from session
if (!$id) {// If no valid id
    include APP_ROOT . '/src/pages/page-not-found.php';  // Page not found
}

$words = $cms->getWord()->getAllFromMember($id);
if(!$words)
{                                        
    include APP_ROOT . '/src/pages/page-not-found.php';  // Page not found
}

//var_dump(value: $words);
$data['words']    = $words;

echo $twig->render('words_display.html', $data);         