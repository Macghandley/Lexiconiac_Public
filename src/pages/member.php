<?php
declare(strict_types = 1);                               // Use strict types

require_login();
if (!$id) {                                              // If no valid id
    include APP_ROOT . '/src/pages/page-not-found.php';     // Page not found
}

$member = $cms->getMember()->get($id);                   // Get member data
if (!$member) {                                          // If array is empty
    include APP_ROOT . '/src/pages/page-not-found.php';     // Page not found
}

$data['words']        = $cms->getWord()->getAll($id);             // Get categories
$data['member']      = $member;                                   // Member data
$data['success']     = $_GET['success'] ?? '';                    // Success message if present
$data['sources']    = $cms->getSource()->getAll(); // Get member's articles

echo $twig->render('member.html', $data);                         // Render Twig template