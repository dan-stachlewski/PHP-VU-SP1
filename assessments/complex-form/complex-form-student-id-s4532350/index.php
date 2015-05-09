<!--
/***
 * FILE NAME: index.php
 * FILE TYPE: HTML5/PHP
 * AUTHOR: Dan Stachlewski
 * DATE: Sun 22nd March - 2015.
 * DESCRIPTION: 
 *  1. Each form must be ‘complex’ – have a minimum of 10 inputs to capture data relevant to registering a student.
 * 2.	Our forms must contain a number of different form elements/input tags:
 * a.	Text Input
 * b.	Text Area
 * c.	Radio
 * d.	Checkbox
 * e.	Select
 * f.	Fieldset etc
 * 3.	The inputs must follow a strict set of criteria:
 * a.	Inputs that are alphabetic characters only
 * b.	Numeric characters only ie; postcode
 * c.	Numeric values with a data range & restrictions that make sense to the data being input
 * 4.	Any errors produced by the user need to be displayed appropriately with the aim to guide the user to successfully complete the form
 * 5.	All data must be validated using:
 * a.	PHP functions to validate all data
 * b.	Regular Expressions
 * c.	Html entities & HTML form validation 
 * d.	
 * 6.	Prepare the form for security against:
 * a.	SQL Injection
 * b.	Cross browser scripting
 * 7.	The form must have a memory, and be able to re-populate data already entered into the form in case there is an error, the page is refreshed or user chooses to go back to change some details
 * 8.	Two pages are required to complete the task:
 * a.	Index.php
 * b.	Success.php
 * 9.	CSS must be used to give the pages a consistent look.
 * 10.	Fully test the website against business requirements.
 * 11.	The success page should display a message advising the user he/she has successfully filled in the form. A summary of the entered data should also be displayed. 

 **
 * COURSE CODE:		DW 505.
 * COURSE TITLE:		Diploma of IT Website Development (ICA50611).
 * UNIT OF STUDY:	Web-database Connectivity A.
 * TEACHER:		Ian Browne.
 * ASSESSMENT TITLE:	Mid Semester Assignment.
 * ASSESSMENT TYPE:	Assignment.
 * WEIGHT:		40% of Final Result for this Unit of study.
 **
 * PRELIMINARY 
 * REPORT 1 DUE DATE:	Week-6 Monday 23rd March – 2014, 17:00hrs 
 * 1.	Basic Report Outline 
 * 2.	Sketch of Contact Form (via email).
 * FINAL REPORT
 * DUE DATE:		Week-8. Monday 13th April – 2015, 17:00hrs.
 * 1.	Solution Formal Report
 * 2.	Folder containing PHP pages w code. (.Zip format via email).
 **
 * STUDENT NAME:	Dan Stachlewski
 * STUDENT NUMBER:	4532350
 *
 **
 * 
 */
 -->
<?php

// FILE UPLOAD VARIABLE DECLARATION
	/*code setup for file-upload
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
	$uploadOK = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	*/ 

// VARIABLE SETTING AND DECLARING BEFORE 1ST USE TO PREVENT ERRORS
	$selectedTitle = '';
	$selectedDay = '';
	$selectedMonth = '';
	$selectedYear = '';
	$selectedCourse = '';
	$fileToUpload = '';

	$male = 'unchecked';
	$female = 'unchecked';
	$other = 'unchecked';
	$yes = 'unchecked';
	$no = 'unchecked';

