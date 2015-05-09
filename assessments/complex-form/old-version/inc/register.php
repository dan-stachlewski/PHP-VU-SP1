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