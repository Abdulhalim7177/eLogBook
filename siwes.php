<?php
	include_once("includes/session.php");
	include_once("includes/zz.php");
	include_once("includes/functions.php");
	include_once("models/studentinfo.php");

	confirm_logged_in();

	$getcountry = "SELECT * FROM countries";
	$thecountry = mysqli_query($connection, $getcountry);

	$getstate = "SELECT * FROM states";
	$thestate = mysqli_query($connection, $getstate);

	$getpost = "SELECT * FROM siwespost WHERE siwesMat = '$matno' ORDER BY siwesPostId DESC LIMIT 1";
	$thepost = mysqli_query($connection, $getpost);
	if ($thepost && mysqli_num_rows($thepost) > 0) {
		 $postrow = mysqli_fetch_array($thepost);
	} else {
		 $postrow = null;
	}
	?>
	<?php require('views/header.php'); ?>

	<div id="page-content">
		 <div class="container">
			  <div class="row">
					<div class="col-sm-8 page-content">
						 <div class="white-container mb0">
							  <?php if ($postrow): ?>
							  <form method='post' action="models/siwesposting.php" enctype='multipart/form-data'>
									<fieldset>
										 <legend>Company Information</legend>
										 <div id='thegentable'>
											  <label>
													Name of Company/Establishment:
											  </label>
											  <input type="text" name="siwesCompName" value='<?php echo $postrow['siwesCompName']; ?>' disabled>
											  <label>
													Address of Company/Establishment:
											  </label>
											  <textarea name="siwesCompAdd" disabled><?php echo $postrow['siwesCompAdd']; ?></textarea>
											  <label>
													Country of Company/Establishment:
											  </label>
											  <input type="text" name="siwesCompCountry" value='<?php echo $postrow['siwesCompCountry']; ?>' disabled>
											  <?php if ($postrow['siwesCompState'] != '') : ?>
													<label>
														 State of Company/Establishment:
													</label>
													<input type="text" name="siwesCompState" value='<?php echo $postrow['siwesCompState']; ?>' disabled>
											  <?php endif; ?>
											  <label>
													Supervisor Name:
											  </label>
											  <input type="text" name="siwesSupervisor" value='<?php echo $postrow['siwesSupervisor']; ?>' disabled>
											  <label>
													Supervisor Phone Number:
											  </label>
											  <input type="text" name="siwesSupervisorNo" value='<?php echo $postrow['siwesSupervisorNo']; ?>' disabled>
											  <?php if ($postrow['siwesCompLetter'] != '') : ?>
													<a href='models/downloadletter.php?letter=<?php echo $postrow['siwesCompLetter']; ?>' class="btn btn-default mt20 mb20">Download Acceptance Letter</a>
											  <?php endif; ?>
											  <?php if ($postrow['siwesCompLetter'] == '') : ?>
													<label>No Offer Letter Added.</label>
											  <?php endif; ?>
											  <br>
											  <a href="#" id='shownew' class="btn btn-default">Edit</a>
										 </div>
										 <div id='thenew'>
											  <label>
													Name of Company/Establishment:
											  </label>
											  <input type="text" name="siwesCompName" value='<?php echo $postrow['siwesCompName']; ?>' required>
											  <label>
													Address of Company/Establishment:
											  </label>
											  <textarea name="siwesCompAdd" required><?php echo $postrow['siwesCompAdd']; ?></textarea>
											  <label>
													Select Country of Company/Establishment:
											  </label>
											  <select id="thecountry" name="siwesCompCountry">
													<option selected value="<?php echo $postrow['siwesCompCountry']; ?>"><?php echo $postrow['siwesCompCountry']; ?></option>
													<?php
													while ($countryrow = mysqli_fetch_array($thecountry)) {
													?>
														 <option value="<?php echo $countryrow['countryname']; ?>"><?php echo $countryrow['countryname']; ?></option>
													<?php
													}
													?>
											  </select>
											  <div id="thestate">
													<label>
														 Select State of Company/Establishment:
													</label>
													<select name="siwesCompState">
														 <option selected value="<?php echo $postrow['siwesCompState']; ?>"><?php echo $postrow['siwesCompState']; ?></option>
														 <?php
														 while ($staterow = mysqli_fetch_array($thestate)) {
														 ?>
															  <option value="<?php echo $staterow['statename']; ?>"><?php echo $staterow['statename']; ?></option>
														 <?php
														 }
														 ?>
													</select>
											  </div>
											  <label>
													Supervisor Name:
											  </label>
											  <input type="text" name="siwesSupervisor" value='<?php echo $postrow['siwesSupervisor']; ?>' required>
											  <label>
													Supervisor Phone Number:
											  </label>
											  <input type="text" name="siwesSupervisorNo" value='<?php echo $postrow['siwesSupervisorNo']; ?>' required>
											  <?php if ($postrow['siwesCompLetter'] != '') : ?>
													<label>
														 Change Offer Letter <span class='bred'>(Max Size: 3MB for file types .pdf .doc .docx)</span>
													</label>
											  <?php endif; ?>
											  <?php if ($postrow['siwesCompLetter'] == '') : ?>
													<label>
														 Attach Acceptance Letter <span class='bred'>(Max Size: 3MB for file types .pdf .doc .docx)</span>
													</label>
											  <?php endif; ?>
											  <input type="file" name="siwesCompLetter">
											  <br>
											  <input type="submit" name="submit" class="btn btn-default" value='Save'> <a href="#" id='hidenew' class="btn btn-primary">Cancel</a>
										 </div>
									</fieldset>
							  </form>
							  <?php else: ?>
							  <p>No data to display.</p>
							  <?php endif; ?>
						 </div>
					</div>

					<div class="col-sm-4 page-sidebar">
						 <aside>
							  <div class="widget sidebar-widget white-container links-widget">
							  <ul><br>
										 <div>&nbsp&nbsp&nbsp&nbsp Welcome <?php echo ucwords($sname . ' ' . $fname . ' ' . $mname); ?></div>
										 <div>&nbsp&nbsp&nbsp&nbsp REG NO: <?php echo ucwords($matno); ?></div>
										 <div>&nbsp&nbsp&nbsp&nbsp DEPARTMENT: <?php echo ucwords($program); ?></div>
										 <div>&nbsp&nbsp&nbsp&nbsp LEVEL: <?php echo ucwords($level); ?></div>
										 <div>&nbsp&nbsp&nbsp&nbsp STATUS: <?php echo ucwords($studentshipStatus); ?></div>
										 <li class="active"><a href="mylogbook.php">MY LOGBOOK</a></li>
										 <li><a href="siwes.php">MY SIWES DETAILS</a></li>
										 <li><a href="siwesdocs.php">MY IT DOCUMENTS</a></li>
										 <li><a href="siwesorg.php">MY IT ORGANIZATION</a></li>
										 <li><a href="models/logout.php">LOG OUT</a></li>
									</ul>
							  </div>
						 </aside>
					</div>
			  </div>
		 </div> <!-- end .container -->
	</div> <!-- end #page-content -->

	<?php require('views/footer.php'); ?>