// START VALIDATION FOR PAGE MAIN ISSET FUNCTION
 if (isset($_POST['submit'])) {
	
	$errors = array();

	// print_r($_POST);

// TITLE DROPDOWN MENU VALIDATION
	$title = $_POST['title'];

	if (isset($_POST)) {

		//Check to see if day has an input
		if ($_POST['title'] === 'no-selection') {
			$errors[] = 'Please select your Title.';
		} else {
			$selectedTitle = $_POST['title'];
		}
		
	}

// FAMILY-NAME & GIVEN-NAMES TEXTBOXES VALIDATION
	if (!empty($_POST) === TRUE) {

		$familyName = $_POST['family-name'];
		$givenName1 = $_POST['given-name-1'];
		$givenName2 = $_POST['given-name-2'];
		
	// FAMILY NAME TEXTBOX VALIDATION

		// 1. Check family-name HAS BEEN ENTERED in $_POST array:
		if (empty($_POST['family-name']) === TRUE) {
			$errors[] = 'You must enter a Family Name.';
		}
			 // 2. Check family-name input DOES NOT contains numbers, letters only
		else { if (ctype_alpha($_POST['family-name']) === FALSE) {
			$errors[] = 'Your Family Name must contain letters only.';
			}
			// 3. Check family-name input IS NOT too long, not > 25 characters
			if (strlen($_POST['family-name']) > 25) {
			$errors[] = 'You Family Name is too long, use max - 25 letters.';
			}
		}


	// GIVEN NAME 1 TEXTBOX VALIDATION
		// 1. Check given-name-1 HAS BEEN ENTERED in $_POST array:
		if (empty($_POST['given-name-1']) === TRUE) {
			$errors[] = 'You must enter a valid First Given Name.';
		}
			 // 2. Check given-name-1 input DOES NOT contains numbers, letters only
		else { if (ctype_alpha($_POST['given-name-1']) === FALSE) {
			$errors[] = 'Your First Given Name must contain letters only.';
			}
			// 3. Check given-name-1 input IS NOT too long, not > 25 characters
			if (strlen($_POST['given-name-1']) > 25) {
			$errors[] = 'You First Given Name is too long, use max - 25 letters.';
			}
		}

	// GIVEN NAME 2 TEXTBOX VALIDATION
		// 1. Check given-name-2 HAS BEEN ENTERED in $_POST array:
		if (empty($_POST['given-name-2']) === TRUE) {
			$errors[] = 'You must enter a valid Second Given Name.';
		}
			 // 2. Check given-name-2 input DOES NOT contains numbers, letters only
		else { if (ctype_alpha($_POST['given-name-2']) === FALSE) {
			$errors[] = 'Your Second Given Name must contain letters only.';
			}
			// 3. Check given-name-2 input IS NOT too long, not > 25 characters
			if (strlen($_POST['given-name-2']) > 25) {
			$errors[] = 'You Second Given Name is too long, use max - 25 letters.';
			}
		}
	} // END (!empty($_POST) === TRUE)

// DOB DROPDOWN MENU VALIDATION
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];

	if (empty($_POST) === FALSE) {

		//Check to see if day has an input
		if ($_POST['day'] === 'no-selection') {
			$errors[] = 'Please select the Day you were born.';
		} else {
			$selectedDay = $_POST['day'];
		}

		//Check to see if month has an input
		if ($_POST['month'] === 'no-selection') {
			$errors[] = 'Please select the Month you were born.';
		} else {
			$selectedMonth = $_POST['month'];
		}

		//Check to see if year has an input
		if ($_POST['year'] === 'no-selection') {
			$errors[] = 'Please select the Year you were born.';
		} else {
			$selectedYear = $_POST['year'];
		}

	}

// GENDER RADIOBUTTON VALIDATION
	if (isset($_POST['gender'])) {
		$gender = $_POST['gender'];

		if ($gender == 'male') {
			$male = 'checked';
		} else if ($gender == 'female') {
			$female = 'checked';
		} else if ($gender == 'other') {
			$other = 'checked';
		}
	} else 
		$errors[] = 'Your Gender needs to be entered!';

// BEST CONTACT TEXTBOX VALIDATION


		$contactNumber = $_POST['best-number'];
		
		// 1. Check best-number HAS BEEN ENTERED in $_POST array:		
		// 2. Check best-number HAS BEEN ENTERED in $_POST array:
			// 3. Check best-number input DOES NOT contains letters, numbers only
			// 4. Check best-number input IS NOT too long, not > 10 numbers

		if (empty($_POST['best-number']) === TRUE) {
			$errors[] = 'You must enter your Best Contact Number.';
				} elseif (is_numeric($_POST['best-number']) === FALSE) {
					$errors[] = 'Your Best Contact Number must contain numbers only.';
						} elseif (!preg_match("/^04/", $contactNumber)) {
							$errors[] = "A valid mobile number needs to start with 04...";
								} elseif (strlen($_POST['best-number']) > 10) {
									$errors[] = 'Your Best Contact Number is too long, use max - 10 numbers.';
										} else {
											$contactNumber = $_POST['best-number'];
										}

// BEST EMAIL TEXTBOX VALIDATION
		$bestEmail = $_POST['best-email'];
		// 1. Check best-email HAS BEEN ENTERED in $_POST array:
		if (empty($_POST['best-email']) === TRUE) {
			$errors[] = 'You must enter your Best Email Address.';
		}
		// 2. Check best-email input DOES NOT contains letters, numbers only
		else { if (!preg_match("/^[\w-]+(\.[\w-]+)*@" . "[\w-]+(\.[\w-]+)*(\.[A-Za-z]{2,})$/i", $_POST['best-email']))  {
			$errors[] = 'You have not entered a Valid Email Address.';
			}
		}

// SELECTED COURSE DROPDOWN MENU VALIDATION
	$selectedCourse = $_POST['course-name'];
	if (empty($_POST) === FALSE) {

		//Check to see if year has an input
		if ($_POST['course-name'] === 'no-selection') {
			$errors[] = 'Please select the Course you are interested in.';
		} else {
			$selectedCourse = $_POST['course-name'];
		}
	}

