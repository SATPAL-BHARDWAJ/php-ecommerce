<?php
require_once 'config/include.php'; 
/**
 * 
 * @author   Satpal Bhardwaj <satpalbhardwaj665@gmail.com>
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && (file_exists(__DIR__.'/resources/assets'.$uri) || file_exists(__DIR__.'/app'.$uri))) {
    return false;
}

require_once __DIR__.'/resources/index.php';