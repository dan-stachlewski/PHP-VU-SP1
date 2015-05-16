<!-- Up to pp319 PHP Solutions -->
<?php 

require_once('connection.php');
$conn = dbConnect('read', 'pdo');

//prepare the SQL query
$sql = 'SELECT * FROM coding';

//submit the query and capture the result
$result = $conn->query($sql);

$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
	$error = $errorInfo[2];
} else {
	//find out how many records were retrieved
	$numRows = $result->rowCount();
}

?>

<!DOCTYPE html>
<html lang="en" />
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Dan Stachlewski" />
	<meta name="description" content=" " />
	<meta name="keywords" content=" " />
	<title>PHP PDO Connection &amp; Display</title>
</head>
<body>
<h1>PDO Connect and Data Retrieval</h1>
<p><a href="index.php">Return Home</a></p>
<p><a href="mysqli.php">MySQLi Example.</a></p>
<h2>We are QUERYING the <br /> <small>- Database = phpsol</small> <br /> <small> - Table = coding</small> <br /> <small> How many RECORDS are in the TABLE = coding?</small> </h2>

<?php 

if (isset($error)) {
	echo "<p>$error</p>";
} else {
	echo "<p>A total of $numRows records were found!</p>";

?>
<h2><small> <a name="all">Results</a> of <br />QUERYING <br />RETRIEVING = ALL (*) RECORDS <br />FROM the TABLE = coding:</small> </h2>

<table>
	<tr>
		<th>image_id</th>
		<th>filename</th>
		<th>caption</th>
	</tr>
<?php foreach ($conn->query($sql) as $row) { ?>
	<tr>
		<td><?= $row['image_id'];  ?></td>
		<td><?= $row['filename'];  ?></td>
		<td><?= $row['caption'];   ?></td>
	</tr>
	<?php } ?>
</table>
	<?php } ?>

<?php 

require_once('connection.php');
$conn = dbConnect('read', 'pdo');

//prepare the SQL query
$sql = 'SELECT filename, caption FROM coding ORDER BY caption';

//submit the query and capture the result
$result = $conn->query($sql);

$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
	$error = $errorInfo[2];
} else {
	//find out how many records were retrieved
	$numRows = $result->rowCount();
}

?>

<h2><small> <a name="fileNameCaption">Results</a> of <br />QUERYING <br />RETRIEVING filename, caption RECORDS <br />FROM the TABLE = coding:</small> </h2>

<table>
	<tr>
		<!-- <th>image_id</th> -->
		<th>filename</th>
		<th>caption</th>
	</tr>
<?php foreach ($conn->query($sql) as $row) { ?>
	<tr>
		<!-- <td><?= $row['image_id'];  ?></td> -->
		<td><?= $row['filename'];  ?></td>
		<td><?= $row['caption'];   ?></td>
	</tr>
	<?php } ?>
</table>

<?php 

require_once('connection.php');
$conn = dbConnect('read', 'pdo');

//prepare the SQL query
$sql = 'SELECT * FROM coding ORDER BY caption';

//submit the query and capture the result
$result = $conn->query($sql);

$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
	$error = $errorInfo[2];
} else {
	//find out how many records were retrieved
	$numRows = $result->rowCount();
}

?>

<h2><small> <a name="orderByCaption">Results</a> of <br />QUERYING <br />RETRIEVING = ALL (*) RECORDS <br />FROM the TABLE = coding<br /> ORDER BY caption:</small> </h2>

<table>
	<tr>
		<th>image_id</th>
		<th>filename</th>
		<th>caption</th>
	</tr>
<?php foreach ($conn->query($sql) as $row) { ?>
	<tr>
		<td><?= $row['image_id'];  ?></td>
		<td><?= $row['filename'];  ?></td>
		<td><?= $row['caption'];   ?></td>
	</tr>
	<?php } ?>
</table>

<?php 

require_once('connection.php');
$conn = dbConnect('read', 'pdo');

//prepare the SQL query
$sql = 'SELECT * FROM coding ORDER BY caption DESC';

//submit the query and capture the result
$result = $conn->query($sql);

$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
	$error = $errorInfo[2];
} else {
	//find out how many records were retrieved
	$numRows = $result->rowCount();
}

?>

<h2><small> <a name="orderByCaptionDesc">Results</a> of <br />QUERYING <br />RETRIEVING = ALL (*) RECORDS <br />FROM the TABLE = coding<br /> ORDER BY caption<br /> in DESCENDING order:</small> </h2>

<table>
	<tr>
		<th>image_id</th>
		<th>filename</th>
		<th>caption</th>
	</tr>
<?php foreach ($conn->query($sql) as $row) { ?>
	<tr>
		<td><?= $row['image_id'];  ?></td>
		<td><?= $row['filename'];  ?></td>
		<td><?= $row['caption'];   ?></td>
	</tr>
	<?php } ?>
</table>

<?php 

require_once('connection.php');
$conn = dbConnect('read', 'pdo');

//prepare the SQL query
$sql = 'SELECT * FROM coding WHERE image_id = 6';

