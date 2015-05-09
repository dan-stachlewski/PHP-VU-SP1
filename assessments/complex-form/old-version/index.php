<?php

$selectedTitle = '';
$selectedDay = '';
$selectedMonth = '';
$selectedYear = '';
$selectedCourse = '';

$male = 'unchecked';
$female = 'unchecked';
$other = 'unchecked';
$yes = 'unchecked';
$no = 'unchecked';

if (isset($_POST['submit'])) {
    

    

// TITLE DROPDOWN MENU VALIDATION
    $title = $_POST['title'];
    if (empty($_POST) === FALSE) {

        //Check to see if Title has an input
        if ($_POST['title'] === 'no-selection') {
            $errors[] = 'Please enter a Title.';
        } else {
            $selectedTitle = $_POST['title'];
        }
    }

// FAMILY-NAME & GIVEN-NAMES TEXTBOXES VALIDATION
    if (!empty($_POST) === TRUE) {
        $errors = array();

        $familyName = $_POST['family-name'];
        $givenName1 = $_POST['given-name-1'];
        $givenName2 = $_POST['given-name-2'];
        

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

    /* given-name-1 vlaidation: */
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

    /* given-name-2 vlaidation: */
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
        if (empty($_POST['best-number']) === TRUE) {
            $errors[] = 'You must enter your Best Contact Number.';
        }
            // 2. Check best-number input DOES NOT contains letters, numbers only
        else { if (is_numeric($_POST['best-number']) === FALSE) {
            $errors[] = 'Your Best Contact Number must contain numbers only.';
            }
            // 3. Check best-number input IS NOT too long, not > 10 numbers
        else { if (strlen($_POST['best-number']) > 10) {
            $errors[] = 'Your Best Contact Number is too long, use max - 10 numbers.';
            }
        }
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
    if (empty($_POST['study-months'])) {
        $errors[] = "You need to add the appropriate number of months to study!";
    }

    if ($_POST['study-months'] < 1) {
        $errors[] = "Do you want to study at all this year?";
    } elseif 
        ($_POST['study-months'] > 12 ) {
        $errors[] = "We don't offer that many subjects within a year!";
    }

// FAVORITE COURSE TEXTBOX VALIDATION
    $favouriteCourse = $_POST['favorite-course'];


// PRIOR LEARNING RADIOBUTTON VALIDATION
    if (isset($_POST['prior-learning'])) {
        $priorLearning = $_POST['prior-learning'];

        if ($priorLearning == 'yes') {
            $yes = 'checked';
        } else if ($priorLearning == 'no') {
            $no = 'checked';
        }
    } else 
        $errors[] = "You need to acknowledge YES or NO for Prior Learning.";

// SUPPORTING DOCUMENTATION VALIDATION ???


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

                        
} // END isset($_POST['submit'])

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
	<title>St. Andrews | Home</title>

	<!-- CSS BOOTSTRAP & CUSTOM -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my-styles.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- NAVBAR-FIXED AT TOP OF PAGE -->
	<?php include('inc/top-navbar.php'); ?>
    
    <!-- HEADER (DISGUISED AS JUMBOTRON) -->
    <?php include('inc/header.php'); ?>



    <div class="container">
        <section>
            <div class="page-header" id="events">
                <h2>Welcome to our Online Student Registration:<br />
                    <small>It's as simple 4 step process.</small>
                </h2>
                <p>1. Fill out the Form. <br />2. Follow the prompts.<br /> 3. Submit you information.<br /> 4. Check your email in 24hrs for a response.</p>
                <p>This Form has been designed to speed up the process of initial student expression of interest and application to register for a course. As a new student this is where you get to introduce yourself, enter your contact information, attach any supporting documentation to help verify and expidite your registration. Just follow the prompts, and if you are having trouble please contact Student Admin on (03) 9345 5868 or by <a href="#">email.</a></p>
                <p>Its as simple as 1, 2, 3 and 4. Good luck and welcome to Footscray Nicholson Campus | VU.</p>
            </div><!-- /END page-header(EVENTS) -->


            <div class="container">
                <div class="row well">


                <?php


if (isset($_POST['submit'])) {

                $errors = array();

                print_r($_POST);

            if (!empty($errors))
                        foreach ($errors as $error) {
                            echo "<p>$error</p>";
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
                      }

               ?>
                </div>
            </div>


            <!-- 5-1. CODE FOR TEXT & IMAGE -->
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    
                    <form class="form-horizontal" id="student-interest" method="POST" action='<?php echo($_SERVER["PHP_SELF"]) ?>' enctype="multipart/form-data">

                        <!-- TITLE DROPDOWN MENU -->
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-6">
                                    <select class="form-control" name="title" id="title">
                                        <option value='no-selection'> -- Please select -- </option>
                                        <option value='Mr' <?php if ($selectedTitle === 'Mr') { ?> selected='selected' <?php } ?> >Mr</option>
                                        <option value='Ms' <?php if ($selectedTitle === 'Ms') { ?> selected='selected' <?php } ?> >Ms</option>
                                        <option value='Miss' <?php if ($selectedTitle === 'Miss') { ?> selected='selected' <?php } ?> >Miss</option>
                                        <option value='Mrs' <?php if ($selectedTitle === 'Mrs') { ?> selected='selected' <?php } ?> >Mrs</option>
                                        <option value='Dr' <?php if ($selectedTitle === 'Dr') { ?> selected='selected' <?php } ?> >Dr</option>
                                    </select>
                                </div>
                        </div>
                        
                        <!-- FAMIY NAME TEXT FIELD -->
                        <div class="form-group">
                            <label for="family-name" class="col-sm-2 control-label">Family Name:</label>
                            <div class="col-sm-6">
                            <input for="family-name" class="form-control" type="text" placeholder="Bloggs"  name="family-name" value='<?php if (isset($_POST["family-name"])=== true) {echo trim($_POST["family-name"]);} ?>'  />
                            </div>
                        </div>
                        
                        <!-- GIVEN NAME 1 TEXT FIELD -->
                        <div class="form-group">
                            <label for="given-name-1" class="col-sm-2 control-label">Given Name 1:</label>
                            <div class="col-sm-6">

                            <input for="given-name-1" class="form-control" type="text" placeholder="Joe"  name="given-name-1" value='<?php if (isset($_POST["given-name-1"])=== true) {echo trim($_POST["given-name-1"]);} ?>'  />
                            </div>
                        </div>

                        <!-- GIVEN NAME 2 TEXT FIELD -->
                        <div class="form-group">
                            <label for="given-name-2" class="col-sm-2 control-label">Given Name 2:</label>
                            <div class="col-sm-6">

                            <input for="given-name-2" class="form-control" type="text" placeholder="Russel"  name="given-name-2" value='<?php if (isset($_POST["given-name-2"])=== true) {echo trim($_POST["given-name-2"]);} ?>'  />
                            </div>
                        </div>
                        <!-- DOB DROPDOWN MENUS -->

                        <!-- DAY DOB DROPDOWN MENU -->
                        <div class="form-group">
                            <label for="day" class="col-sm-2 control-label">Day</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="day" id="day">
                                    <option value='no-selection'> -- Please select -- </option>
                                <?php 
                                    for ($i = 1; $i <= 31; $i++) {
                                        echo '<option value="'.$i.'" ';
                                                if ($selectedDay == $i) { echo ' selected="selected"'; }
                                        echo '>'.$i.'</option>';
                                        }  /* end for loop */
                                 ?>
                                </select>
                            </div>
                        </div>

                        <!-- MONTH DOB DROPDOWN MENU -->
                        <div class="form-group">
                            <label for="month" class="col-sm-2 control-label">Month</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="month" id="month">
                                    <option value='no-selection'> -- Please select -- </option>
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
                                            foreach($months as $day => $month) {
                                                echo '<option value="' . $day .'"';
                                                if($selectedMonth == $day) { echo ' selected="selected"'; }
                                                echo '">' . $month . '</option>';
                                            } /* end for loop */
                                        ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- YEAR DOB DROPDOWN MENU -->
                        <div class="form-group">
                            <label for="year" class="col-sm-2 control-label">Year</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="year" id="year">
                                    <option value='no-selection'> -- Please select -- </option>
                                        <?php

                                            $year = 2000;
                                            for ($i = $year - 58; $i <= $year + 1; $i++) {
                                            echo '<option value="'.$i.'" ';
                                            if ($selectedYear == $i) { echo ' selected="selected"'; }
                                            echo '>'.$i.'</option>';
                                            }  /* end for loop */
                                        ?>
                                </select>
                            </div>
                        </div>

                        <!-- GENDER RADIO BUTTON -->
                        <div class="form-group">
                            <label for="gender" class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-6">
                                <label>
                                    <input type='radio' name='gender' value='male' <?php echo $male ?>/>
                                    Male
                                </label>
                                <label>
                                    <input type='radio' name='gender' value='female' <?php echo $female ?>/>
                                    Female
                                </label>
                                <label>
                                    <input type='radio' name='gender' value='other' <?php echo $other ?>/>
                                    Other
                                </label>
                            </div>
                        </div>

                        <!-- BEST CONTACT NUMBER TEXT FIELD --> <!-- /make sure 1st 2 numbers are 04... -->
                        <div class="form-group">
                            <label for="best-number" class="col-sm-2 control-label">Best Contact</label>
                            <div class="col-sm-6">
                            <input for="best-number" class="form-control" type="text" placeholder="0438123456"  name="best-number" value='<?php if (isset($_POST["best-number"])=== true) {echo trim($_POST["best-number"]);} ?>'  />
                            </div>
                        </div>

                        <!-- BEST EMAIL ADDRESS TEXT FIELD -->
                        <div class="form-group">
                            <label for="best-email" class="col-sm-2 control-label">Best Email</label>
                            <div class="col-sm-6">
                            <input for="best-email" class="form-control" type="text" placeholder="joe.bloggs@gmail.com"  name="best-email" value='<?php if (isset($_POST["best-email"])=== true) {echo trim($_POST["best-email"]);} ?>'  />
                            </div>
                        </div>

                        <!-- WHICH COURSE DROPDOWN MENU --> <!-- /make sure update the values in dropdown menu for result and add course code for each to validate... -->
                        <div class="form-group">
                            <label for="course-name" class="col-sm-2 control-label">Courses</label>
                            <div class="col-sm-6">
                                    <select class="form-control" name="course-name" id="course-name">
                                        <option value='no-selection'> -- Please select -- </option>
                                        <option value='cert-3-IT' <?php if ($selectedCourse === 'cert-3-IT') { ?> selected='selected' <?php } ?> >Certificate III in Information, Digital Media &amp; Technology</option>
                                        <option value='cert-4-IT' <?php if ($selectedCourse === 'cert-4-IT') { ?> selected='selected' <?php } ?> >Certificate IV in Information Technology</option>
                                        <option value='dip-IT-nwrk' <?php if ($selectedCourse === 'dip-IT-nwrk') { ?> selected='selected' <?php } ?> >Diploma of Information Technology Networking</option>
                                        <option value='dip-web-dev' <?php if ($selectedCourse === 'dip-web-dev') { ?> selected='selected' <?php } ?> >Diploma of Website Development</option>
                                        <option value='dip-IT' <?php if ($selectedCourse === 'dip-IT') { ?> selected='selected' <?php } ?> >Diploma of Information Technology</option>
                                        <option value='adv-dip-Nwrk-Sec' <?php if ($selectedCourse === 'adv-dip-Nwrk-Sec') { ?> selected='selected' <?php } ?> >Advanced Diploma of Network Security</option>
                                        <option value='adv-dip-IT' <?php if ($selectedCourse === 'adv-dip-IT') { ?> selected='selected' <?php } ?> >Advanced Diploma of Information Technology</option>
                                        <option value='bchlr-IT-nwrk' <?php if ($selectedCourse === 'bchlr-IT-nwrk') { ?> selected='selected' <?php } ?> >Bachelor of Information Technology (Network and System Computing)</option>
                                        <option value='grad-dip-CS' <?php if ($selectedCourse === 'grad-dip-CS') { ?> selected='selected' <?php } ?> >Graduate Diploma in Computer Science</option>
                                        <option value='mstr-sci' <?php if ($selectedCourse === 'mstr-sci') { ?> selected='selected' <?php } ?> >Master of Science (Computer Science)</option>
                                        <option value='mstr-app-IT' <?php if ($selectedCourse === 'mstr-app-IT') { ?> selected='selected' <?php } ?> >Master of Applied Information Technology</option>
                                    </select>
                                </div>
                        </div>

                        <!-- NUMBER OF MONTHS ABLE TO STUDY TEXT FIELD --> <!-- add tool tip or sentence to explain study months -->
                        <div class="form-group">
                            <label for="study-months" class="col-sm-2 control-label">Study Months</label>
                            <div class="col-sm-6">
                            <input for="study-months" class="form-control" type="text" placeholder=""  name="study-months" value='<?php if (isset($_POST["study-months"])=== true) {echo trim($_POST["study-months"]);} ?>'  />
                            </div>
                        </div>

                        <!-- COURSE MOST INTERESTED IN TEXT FIELD -->
                        <div class="form-group">
                            <label for="favorite-course" class="col-sm-2 control-label">Favorite Course</label>
                            <div class="col-sm-6">
                            <input for="favorite-course" class="form-control" type="text" placeholder=""  name="favorite-course" value='<?php if (isset($_POST["favorite-course"])=== true) {echo trim($_POST["favorite-course"]);} ?>'  />
                            </div>
                        </div>

                        <!-- PRIOR LEARNING RADIO BUTTON -->
                        <div class="form-group">
                            <label for="prior-learning" class="col-sm-2 control-label">Prior Learning:</label>
                            <div class="col-sm-6">
                                <label>
                                    <input type='radio' name='prior-learning' value='yes' <?php echo $yes ?>/>
                                    Yes
                                </label>
                                <label>
                                    <input type='radio' name='prior-learning' value='no' <?php echo $no ?>/>
                                    No
                                </label>
                            </div>
                        </div>
                        
                        <!-- SUPPORTED DOCUMENTATION FIELD -->
                        <div class="form-group">
                            <label for="supporting-docs" class="col-sm-2 control-label">Add Supporting Docs</label>
                            <div class="col-sm-6">
                            <input type="file" name="supporting-docs" > <!-- /file-to-upload -->
                        </div>
                        
                        <!-- SPACER TO ADD ROOM B/W FILE UPLOAD AND TEXTAREA -->
                        <div class="form-group">
                            <label for="why-study-at-vu" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                
                            </div>
                        </div>          
                        <!-- http://www.w3schools.com/php/php_file_upload.asp -->
                        
                        <!-- WHY STUDY AT VU TEXTAREA -->
                        <div class="form-group">
                            <label for="why-study-at-vu" class="col-sm-2 control-label">Why I want to study:</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="why-study-at-vu" id="why-study-at-vu" cols="50" rows="10" placeholder="I am writing to ..."><?php if (isset($_POST['why-study-at-vu']) === true) { echo htmlspecialchars($_POST['why-study-at-vu']);}?></textarea>
                            </div>
                        </div>

                        <!-- SUBMIT BUTTON-->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div>      
                        </div>          


                    </form>

                </div><!-- /END col-xs-12 col-md-12 col-lg-12 -->
                
            </div><!-- /END row -->

        </section><!-- /END section(EVENTS) -->
    </div><!-- /END container(EVENTS) -->
    
    <!-- WELCOME -->
    <!-- <?php //include('inc/register.php'); ?> -->

    <!-- FOOTER AT BOTTOM OF PAGE -->
    <?php include('inc/footer.php'); ?>

    <!-- jQuery BOOTSTRAP'S JAVASCRIPT PLUGINS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-2.1.3.min.js"></script>

</body>
</html>