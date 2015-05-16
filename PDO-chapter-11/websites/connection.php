<?php 

function dbConnect($usertype, $connectionType = 'mysqli') {

	$host = 'localhost';
	$db = 'websites';
	
	if ($usertype == 'read') {
		$user = 'psread';
		$pwd = 'K1u0mi$u';
	} elseif ($usertype == 'write') {
		$user = 'pswrite';
		$pwd = '0Ch@Nom1$u';
	} else {
		exit('Unrecognised user');
	}
	//connection goes here
	if ($connectionType == 'mysqli') {
		$conn = @ new mysqli($host, $user, $pwd, $db);
		if ($conn->connect_error) {
			exit($conn->connect_error);
		}
		return $conn;
	} else {
		try {
			return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}