//submit the query and capture the result
$result = $conn->query($sql);

$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
	$error = $errorInfo[2];
} else {
	//find out how many records were retrieved
	$numRows = $result->rowCount();
}

?>

<h2><small> <a name="searchByImageID6">Results</a> of <br />QUERYING <br />RETRIEVING = ALL (*) RECORDS <br />FROM the TABLE = coding<br /> WHERE image_id = 6:</small> </h2>

<table>
	<tr>
		<th>image_id</th>
		<th>filename</th>
		<th>caption</th>
	</tr>
<?php foreach ($conn->query($sql) as $row) { ?>
	<tr>
		<td><?= $row['image_id'];  ?></td>
		<td><?= $row['filename'];  ?></td>
		<td><?= $row['caption'];   ?></td>
	</tr>
	<?php } ?>
</table>

<?php 

require_once('connection.php');
$conn = dbConnect('read', 'pdo');

//prepare the SQL query
$sql = 'SELECT * FROM coding WHERE image_id > 4 ORDER BY caption DESC';

//submit the query and capture the result
$result = $conn->query($sql);

$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
	$error = $errorInfo[2];
} else {
	//find out how many records were retrieved
	$numRows = $result->rowCount();
}

?>

<h2><small> <a name="searchByImageID4">Results</a> of <br />QUERYING <br />RETRIEVING = ALL (*) RECORDS <br />FROM the TABLE = coding<br /> WHERE image_id > 4<br /> ORDER BY caption DESC:</small> </h2>

<table>
	<tr>
		<th>image_id</th>
		<th>filename</th>
		<th>caption</th>
	</tr>
<?php foreach ($conn->query($sql) as $row) { ?>
	<tr>
		<td><?= $row['image_id'];  ?></td>
		<td><?= $row['filename'];  ?></td>
		<td><?= $row['caption'];   ?></td>
	</tr>
	<?php } ?>
</table>


<?php 

require_once('connection.php');
$conn = dbConnect('read', 'pdo');

//prepare the SQL query
$sql = 'SELECT * FROM coding WHERE caption LIKE "%html5%"';

//submit the query and capture the result
$result = $conn->query($sql);

$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
	$error = $errorInfo[2];
} else {
	//find out how many records were retrieved
	$numRows = $result->rowCount();
}

?>

<h2><small> <a name="searchLikehtml5">Results</a> of <br />QUERYING <br />RETRIEVING = ALL (*) RECORDS <br />FROM the TABLE = coding<br /> WHERE caption LIKE "%html5%":</small> </h2>

<table>
	<tr>
		<th>image_id</th>
		<th>filename</th>
		<th>caption</th>
	</tr>
<?php foreach ($conn->query($sql) as $row) { ?>
	<tr>
		<td><?= $row['image_id'];  ?></td>
		<td><?= $row['filename'];  ?></td>
		<td><?= $row['caption'];   ?></td>
	</tr>
	<?php } ?>
</table>

<?php 

require_once('connection.php');
$conn = dbConnect('read', 'pdo');

//prepare the SQL query
$sql = 'SELECT * FROM coding WHERE caption LIKE "%python%"';

//submit the query and capture the result
$result = $conn->query($sql);

$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
	$error = $errorInfo[2];
} else {
	//find out how many records were retrieved
	$numRows = $result->rowCount();
}

?>

<h2><small> <a name="searchLikepython">Results</a> of <br />QUERYING <br />RETRIEVING = ALL (*) RECORDS <br />FROM the TABLE = coding<br /> WHERE caption LIKE "%python%":</small> </h2>

<table>
	<tr>
		<th>image_id</th>
		<th>filename</th>
		<th>caption</th>
	</tr>
<?php foreach ($conn->query($sql) as $row) { ?>
	<tr>
		<td><?= $row['image_id'];  ?></td>
		<td><?= $row['filename'];  ?></td>
		<td><?= $row['caption'];   ?></td>
	</tr>
	<?php } ?>
</table>


<?php 

require_once('connection.php');
$conn = dbConnect('read', 'pdo');

//prepare the SQL query
$sql = 'SELECT * FROM coding WHERE caption LIKE BINARY "%PHP%"';

//submit the query and capture the result
$result = $conn->query($sql);

$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
	$error = $errorInfo[2];
} else {
	//find out how many records were retrieved
	$numRows = $result->rowCount();
}

?>

<h2><small> <a name="searchLikeBinaryPHP">Results</a> of <br />QUERYING <br />RETRIEVING = ALL (*) RECORDS <br />FROM the TABLE = coding<br /> WHERE caption LIKE BINARY "%PHP%":</small> </h2>

<table>
	<tr>
		<th>image_id</th>
		<th>filename</th>
		<th>caption</th>
	</tr>
<?php foreach ($conn->query($sql) as $row) { ?>
	<tr>
		<td><?= $row['image_id'];  ?></td>
		<td><?= $row['filename'];  ?></td>
		<td><?= $row['caption'];   ?></td>
	</tr>
	<?php } ?>
</table>

</body>
</html>