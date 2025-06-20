<?php
define('APP_ROOT', dirname(__FILE__, 2));                // Root directory

require APP_ROOT . '/src/functions.php';                 // Functions
require APP_ROOT . '/config/config.php';                 // Configuration data
require APP_ROOT . '/vendor/autoload.php';               // Autoload libraries

if (DEV === false) {
    set_exception_handler('handle_exception');           // Set exception handler
    set_error_handler('handle_error');                   // Set error handler
    register_shutdown_function('handle_shutdown');       // Set shutdown handler
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cms = new \Lexiconiac\CMS\CMS($dsn, $username, password: $password, config: $webster_api_config); // Create CMS object
unset($dsn, $username, $password, $webster_api_config);                       // Remove database config data

$twig_options['cache'] = APP_ROOT . '/var/cache';        // Path to Twig cache folder
$twig_options['debug'] = DEV;                            // If dev mode, turn debug on

$loader = new Twig\Loader\FilesystemLoader(APP_ROOT . '/templates'); // Twig loader
$twig   = new Twig\Environment($loader, $twig_options);  // Twig environment
$twig->addGlobal('doc_root', DOC_ROOT);                  // Document root

$session = $cms->getSession();                           // Create session
$twig->addGlobal('session', $session);                   // Add session to Twig global

if (DEV === true) {                                      // If in development
    $twig->addExtension(new \Twig\Extension\DebugExtension()); // Add Twig debug extension
}