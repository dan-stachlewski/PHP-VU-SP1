<?php 

if (isset($_GET['go'])) {
    require_once('connection.php');
    $conn = dbConnect('read');
    $searchterm = '%' . $conn->real_escape_string($_GET['search']) . '%';
    $sql = "SELECT * FROM coding WHERE caption LIKE '$searchterm'";

    $result = $conn->query($sql);
    if (!$result) {
        $error = $conn->error;
    } else {
        $numRows = $result->num_rows;
    }
}   

?>
<!DOCTYPE html>
<html lang="en" />
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Dan Stachlewski" />
    <meta name="description" content=" " />
    <meta name="keywords" content=" " />
    <title>MySQLi | Inserting a String</title>
</head>
<body>
<h1>Please enter a Search query below:</h1>
<?php 

if (isset($error)) {
    echo "<p>$error</p>";
}

?>

<form method="GET" action="">
    <input type="search" name="search" id="search">
    <input type="submit" name="go" id="go" value="Search">
</form>

<?php if (isset($numRows)) { ?>
<p>Number of results for <b><?= htmlentities($_GET['search']); ?></b>: <?= $numRows; ?> records.</p>

<?php if ($numRows) { ?>
<table>
    <tr>
        <th>image_id</th>
        <th>filename</th>
        <th>caption</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['image_id']; ?></td>
        <td><?= $row['filename']; ?></td>
        <td><?= $row['caption']; ?></td>
    </tr>
    <?php } ?>
</table>
<?php } 
}
?>

</body>
</html>