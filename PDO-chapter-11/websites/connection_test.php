<?php 

require_once ('connection.php');
if ($conn = dbConnect('read', 'pdo')){
	echo 'Read Connection Successful!<br />';
}

if ($conn = dbConnect('write', 'pdo')){
	echo 'Write Connection Successful!<br />';
}
