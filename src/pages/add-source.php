<?php
declare(strict_types = 1);           // Use strict types

// Part A: Setup
use Lexiconiac\Validate\Validate;

require_login();
$id = $_SESSION['id'] ?? false; // Retrieve member_id from session
if (!$id) {// If no valid id
    include APP_ROOT . '/src/pages/page-not-found.php';  // Page not found
}

$source = '';

$memberSource = [
    'member_id'   => $id,
    'source_id'   => '',
    'color'       => '',
    'date_added'  => date('Y-m-d H:i:s')
];

$errors  = [
    'warning'     => '',
    'source'  => '',
    'color'   => '',
];

$members = $cms->getMember()->getAll();              // Get all members

// Part B: Get and validate form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
    // If form submitted
    $source      = $_POST['source'] ?? null;         // Get source
    $memberSource['color']       = $_POST['color'] ?? null;         // Get color

    if (!$memberSource['member_id']) {
        die("ERROR: Member ID is missing from session.");
    }

    $purifier = new HTMLPurifier();   
    $purifier->config->set('HTML.Allowed', 'p,br,b,i,a[href]'); 
    $source = $purifier->purify($source);

    // Check if all data was valid and create error messages if it is invalid
    $errors['source']    = Validate::isText($source, 1, 254)
        ? '' : 'Source should be 1 - 80 characters.';  // Validate source
    $errors['color']  = Validate::isHexColor($memberSource['color'])
        ? '' : 'Color should be valid hex value.';  // Validate color
    $errors['member']   = Validate::isMemberId($memberSource['member_id'], $members)
        ? '' : 'Not a valid member';                   // Validate member

    $invalid = implode($errors);

    // Part C: Check if data is valid, if so update database
    if ($invalid) {                                                     
        $errors['warning'] = 'Please correct form errors';             
    } else {      
        // Add user's source to the source table if not there already                                                                                          
        $userSource = $cms->getSource()->getSourceInfoBySource($source);  
        if (!$userSource) {     
            $saved = $cms->getSource()->create($source); 
            if ($saved != true) {                                                         
                $errors['warning'] = 'An error occured';
            }
            $userSource = $cms->getSource()->getSourceInfoBySource($source); //Get new source info (mainly to get the new source's id)
        } 
        // If the user doesn't already have the source, add it to memberSource table
        $memberHasSource = $cms->getSource()->getSourceFromMember($userSource['id'], $id);
        if(!$memberHasSource)
        {
            $memberSource['source_id'] = $userSource['id'];
            $saved = $cms->getSource()->createMemberSource($memberSource);                                              
            if ($saved == true) {  
                redirect('sources/');
            } 
        }
        else {                                                         
            $errors['warning'] = 'Source already exists';
            redirect('sources/{{ session.username }}');
        }
    }
}

//$sources = $cms->getSource()->getAllFromMember($id);
$data['source'] = $source;

echo $twig->render('add_source.html', $data);         