// STUDY MONTHS TEXTBOX VALIDATION
	$studyMonths = $_POST['study-months'];
	if (empty($_POST['study-months']) || ($_POST['study-months']) === 0) {
		$errors[] = "You need to add the appropriate number of months to study!";
	}

	if ($_POST['study-months'] < 0) {
		$errors[] = "Do you want to study at all this year?";
	} elseif 
		($_POST['study-months'] > 12 ) {
		$errors[] = "We don't offer that many subjects within a year!";
	}

// FAVORITE COURSE TEXTBOX VALIDATION
	// define array to compare input to
	$courseCodes = array(
						'CERT3-IT',
						'CERT4-IT',
						'DIP-IT-NETWRK',
						'DIP-WEB-DEV',
						'DIP-IT',
						'ADV-DIP-IT-NETWRK',
						'ADV-DIP-IT',
						'BA-IT-NETWRK',
						'GRAD-DIP-COMP-SCI',
						'MSTR-SCI',
						'MSTR-APP-IT'
						);

	$favCourseCode = $_POST['favorite-code'];
	
	// check to see if input has - in it
	$courseCheck = strstr($favCourseCode, '-');
	$favCourseCode = strtoupper($_POST['favorite-code']);
	if (!$courseCheck) {
		$errors[] =  "Invalid Input - Course Codes have dashes ' - '.";
		// convert input to uppercase
		} elseif (in_array($favCourseCode, $courseCodes)) {
				$favCourseCode = $_POST['favorite-code'];
			} else {
				$errors[] =  "Invalid Course Code! Refer to chosen Courses Menu below.";	
		}
	// check to see if input begins with any of these words
							
// PRIOR LEARNING RADIOBUTTON VALIDATION
 /*	if (isset($_POST['prior-learning'])) {
		$priorLearning = $_POST['prior-learning'];

		if ($priorLearning == 'yes') {
			$yes = 'checked';
		} else if ($priorLearning == 'no') {
			$no = 'checked';
		}
	} else 
		$errors[] = "You need to acknowledge YES or NO for Prior Learning.";
 */

// SUPPORTING DOCUMENTATION FILE UPLOAD VALIDATION

	/* 
	1. Make sure php.ini file has been config for file upload
	File name: php.ini
	Location: c:/xampp/php
	Code: file_uploads = On

	2. Create web page that allows file upload functionality

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
	</head>
	<body>
		<form action='<?php echo($_SERVER["PHP_SELF"]) ?>' method="POST" enctype="multipart/form-data">
		Select flie to upload:
		<input type="file" name="fileToUpload" id="fileToUpload" />
		<input type="submit" value="Upload Image" name="submit" />
		</form>
	</body>
	</html>

	3. Form must use method='POST'
	4. Form needs the attribute: enctype="multipart/form-data";

		// ERROR ARRAY - Loop through the array elements contents to display error messages
			if (!empty($errors))
				foreach ($errors as $error) {
					echo "";
				} else {
				 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded."; 
				} else 	    
					    $post_url = 'success.php?';
	    /*this code redirects the user to a success.php page so that they do not keep refreshing this page and resubmitting
	    the same information.  It also allows us to redispaly the correctly submitted information.  It is not normally necessary to display 
	    this information as it would usually be inserted into a database table!!!
	  
				    foreach ($_POST AS $key=>$value){
				      $post_url .= $key.'='.$value.'&';
				    }
				    $post_url = rtrim($post_url, '&');
				    header('Location:' .$post_url);
				    exit();
				  }







	// Check if image file is an actual image or fake image
		$check = getimagesize($_FILES['fileToUpload']['tmp_name']);
		if($check !== FALSE) {
			echo "File is an image - " . $check['mime'] . ".";
			$uploadOK = 1;
		} else {
			$errors[] = "File is not an image.";
			$uploadOK = 0;
		}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    $errors[] = "Sorry, your file was not uploaded.";
	} 

	  */

// WHY STUDY TEXTAREA VALIDATION
	$whyStudy = $_POST['why-study-at-vu'];
	// 1. Check why-study-at-vu HAS BEEN ENTERED in $_POST array:
	if (empty($_POST['why-study-at-vu']) === TRUE) {
		$errors[] = 'You must enter why you want to study at Vic Uni - Footscray Campus.';
	}
		// 2. Check why-study-at-vu input IS NOT too long, not > 500 letters
	else { if (strlen($_POST['why-study-at-vu']) > 500) {
		$errors[] = 'Your entry is too long, use max - 500 characters.';
		}
	}
	// ERROR ARRAY - Loop through the array elements contents to display error messages
		if (!empty($errors))
			foreach ($errors as $error) {
				echo "";
			} else {  
				    $post_url = 'success.php?';
    /*this code redirects the user to a success.php page so that they do not keep refreshing this page and resubmitting
    the same information.  It also allows us to redispaly the correctly submitted information.  It is not normally necessary to display 
    this information as it would usually be inserted into a database table!!!
    */
			    foreach ($_POST AS $key=>$value){
			      $post_url .= $key.'='.$value.'&';
			    }
			    $post_url = rtrim($post_url, '&');
			    header('Location:' .$post_url);
			    exit();
			  }

