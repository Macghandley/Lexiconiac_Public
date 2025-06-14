<?php

use Lexiconiac\CMS\Source;

require_login();

$source = [];
$deleted = null;

$member_id = $_SESSION['id'] ?? false;
if (!$member_id) {
    include APP_ROOT . '/src/pages/page-not-found.php';  
}

if (!$id) {                                               // If valid id
    redirect('sources/', ['failure' => 'Source not found']); // Redirect with error
}

$source = $cms->getSource()->get($id);
if (!$source) {
    redirect('sources/', ['failure' => 'Source not found']); // Redirect with error
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {              
    if ($id) {                                           
        $deleted  = $cms->getSource()->deleteFromMember($id, $member_id);   
        if ($deleted  === true) {               
            redirect('sources/' . $_SESSION['username'], ['success' => 'Source deleted']); // Redirect with error
        }
        if ($deleted  === false) {                        // If contains articles
            redirect('sources/' . $_SESSION['username'], ['failure' => 'Source contains words that must be moved or deleted before you can delete the source']); // Redirect
        }
    }
}

$data['source'] = $source;                            // Category data for template
echo $twig->render('delete_source.html', $data);  // Render Twig template