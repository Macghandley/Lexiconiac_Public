<?php
declare(strict_types = 1);    

require_login();
$member_id = $_SESSION['id'] ?? false;
if (!$member_id) {
    include APP_ROOT . '/src/pages/page-not-found.php';  
}

$source = $cms->getSource()->getSourceFromMember($id, $member_id);
if(!$source)
{                                         
    include APP_ROOT . '/src/pages/page-not-found.php';
}

$words = $cms->getSource()->getWordsFromSource($member_id, $id);
if($words && count($words) > 0)
{           
    $data['words'] = $words;                              
}
else{
    $data['words'] = [];
}

$data['source'] = $source;

echo $twig->render('source.html', $data);         