// END VALIDATION FOR PAGE MAIN ISSET FUNCTION
} // END isset($_POST['submit'])

/*
EXTRA FILE UPLOAD VALIDATION
	// Check if file already exists
	if (file_exists($target_file)) {
		$errors[] = "Sorry, the selected file already exists.";
		$uploadOK = 0;
	}

	// Limit file size
	if ($_FILES['fileToUpload']['size'] > 500000) {
		$errors[] = "Sorry, the file is too large.";
		$uploadOK = 0;
	}

	// Limit file type/allow certain formats
	if ($imageFileType != 'jpg' && $imageFileType != 'png'&& $imageFileType != 'jpeg' && $imageFileType != 'gif') {
		$errors[] = "Invalid File Type. JPG, JPEG, PNG &amp; GIF Files allowed.";
		$uploadOK = 0;
	}
*/ 

?>	
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

	<!-- Jscript to hide/display file upload based on radiobutton being licked to yes. if no then field and input stays hidden -->
	<script type="text/javascript">
	function showHide() {
		var radio = document.getElementById("chk");
		var hiddeninputs = document.getElementByClassName("hidden");

		for (var i =0; i != hiddeninputs.length; i++) {
			if (radio.checked) {
				hiddeninputs[i].style.display = "block"; 
				} else { 
					hiddeninputs[].style.display = "none";
			}
		}
	 }
	</script>
</head>

<body>
<!-- NAVBAR CODE -->
	<nav>

	</nav>

<!-- HEADER CODE -->
	<header>

	</header>

<!-- CONTAINER CODE -->
<div class="container">

 <!-- MAIN SECTION INTRO CODE -->
	
	<section id="intro">
		<h2>Welcome to our Online Student Registration:
			<br />
			<small>It's as simple 4 step process.</small>
		</h2>
		<p>
			1. Fill out the Form. 
				<br />
			2. Follow the prompts.
				<br /> 
			3. Submit you information.
				<br />
			4. Check your email in 24hrs for a response.
		</p>
		<p>
			This Form has been designed to speed up the process of initial student expression of interest and application to register for a course. As a new student this is where you get to introduce yourself, enter your contact information, attach any supporting documentation to help verify and expidite your registration. Just follow the prompts, and if you are having trouble please contact Student Admin on (03) 9345 5868 or by 
			<a href="#">email.</a>
		</p>
		<p>
			Its as simple as 1, 2, 3 and 4. Good luck and welcome to Footscray Nicholson Campus | VU.
		</p>
 <!-- empty p tags left to give space (sloppy) -->
		<p></p>
		</section><!-- /END section intro -->

		<!-- error-output display code -->
		<?php if(!empty($errors)): ?>
		<div class="panel">
		<ol class='error'><li><?php echo implode('</li><li>', $errors); ?></li></ol>
		</div>

		<?php endif; ?>

	<section id="expression-of-interest">

<!-- STUDENT INTEREST FORM -->
	<form id="student-interest" method="POST" action='<?php echo($_SERVER["PHP_SELF"]) ?>' enctype="multipart/form-data">

 <!-- FORM TITLE -->
		<h2>You can start here...<br />
			<br />
				<hr />
			<br />
			<small class="tab">Enter all your details below.</small>
		</h2>
			<br />

<!-- TITLE DROP DOWN MENU CODE -->
		<label class="title">Title</label>	  
		<select class="title" name='title'>
			<!-- this option is default setting on page load -->
			<option value='no-selection'> -- Please select -- </option>
			<!-- the code in value attributes allows the day to be remembered (sticky) -->
			<option value='Mr' <?php if ($selectedTitle === 'Mr') { ?> selected='selected' <?php } ?> >Mr</option>
			<option value='Ms' <?php if ($selectedTitle === 'Ms') { ?> selected='selected' <?php } ?> >Ms</option>
			<option value='Miss' <?php if ($selectedTitle === 'Miss') { ?> selected='selected' <?php } ?> >Miss</option>
			<option value='Mrs' <?php if ($selectedTitle === 'Mrs') { ?> selected='selected' <?php } ?> >Mrs</option>
			<option value='Dr' <?php if ($selectedTitle === 'Dr') { ?> selected='selected' <?php } ?> >Dr</option>
		</select>
			<br />
			<br />

