<?php
//index file as dispatcher;
//start a session. Use for authenciation. 
session_start(); 
//declare PATH as current directory.
define('PATH', realpath(dirname(__FILE__)). "/");
//include necessary files.
require_once(PATH.'Library/database.php');
require_once(PATH.'Library/request.php');
require_once(PATH.'Library/router.php');
require_once(PATH.'Library/load.php');
require_once(PATH.'Library/mainController.php');

//create a new question. and send it to the router.
$request = new Request();
Router::route($request);

?>