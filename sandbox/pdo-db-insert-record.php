<?php 

include ('pdo-db-connect.php');

$db->query("
	INSERT INTO `articles`
	(`articles`.`title`, `articles`.`description` )
	VALUES ('What the Ipsum is going on here?', 'Four dollar toast kitsch chia crucifix. Roof party cliche lumbersexual ugh trust fund cardigan polaroid, artisan deep v fingerstache bicycle rights sartorial meditation locavore. Pug scenester photo booth Pinterest, migas pop-up beard XOXO keytar wolf DIY Shoreditch YOLO tilde. Locavore actually forage, single-origin coffee Thundercats tofu mustache slow-carb XOXO. Bespoke leggings organic, freegan chia direct trade')
");
header('Location: posts.php?id=' . $db->lastInsertId());
exit();

?>