<!-- FAMILY NAME TEXTFIELD CODE -->
		<label class="family-name">Family Name</label>
		<!-- the code in value attribute allows the day to be remembered (sticky) -->
		<input class="family-name" type="text" name="family-name" value='<?php if (isset($_POST["family-name"])=== true) {echo trim($_POST["family-name"]);} ?>'  />
			<br />

<!-- GIVEN NAME-1 TEXTFIELD CODE -->
		<label class="given-name-1">Given Name</label>
		<!-- the code in value attribute allows the day to be remembered (sticky) -->
		<input class="given-name-1" type="text" name="given-name-1" value='<?php if (isset($_POST["given-name-1"])=== true) {echo trim($_POST["given-name-1"]);} ?>'  />
		<br />

<!-- GIVEN NAME-2 TEXTFIELD CODE -->
		<label class="given-name-2">Middle Name</label>
		<!-- the code in value attribute allows the day to be remembered (sticky) -->
		<input class="given-name-2" type="text" name="given-name-2" value='<?php if (isset($_POST["given-name-2"])=== true) {echo trim($_POST["given-name-2"]);} ?>'  />
			<br />
			<br />
			<br />
				<hr />
			<br />
			<br />

<!-- DAY DROP DOWN MENU CODE -->
		<label class="dob">Date of Birth</label>
			<br />
		<div class="dob">
			<label class="day">Day</label>
			<select class="day" name='day'>
				<!-- this option is default setting on page load -->
				<option value='no-selection'> -- Please select -- </option>
				<?php 
				/* <!-- loops through 31 days in month generating menu to choose month born --> */
				for ($i = 1; $i <= 31; $i++) {
				echo '<option value="'.$i.'" ';
						/* <!-- this code allows the day to be remembered (sticky) --> */
							if ($selectedDay == $i) { echo ' selected="selected"'; }
					echo '>'.$i.'</option>';
				}  /* <!-- end for loop --> */
				?>
			</select>
			<br />
		</div><!-- /END dob -->

<!-- MONTH DROP DOWN MENU CODE -->
		<div class="dob">
			<label class="month">Month</label>
			<select class="month" name="month">
				<!-- this option is default setting on page load -->
				<option value='no-selection'> -- Please select -- </option>
				<!-- this array created $key $value pair for months of year -->
				<?php 
					$months = array(
								1 => 'January',
								2 => 'February',
								3 => 'March',
								4 => 'April',
								5 => 'May',
								6 => 'June',
								7 => 'July',
								8 => 'August',
								9 => 'September',
								10 => 'October',
								11 => 'November',
								12 => 'December'
									);
				/* <!-- loops through array generating menu to choose month born --> */
					foreach($months as $day => $month) {
						echo '<option value="' . $day .'"';
				/* <!-- this code allows the month to be remembered (sticky) --> */
						if($selectedMonth == $day) { echo ' selected="selected"'; }
						echo '">' . $month . '</option>';
				} /* <!-- end for loop --> */

				?>
			</select>
			<br />
		</div><!-- /END dob -->

<!-- YEAR DROP DOWN MENU CODE -->
		<!-- DIV used to contain DOB-YEAR drop down menu -->
		<div class="dob">
			<label class="year">Year</label>
			<select class="year" name="year">
				<!-- this option is default setting on page load -->
				<option value='no-selection'> -- Please select -- </option>
				<?php
				/* <!-- defines the upper limit to year selection --> */
				$year = 2000;
				/* <!-- function loops through creating the years to choose from also defines the earliest year to select --> */
				for ($i = $year - 58; $i <= $year + 1; $i++) {
				echo '<option value="'.$i.'" ';
				/* <!-- this code allows the year to be remembered (sticky) --> */
					if ($selectedYear == $i) { echo ' selected="selected"'; }
					echo '>'.$i.'</option>';
				}  /* <!-- end for loop --> */
									?>
			</select>
			<br />
		</div><!-- /END dob -->
			<br />
			<br />
			<br />
			<br />
				<hr />

<!-- GENDER RADIO BUTTONS CODE -->
		<label class="gender" for="Gender"></label>
			<br />
		<!-- DIV used to contain/group and position radio buttons better (sloppy) -->
		<div class="gender-button">	
			<label class="gender" for="Gender">Gender</label>
		</div><!-- /END gender-button -->
			<br />
		<div class="gender-button">	
			<label><input class="gender" type='radio' name='gender' value='male' <?php echo $male ?>/>Male</label>
		</div><!-- /END gender-button -->
		<div class="gender-button">
			<label><input class="gender" type='radio' name='gender' value='female' <?php echo $female ?>/>Female</label>
		</div><!-- /END gender-button -->
		<div class="gender-button">
			<label><input class="gender" type='radio' name='gender' value='other' <?php echo $other ?>/>Other</label>
		</div><!-- /END gender-button -->
			<br />
			<br />
				<hr />
			<br />
			<br />

