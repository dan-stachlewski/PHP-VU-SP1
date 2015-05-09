	
<!DOCTYPE html>
<html lang="en" />
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Dan Stachlewski" />
	<meta name="description" content=" " />
	<meta name="keywords" content=" " />
	<title>Student Interest | VU:</title>
	<link rel="stylesheet" href="css/my-style.css">

</head>

<body>

<nav>
	
</nav>
<header>
	
</header>
<div class="container">


		
	<section id="summary">
				<h2>Thank you.<br />
		                    <small>Your Form had been submitted and someone will contact you in the next 48hrs.</small>
		        <h2><small>Break-down of submitted details:</small></h2>
			    <?php
				   echo '<ol>';
				   foreach ($_GET AS $key=>$value){
				   echo '<li class="success">' .$key.' = '.$value.'</li>';
			  	   }
				   echo '<ol>';
			 	?>
	</section><!-- /END section intro -->



		


</div>
<footer>
	<div class="legal">
	<h3><?php echo 'Copyright &copy; ' . date('Y'); ?></h3>	
	<h3>
		Footscray Nicholson Campus<br />
		<small>Victoria University.</small>
	</h3>
	
		
	</div>
</footer>


</body>
</html>