<?php 

require_once('connection.php');
$conn = dbConnect('read', 'pdo');

/***
 * prepare the SQL query (from prev examples)
 ** 
 * $sql = 'SELECT * FROM images';
 * 
 * 
 */
//prepare the new SQL query
$getImages = 'SELECT image_id, filename FROM coding';

?>

<!DOCTYPE html>
<html lang="en" />
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Dan Stachlewski" />
	<meta name="description" content=" " />
	<meta name="keywords" content=" " />
	<title>PDO | Integer Insertion SQL</title>
</head>
<body>

<form action="" method="GET">
	<select name="image_id">
		<?php foreach ($conn->query($getImages) as $row) { ?>
		<option value="<?= $row['image_id']; ?>"
			<?php if (isset($_GET['image_id']) && $_GET['image_id'] == $row['image_id']) {
			echo 'selected';
			} ?>
		><?= $row['filename']; ?>
		</option>
		<?php } ?>
	</select>
	<input type="submit" name="go" value="Display">
</form>

<?php 

if (isset($_GET['image_id'])) {
	if (!is_numeric($_GET['image_id'])) {
		$image_id = 1;
	} else {
		$image_id = (int) $_GET['image_id'];
	}
	$sql = "SELECT filename, caption 
			FROM coding 
			WHERE image_id = $image_id";
	$result = $conn->query($sql);
	if ($result->rowCount()) {
		$row = $result->fetch();
?>
<figure>
	<img src="images/<?= $row['filename']; ?>">
	<figcaption><?= $row['caption']; ?></figcaption>
</figure>
<?php } else { ?>
	<p>Image not Found! <br />Please Choose another.</p>
<?php } 

}?>

</body>
</html>