<!-- BEST CONTACT NUMBER TEXTFIELD CODE -->
		<label class="best-number">Best Contact Number</label>
		<input class="best-number" type="text" name="best-number" value='<?php if (isset($_POST["best-number"])=== true) {echo trim($_POST["best-number"]);} ?>'  />
			<br />

<!-- BEST EMAIL ADDRESS TEXTFIELD CODE -->
		<label class="best-email">Best Email Address</label>
		<input class="best-email" type="text" name="best-email" value='<?php if (isset($_POST["best-email"])=== true) {echo trim($_POST["best-email"]);} ?>'  />
			<br />
			<br />
			<br />
				<hr />
			<br />
			<br />
			<br />

<!-- COURSE CHOICE DROP DOWN MENU CODE -->	
		<label class="course-name">Which Courses are you interested in?</label>
		<select class="course-name" name="course-name">
			<option value='no-selection'> -- Please select -- </option>
			<option value='CERT3-IT' <?php if ($selectedCourse === 'CERT3-IT') { ?> selected='selected' <?php } ?> >Certificate III in Information, Digital Media &amp; Technology (CERT3-IT)</option>
			<option value='CERT4-IT' <?php if ($selectedCourse === 'CERT4-IT') { ?> selected='selected' <?php } ?> >Certificate IV in Information Technology (CERT4-IT)</option>
			<option value='DIP-IT-NETWRK' <?php if ($selectedCourse === 'DIP-IT-NETWRK') { ?> selected='selected' <?php } ?> >Diploma of Information Technology Networking (DIP-IT-NETWRK)</option>
			<option value='DIP-WEB-DEV' <?php if ($selectedCourse === 'DIP-WEB-DEV') { ?> selected='selected' <?php } ?> >Diploma of Website Development (DIP-WEB-DEV)</option>
			<option value='DIP-IT' <?php if ($selectedCourse === 'DIP-IT') { ?> selected='selected' <?php } ?> >Diploma of Information Technology (DIP-IT)</option>
			<option value='ADV-DIP-IT-NETWRK' <?php if ($selectedCourse === 'ADV-DIP-IT-NETWRK') { ?> selected='selected' <?php } ?> >Advanced Diploma of Network Security (ADV-DIP-IT-NETWRK)</option>
			<option value='ADV-DIP-IT' <?php if ($selectedCourse === 'ADV-DIP-IT') { ?> selected='selected' <?php } ?> >Advanced Diploma of Information Technology (ADV-DIP-IT)</option>
			<option value='BA-IT-NETWRK' <?php if ($selectedCourse === 'BA-IT-NETWRK') { ?> selected='selected' <?php } ?> >Bachelor of Information Technology (Network and System Computing) (BA-IT-NETWRK)</option>
			<option value='GRAD-DIP-COMP-SCI' <?php if ($selectedCourse === 'GRAD-DIP-COMP-SCI') { ?> selected='selected' <?php } ?> >Graduate Diploma in Computer Science (GRAD-DIP-COMP-SCI)</option>
			<option value='MSTR-SCI' <?php if ($selectedCourse === 'MSTR-SCI') { ?> selected='selected' <?php } ?> >Master of Science (Computer Science) (MSTR-SCI)</option>
			<option value='MSTR-APP-IT' <?php if ($selectedCourse === 'MSTR-APP-IT') { ?> selected='selected' <?php } ?> >Master of Applied Information Technology (MSTR-APP-IT)</option>
		</select>
			<br />
		<label class="study-months">How many months would suit your study needs?</label>
		<input class="study-months" type="text" name="study-months" value='<?php if (isset($_POST['study-months'])=== true) {echo trim($_POST['study-months']);} ?>'  />
			<br />
			<br />
		<label class="preferred-course">Which course would you like to do the most?</label>
		<input class="preferred-course" type="text" name="favorite-code" value='<?php if (isset($_POST['favorite-code'])=== true) {echo trim($_POST['favorite-code']);} ?>'  />
			<br />
			<br />

