<?php
use Lexiconiac\Validate\Validate;      

require_login();
$member_id = $_SESSION['id'] ?? false; // Retrieve member_id from session
if (!$member_id) {// If no valid id
    include APP_ROOT . '/src/pages/page-not-found.php';  // Page not found
}

// To insert into source table
$source = [
    'id'          => '',
    'member_id'   => $member_id,
    'source_id'   => $id,
    'source'      => '',
    'color'       => '',
    'date_added'  => date('Y-m-d H:i:s')
];

$sources = [];

$errors  = [
    'warning' => '',
    'source'  => '',
    'color'   => '',
];

// If source id doesn't exist
if (!$id) {                                             
    redirect('sources/', ['failure' => 'Source doesn\'t exist']); 
}

// Retrieve source
$source = $cms->getSource()->getSourceFromMember($id, $member_id);
if (!$source) {                                     
    redirect('sources/' . $_SESSION['username'], ['failure' => 'Source not found']); 
}
$source['member_id'] = $member_id;
$source['date_added'] = date('Y-m-d H:i:s');

$sources = $cms->getSource()->getAllFromMember($member_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {             
    $source['source'] = $_POST['source']; 
    $source['color'] = $_POST['color'];

    $invalid = (Validate::isText($source['source'], 1, 254))
        ? '' : 'Sources should be 1 - 254 characters.';
    $invalid = (Validate::isHexColor($source['color']))
        ? '' : 'Hex is invalid.';
    
    if ($invalid) {                                      
        $warning = 'Please correct error below';         
    } else {
        // Add user's source to the source table if not there already
        $userSource = $cms->getSource()->getSourceInfoBySource($source['source']);
        if(!$userSource){
            $saved = $cms->getSource()->create($source['source']); 
            if ($saved != true) {                                                         
                $errors['warning'] = 'An error occured';
            }
            $userSource = $cms->getSource()->getSourceInfoBySource($source['source']); //Get new source info (mainly to get the new source's id)
        }
        $source['source_id'] = $userSource['id']; //Set var for later
        // If the user doesn't already have the new source, add it to member_source table and delete the old source
        $memberHasSource = $cms->getSource()->getSourceFromMember($source['source_id'], $member_id);
        if($memberHasSource == false)
        {
            
            $cms->getSource()->update($source);
            //$cms->getSource()->deleteFromMember($id, $member_id, true); 
            redirect('source/' . $source['source_id'] . '/' . $_SESSION['username']);
        }
        else{
            //member has source already, update the color or Source      
            $cms->getSource()->update($source); 
            redirect('source/' . $source['source_id'] . '/' . $_SESSION['username']);
        }
    }
}

$data['source'] = $source;  
$data['sources'] = $sources;                           
$data['errors']  = $errors;                             

echo $twig->render('edit_source.html', $data);  