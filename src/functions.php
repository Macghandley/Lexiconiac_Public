<?php

// UTILITY FUNCTIONS
function redirect(string $location, array $parameters = [], $response_code = 302)
{
    $qs = $parameters ? '?' . http_build_query($parameters) : '';  // Create query string
    $location = $location . $qs;                                   // Create new path
    header('Location: ' . DOC_ROOT . $location, $response_code);   // Redirect to new page
    exit;                                                          // Stop code
}

function require_login() {
    if (empty($_SESSION['id'])) {
        header('Location: ' . DOC_ROOT . 'login');
        exit;
    }
}

function create_filename(string $filename, string $uploads): string
{
    $basename  = pathinfo($filename, PATHINFO_FILENAME);          // Get basename
    $extension = pathinfo($filename, PATHINFO_EXTENSION);         // Get extension
    $cleanname = preg_replace("/[^A-z0-9]/", "-", $basename);     // Clean basename
    $filename  = $cleanname . '.' . $extension;                   // Destination
    $i         = 0;                                               // Counter
    while (file_exists($uploads . $filename)) {                   // If file exists
        $i        = $i + 1;                                       // Update counter
        $filename = $basename . $i . '.' . $extension;            // New filename
    }
    return $filename;                                             // Return filename
}

// Convert Merriam-Webster's internal markup tokens (e.g. {it}word{/it}, {dx_ety}see {dxt|word||}{/dx_ety})
// into real HTML so fields like etymology display properly instead of showing the raw tokens.
function format_mw_markup(?string $text): string
{
    if ($text === null || $text === '') {                        // If nothing to format
        return '';                                                // Return empty string
    }

    // Cross-reference tokens, e.g. {dxt|consanguineous||} -> italicized referenced word
    $text = preg_replace_callback('/\{dxt\|([^|}]*)\|?[^}]*\}/', function ($m) {
        return '<i>' . htmlspecialchars($m[1], ENT_QUOTES, 'UTF-8') . '</i>';
    }, $text);

    // Other link-style tokens, e.g. {a_link|word}, {d_link|text|target} -> plain text
    $text = preg_replace_callback('/\{(?:a_link|d_link|i_link|et_link|dx_def)\|([^|}]*)\|?[^}]*\}/', function ($m) {
        return $m[1];
    }, $text);

    // "See also" wrapper - unwrap it, its contents (already handled above) remain
    $text = str_replace(['{dx_ety}', '{/dx_ety}', '{dx}', '{/dx}'], '', $text);

    // Italics / bold / small caps
    $text = str_replace(['{it}', '{/it}'], ['<i>', '</i>'], $text);
    $text = str_replace(['{b}', '{/b}'], ['<b>', '</b>'], $text);
    $text = str_replace(['{sc}', '{/sc}'], ['<span class="mw-smallcaps">', '</span>'], $text);

    // Sub/superscript
    $text = str_replace(['{inf}', '{/inf}'], ['<sub>', '</sub>'], $text);
    $text = str_replace(['{sup}', '{/sup}'], ['<sup>', '</sup>'], $text);

    // Curly quotes
    $text = str_replace(['{ldquo}', '{rdquo}'], ['&ldquo;', '&rdquo;'], $text);

    // Bold colon, used by MW to separate clauses
    $text = str_replace('{bc}', ': ', $text);

    // Phrase / word-indicator wrappers -> italic
    $text = str_replace(
        ['{phrase}', '{/phrase}', '{wi}', '{/wi}', '{qword}', '{/qword}'],
        ['<i>', '</i>', '<i>', '</i>', '<i>', '</i>'],
        $text
    );

    // Gloss wrapper -> parenthetical plain text
    $text = str_replace(['{gloss}', '{/gloss}'], ['(', ')'], $text);

    // Safety net: strip any remaining/unrecognized MW tokens so none ever leak to the page
    $text = preg_replace('/\{\/?[a-z_]+(\|[^}]*)?\}/i', '', $text);

    return $text;                                                 // Return formatted HTML
}

// ERROR AND EXCEPTION HANDLING FUNCTIONS
// Convert errors to exceptions
function handle_error($error_type, $error_message, $error_file, $error_line)
{
    throw new ErrorException($error_message, 0, $error_type, $error_file, $error_line); // Turn into ErrorException
}

// Handle exceptions - log exception and show error message (if server does not send error page listed in .htaccess)
function handle_exception($e)
{
    error_log($e);                        // Log the error
    http_response_code(500);              // Set the http response code
    echo "<h1>Sorry, a problem occurred</h1>   
          The site's owners have been informed. Please try again later.";
}

// Handle fatal errors
function handle_shutdown()
{
    $error = error_get_last();            // Check for error in script
    if ($error !== null) {                // If there was an error next line throws exception
        $e = new ErrorException($error['message'], 0, $error['type'], $error['file'], $error['line']);
        handle_exception($e);             // Call exception handler
    }
}