<!-- PRIOR LEARNING RADIO BUTTONS CODE 
		<div class="learning-radio">
			<label class="prior-learning" for="Gender">Prior Learning</label><br />
		</div>
		<div class="learning-radio">
			<label><input class="prior-learning-radio" id='chk' onclick='showHide()' type='radio' name='prior-learning' value='yes' <?php echo $yes ?>/>Yes</label>
		</div>
		<div class="learning-radio">
			<label><input class="prior-learning-radio" type='radio' name='prior-learning' value='no' <?php echo $no ?>/>No</label>
		<br />
		</div>
		-->
		<!--
		<div class="support">
			<p></p>
		</div>
		<div class="support-doc">
			<label class="supporting-docs hidden">Add Supporting Documanetation:</label><br />
		</div>
		<div class="support-doc">
			<input class="supporting-docs hidden" type="file" name="fileToUpload" >
		</div>
		http://www.w3schools.com/php/php_file_upload.asp -->
			<br />

<!-- WHY STUDY @ VU TEXTAREA CODE -->	
		<label class="why-study">In 500 words or less, please tell us why you want to study at Footscray VUT.</label>
			<br />
		<textarea name="why-study-at-vu" rows="10" col="50"><?php if (isset($_POST['why-study-at-vu']) === true) { echo htmlspecialchars($_POST['why-study-at-vu']);}?></textarea>
			<br />

<!-- SUBMIT BOTTON CODE -->		
		<input type="submit" name="submit" value="Submit">

	</form><!-- /END form student-interest -->
	
	</section> <!-- /END section expression-of-interest -->
</div><!-- /END container -->

<!-- FOOTER CODE -->
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

<!-- 
/**
 * NOTES and THOUGHTS: 2015-04-22
 **
 *
 * - ITEMS TO ADDRESS AND UPDATE LATER:
 * - 1. File Upload Ability - get it working and validation for file uploads
 * - 2. Having a radiobutton or checkbox that reveals hidden file upload ability based on choice
 * - 3. Integrating all the code into bootstrap CSS for some reason wouldn't reveal my errors
 * - 4. Have errors near the fields in question instead of at the top - issue to scroll up and down to check what i need to update
 * - 5. Exploring use of functions to better manipulate and sanitize data before being passed from CLIENT SIDE to SERVER SIDE
 * - 6. Had issues with sanitising data for textarea and using strstr() and regex
 * - 7. Writing cleaner code and better CSS formatting I was unable to target the dropdown menus properly suspect that is JQuery also
 * - 8. Working within specified CLIENT GOALS and TIME FRAMES - needs work
 * - 9. Current structure using div's and <br /> tags not good practice - needs work
 * - 10. Upon inspection by Ian I missed adding a form element that needed to be validated within a range
 * - 11. This was addressed requesting how many months students could study
 * - 12. Went 2 steps further: Step 1 adding best contact number needs to begin with 04...
 * - 13. Step 2 adding field that needed correct course code where start of code needed to be specific letters
 * - 14. Lastly, creating a multi-page form that had all fields listed at the bottom
 *
 * - ITEMS I FOUND HELPFULL:
 * - 1. Understading the way data is moving through the form from entry to validation, sanitisation and re-display
 * - 2. Creating a faux-website and addressing real world issues with user interactions i.e' validation
 * - 3. HTML5 Semantics and CSS3 practice
 * - 4. Researching techniques for writing Logic Statements
 * - 5. Researching techniques for error handling by users not putting in right data and coders errors
 * - 6. 
 * - 7. 
 *
 */ -->
 <!-- 
/**
 * EXPRESSION OF INTEREST FORM - DATA TO BE COLLECTED: 
 **
 * [TITLE] [DROPDOWN MENU] [Mr Mrs Miss Dr]
 * [FAMIL NAME] [TEXTFIELD]
 * [GIVEN NAME 1] [TEXTFIELD]
 * [GIVEN NAME 2] [TEXTFIELD]
 * [DOB] [DAY]-[DROPDOWN MENU] [MONTH]-[DROPDOWN MENU] [YEAR]-[DROPDOWN MENU]
 * [GENDER] [RADIO BUTTON] [Male]-[Female]
 *?*? [PREFERRED NAME ORDER] *** IF TIME PERMITS *** [6 OPTION FORMATS]-[]REF 2012 PAPER ENROLMENT FORM
 * [MOBILE NUMBER] [TEXTFIELD] [0438098590]
 * [PREFERRED EMAIL ADDRESS] [TEXTFIELD] [dnafviii@optusnet.com.au]
 * [COURSES INTERESTED IN] [DROPDONW MENU]-[MULTI-SELECTION] [COURSE CODE]-[COURSE TITLE]
 * [PRIOR LEARNING] [RADIO BUTTON] [YES]-[ATTACH SUPPORTING DOCS] [NO]-[DO NOT ACTIVATE SUPPORTING DOCS FEATURE]
 * [OTHER INFORMATION] [TEXT-AREA]-[MIN CHARS=1]-[MAX CHARS=500]
 * [SUBMIT] [BUTTON]
 *
 */

