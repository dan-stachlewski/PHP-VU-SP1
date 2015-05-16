<?php 

require_once('connection.php');
$conn = dbConnect('read');

$sql = 'SELECT * FROM images';

$result = $conn->query($sql);

if (!$result) {
	$error = $conn->error;
} else {
	$numRows = $result->num_rows;
}

?>

<!DOCTYPE html>
<html lang="en" />
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Dan Stachlewski" />
	<meta name="description" content=" " />
	<meta name="keywords" content=" " />
	<title>MySQLi Connection &amp; Display</title>
</head>
<body>

<h1>MySQLi Connect and Data Retrieval</h1>
<p><a href="index.php">Return Home</a></p>
<p><a href="pdo.php">PDO Example.</a></p>
<h2>We are QUERYING the <br /> <small>- Database = phpsol</small> <br /> <small> - Table = Images</small> <br /> <small> How many RECORDS are in the TABLE = images?</small> </h2>
<?php 

if (isset($error)) {
	echo "<p>$error</p>";
} else {
	echo "<p>A total of $numRows records were found!</p>";

?>

<h2><small> Results of <br />QUERYING <br />RETRIEVING = ALL (*) RECORDS <br />FROM the TABLE = images:</small> </h2>
<table>
	<tr>
		<th>image_id</th>
		<th>filename</th>
		<th>caption</th>
	</tr>
<?php while ($row = $result->fetch_assoc()) { ?>
	<tr>
		<td><?= $row['image_id'];  ?></td>
		<td><?= $row['filename'];  ?></td>
		<td><?= $row['caption'];   ?></td>
	</tr>
	<?php } ?>
</table>



	<?php } ?>
</body>
</html>