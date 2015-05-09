<!DOCTYPE htmL>
<html>
<head>
	<title>Future Students | Victoria University</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859" />
</head>
<body>
<div id="page-wrapper">

<!--
This is the code that takes the submitted information and prints it out in a table for the teacher to look at. Don't need to do anything other than paset the below code into the success.php page and copy the css from the index page!
-->
<?php
 echo '<table border="1">';
   foreach ($_GET AS $key=>$value){
	  echo '<tr>';	
      echo '<td><h3/>' .$key.'</td><td>'.$value.'<h3/></td>';
	  echo '</tr>';
   }
 echo '</table>';
 ?>



</div><!-- /END page-wrapper -->


	
</body>
</html>