/**
 * STUDENT REGISTRATION FORM - DATA TO BE COLLECTED: 
 **
 * [VU STUDENT ID]-[GIVEN ONCE REQUEST APPROVED AND LETTER OF OFFER SENT]-[4532350]
 * [TITLE] [DROPDOWN MENU] [Mr Mrs Miss Dr]
 * [FAMIL NAME] [TEXTFIELD]
 * [GIVEN NAME 1] [TEXTFIELD]
 * [GIVEN NAME 2] [TEXTFIELD]
 * [DOB] [DAY]-[DROPDOWN MENU] [MONTH]-[DROPDOWN MENU] [YEAR]-[DROPDOWN MENU]
 * [GENDER] [RADIO BUTTON] [Male]-[Female]
 * [PREFERRED NAME ORDER] *** IF TIME PERMITS *** [6 OPTION FORMATS]-[REF 2012 PAPER ENROLMENT FORM]
 * [EMERGENCY CONTACT PERSON NAME] [TEXTFIELD]-[ALLOW GIVEN & SURNAME]
 * [EMERGENCY CONTACT] [TEXTFIELD]-[NUMBERS ONLY]
 * [SEMESTED MAILING ADDRESS] 
   [PROPERTY NAME] [TEXTFILED]
   [STREET NUMBER] [TEXTFILED]
   [STREET NAME] [TEXTFIELD]
   [SUBURB] [TEXTFIELD]
   [STATE] [DROPDOWN MENU]
   [POSTCODE]-[TEXTFIELD] *** [DROPDOWN MENU WITH ALL VIC POSTCODES] ***
   [COUNTRY] [DROPDOWN MENU]-[1 ITEM AUSTRALIA]
 * [IS SEMESTER ADDRESS DIFFERENT FROM PERMANENT ADDRESS?]-[IF YES]-[ACTIVATE PERMANENT ADDRESS FIELDS]-[IF NO]-[LEAVE DEACTIVATED]
 * [PERMANENT MAILING ADDRESS]-[COULD BE OVERSEASE]
   [PROPERTY NAME] [TEXTFILED]
   [STREET NUMBER] [TEXTFILED]
   [STREET NAME] [TEXTFIELD]
   [SUBURB] [TEXTFIELD]
   [STATE] [TEXTFIELD]
   [POSTCODE]-[TEXTFIELD] *** [DROPDOWN MENU WITH ALL VIC POSTCODES] ***
   [COUNTRY] [TEXTFIELD]
 * [MOBILE NUMBER] [TEXTFIELD] [0438098590]-[MIN/MAX NUMBERS=10]
 * [PREFERRED EMAIL ADDRESS] [TEXTFIELD] [dnafviii@optusnet.com.au]
 * [COURSE CODE] [TEXTFIELD]-[MIX LETTERS/NUMBERS]
 * [COURSE TITLE] [TEXTFIELD]-[AUTO FILL]-[BASED ON COURSE CODE ENTERED]
 * [DEPARTMENT] [TEXTFIELD]-[AUTO FILL]-[BASED ON COURSE CODE ENTERED]
 * [COURSE CO-ORDINATOR] [TEXTFIELD]-[AUTO FILL]-[BASED ON COURSE CODE ENTERED]
 * [STUDY DURATION] [RADIO BUTTON]-[FULL-TIME]-[PART-TIME]
 * [PAYMENT METHOD] [RADIO BUTTON]-[UP FRONT]-[DEFERRED]-[IF DEFERRED ACTIVATE TEXTFIELD FOR]-[TAX FILE NUMBER]-[UFI NUMBER]
 * [TAX FILE NUMBER] [TEXTFIELD] [123456789]-[MIN NUMBERS=9]-[MAX NUMBERS]=11
 * [CITIZENSHIP STATUS] [DROPDOWN MENU]-[OPTOINS REF 2012 PAPER ENROLMENT FORM]
 * [COUNTRY OF BIRTH] [TEXTFIELD]
 * [DATE PERMANENT RESIDENCY GRANTED] [DAY]-[DROPDOWN MENU] [MONTH]-[DROPDOWN MENU] [YEAR]-[DROPDOWN MENU]
 * [IF YOU ARE A VISA HOLDER DATE IT WAS GRANTED] [DAY]-[DROPDOWN MENU] [MONTH]-[DROPDOWN MENU] [YEAR]-[DROPDOWN MENU]
 * [PRIOR LEARNING] [RADIO BUTTON] [YES]-[ATTACH SUPPORTING DOCS] [NO]-[DO NOT ACTIVATE SUPPORTING DOCS FEATURE]
 * [OTHER INFORMATION] [TEXT-AREA]-[MIN CHARS=1]-[MAX CHARS=500]
 * [SUBMIT] [BUTTON]
 *
 */
 -->
