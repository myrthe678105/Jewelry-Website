<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
require __DIR__ . '/../patternrouter.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);

?>