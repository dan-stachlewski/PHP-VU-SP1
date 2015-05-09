<?php 

/***********************************************************
 * PHP DATA OBJECTS [PDO]
/***********************************************************
  * VIDEO: connectDatabase.mp4
/***********************************************************
 * LOCATION: \Chapter11_13DavidPowers\videos\Week 11-17
/***********************************************************
 * - A flexible way to connect to an database
 * - This type of connection helps protect against SQL INJECTION
 * - Uses PHP Object Orients Programming [OOP] Methods
 *
/***********************************************************
 * 1. Connect to dbase
/***********************************************************
 * - Place all config data into an array
 * - Save in a separate file/folder config.php
 * - db 			= array()
 * - host 			=> 'localhost'
 * - username 		=> 'root'
 * - password 		=> 'password'
 * - dbase name 	=> 'website'
 */

$config['db'] 	= array(
	'host'		=> 'localhost',
	'username'	=> 'root',
	'password'	=> 'password',
	'dbname'	=> 'website'
);


/***********************************************************
 * 2. Instantiate PDO Class
/***********************************************************
 * - Create a new instance of PDO
 * - Pass in the parameters to be used by the Constructor Function
 * - $db = new PDO('mysql:host='x';dbname='x', $username, $password);
 * - 'mysql:' = driver name or dbase/package name we are using
 * - Created the Object = $db
 */

$db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);



?>

