<?php

// Define PROJECT PATH
define('PROJECT_PATH', dirname(__FILE__).'/');
define('APP_PATH', PROJECT_PATH.'app/');

// Load Autoloader
require APP_PATH."splclassloader.class.php";
$classLoader = new SplClassLoader(null, APP_PATH);
$classLoader->setFileExtension('.class.php');
$classLoader->register();

// In debug mode, display errors
if(Config::get_safe('debug', false)){
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

// Language
Lang::load(empty($_GET["hl"]) ? Config::get("lang") : $_GET["hl"]);

// Start session
ini_set('session.cookie_httponly', 1);
session_start();