<?php
declare(strict_types = 1);                                 

require_login();
$id = $_SESSION['id'] ?? false; // Retrieve member_id from session
if (!$id) {// If no valid id
    include APP_ROOT . '/src/pages/page-not-found.php';  // Page not found
}

$data['data'] = $id;

echo $twig->render('index.html', $data);                             // Render Twig template
