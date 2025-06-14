<?php
declare(strict_types = 1);       // Use strict types

require_login();
$id = $_SESSION['id'] ?? false; // Retrieve member_id from session
if (!$id) {// If no valid id
    include APP_ROOT . '/src/pages/page-not-found.php';  // Page not found
}

$data['words']    = $cms->getWord()->getAll(); // Get latest words
$data['sources']  = $cms->getSource()->getAllFromMember($id);  // Get sources

echo $twig->render('sources_display.html', $data);         