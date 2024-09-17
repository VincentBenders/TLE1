<?php
//Require settings and autoload
require_once 'settings.php';
// require_once 'vendor/autoload.php';

//start session
session_start();

//Set variable for errors
$errors = [];

//Set variable for verification toggle
$db = \classes\Database::connect();
$verification = \classes\Admin::checkToggle($db);
\classes\Database::disconnect();

//Copied code courtesy of Antwan
try {
    //Get the url from the .htaccess rewrite & check existence (if not: 404!)
    $currentPage = (!isset($_GET['_url']) || $_GET['_url'] == '' ? 'home' : $_GET['_url']);
    $phpFile = $currentPage . '.php';
    if (!file_exists(INCLUDES_PATH . 'pages/' . $phpFile)) {
        header('HTTP/1.0 404 Not Found');
        $phpFile = '404.php';
    }

    //Require file for logic
    require_once 'pages/' . $phpFile;

    //Use output buffers to capture template data from require statement and store in $content
    ob_start();
    require_once 'pages/templates/' . $phpFile;
    $content = ob_get_clean();


    //Set allowed pages for unverified and blacklisted users
    if ($_SESSION['role_id'] == 4 && $verification['toggle'] == 1 || $_SESSION['role_id'] == 3 || empty($_SESSION['role_id'])) {

        $allow = match ($currentPage) {
            'home', 'login', 'logout', 'register', 'profile', 'userDelete', 'userUpdate', '404', 'about' => true,
            default => false
        };

        if (!$allow) {
            header('location: home');
            exit;
        }

    }

} catch (Exception $e) {
    //Set error
    $errors[] = 'Oops, try to fix your error please: ' . $e->getMessage() . ' on line ' . $e->getLine() . ' of ' . $e->getFile();
}