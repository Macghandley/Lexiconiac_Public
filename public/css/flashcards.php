<?php
declare(strict_types = 1);

require_login();
$member_id = $_SESSION['id'] ?? false;                   // Get member id from session
if (!$member_id) {                                        // If no valid member id
    include APP_ROOT . '/src/pages/page-not-found.php';      // Page not found
}

$words = $cms->getWord()->getAllFromMember($member_id);  // Retrieve all of the member's words
$word_count = count($words);                              // Count the member's words

$data['word_count'] = $word_count;                        // Total word count, used by the template

if ($word_count > 0) {                                    // If member has at least one word
    $random_index   = random_int(0, $word_count - 1);        // Generate a random index into the words array
    $random_word_id = $words[$random_index]['id'];           // Get the word id at that random index

    // Load full details for that word (definition, synonyms, source, rating, etc.)
    // the same way the individual word screen does
    $word = $cms->getWord()->getWord($random_word_id, $member_id);
    $word['etymology'] = format_mw_markup($word['etymology'] ?? null); // Convert MW markup tokens to HTML

    $data['word'] = $word;
}

echo $twig->render('flashcards.html', $data);             // Render Twig template
