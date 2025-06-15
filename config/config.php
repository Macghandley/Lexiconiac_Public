<?php
define('DEV', false);
define('ROOT_FOLDER', 'public');

$this_folder   = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])); 
$parent_folder = dirname($this_folder);                             
define("DOC_ROOT", rtrim($parent_folder, '/') . '/' . ROOT_FOLDER . '/');

// Database settings
$type     = 'mysql';                 
$host     = $_ENV['MYSQLHOST'];       
$db       = $_ENV['MYSQLDATABASE'];     
$port     = $_ENV['MYSQLPORT'];             
$charset  = 'utf8mb4';           
$username = $_ENV['MYSQLUSER'];       
$password = $_ENV['MYSQLPASSWORD'];
$webster_api_config = [
    'dictionary_api_key' => $_ENV['dictionary_api_key'],
    'thesaurus_api_key'  => $_ENV['thesaurus_api_key'],
];

$options = [
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES      => false,
];

$dsn = "$type:host=$host;dbname=$db;port=$port;charset=$charset"; 

// File upload settings
define('UPLOADS', dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR); // Image upload folder
define('MEDIA_TYPES', ['image/jpeg', 'image/png', 'image/gif',]); // Allowed file types
define('FILE_EXTENSIONS', ['jpeg', 'jpg', 'png', 'gif',]);       // Allowed file extensions
define('MAX_SIZE', '5242880');                                    // Max file size

return [
];