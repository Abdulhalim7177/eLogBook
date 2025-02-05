<?php
include_once("includes/zz.php");
include_once("includes/functions.php");

if (isset($_POST['signup'])) {
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $mname = $_POST['mname'];
    $sex = $_POST['sex'];
    $college = $_POST['college'];
    $dept = $_POST['dept'];
    $staffno = $_POST['staffno'];
    $role = 'Supervisor'; // Set role to Supervisor
    $loginTime = date('Y-m-d H:i:s');

    // Check if staff number already exists
    $checkQuery = "SELECT * FROM stafflist WHERE staffno='$staffno'";
    $result = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $signupError = "Staff Number already exists!";
    } else {
        // Insert supervisor into the stafflist table
        $signupQuery = "INSERT INTO stafflist (fname, sname, mname, sex, college, dept, staffno, role) 
                        VALUES ('$fname', '$sname', '$mname', '$sex', '$college', '$dept', '$staffno', '$role')";

        if (mysqli_query($connection, $signupQuery)) {
            // Insert into staffrole table with staffRoleNo=2 for supervisor
            $staffRoleQuery = "INSERT INTO staffrole (staffNum, staffRoleNo, loginTime, staffDelete) 
                             VALUES ('$staffno', 2, '$loginTime', 0)";
            
            if (mysqli_query($connection, $staffRoleQuery)) {
                header("Location: siwesadmin.php?signup_success=1");
            } else {
                $signupError = "Error creating staff role. Please try again.";
            }
        } else {
            $signupError = "Error signing up. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="GetTemplate.com">
	<title>E-SIWES</title>
	<link rel="shortcut icon" href="public/img/gt_favicon.png">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:200,400,600|Open+Sans:300,400,700">
	<link  href="public/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/datepicker/themes/start/jquery-ui.min.css" rel="stylesheet">
	<link href="public/css/sticky-footer-navbar.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 hidden-xs"><img src="public/img/logo.png" alt="FPTB" class="pull-left" style="margin-top:9px;"></div> 
			<div class="col-md-8 col-xs-12">
				<h3 class="text-center text-primary hidden-xs"><strong>BAYERO UNIVERSITY KANO, NIGERIA</strong></h3>
				<h5 class="text-center text-primary hidden-xs">ONLINE STUDENTS' INDUSTRIAL WORKS EXPERIENCE SCHEME (E-SIWES)</h5>
				<h4 class="text-center text-primary hidden-xs">TRAINING LOG BOOK</h4>
				<h2 class="text-center text-primary hidden-xs">SUPERVISOR SIGN UP PAGE</h2>
			</div>               
			<div class="col-md-2 hidden-xs"><img src="public/img/itf.jpg" alt="ITF" class="img-circle pull-right" style="margin-top:9px;"></div>
		</div>
	</div>
	 <nav class="navbar ui-widget-header" style="border-color:#33b75f;background-color: #33b75f;border-radius:0;width:100% important;">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
            </div> 
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					
                <li><a href="public/itdocuments/SIWES_Guidelines.pdf" target="_blank">SIWES Guidelines</a></li>
					<li><a href="public/itdocuments/SIWES_Documents.pdf"  target="_blank">IT Documents</a></li>
					<li><a href="https://www.youtube.com/channel/UCFJLVgPiBVMngPyflZ6KQNg" target="_blank">ESIWES YOUTUBE CHANNEL</a></li>
					<li><a href="https://t.me/joinchat/" target="_blank">IT STUDENTS TELEGRAM GROUP</a></li>
                    <li><a href="public/itdocuments/SIWES_Documents.pdf"  target="_blank">TEAM</a></li>
                    <li><a href="public/itdocuments/SIWES_Documents.pdf"  target="_blank">ABOUT PROJECT</a></li>
				</ul>
			</div>
        </div>
	</nav>
    <!-- Signup Form -->
    <div class="container-fluid" style="margin-top:5px;">
        <div class="row">
            <div class="col-lg-3 col-lg-offset-4">
                <div class="panel ui-widget-shadow" style="margin:0;max-width:350px;">
                    <h4 class="panel-heading panel-title text-center ui-widget-header">Supervisor Sign-Up</h4>
                    <div class="panel-body ui-widget-content">
                        <div class="well">
                            <?php if (isset($signupError)): ?>
                            <div class='alert alert-danger'>
                                <h6><?php echo $signupError; ?></h6>
                            </div>
                            <?php endif; ?>
                            <form action='' method='POST'>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Staff Number" name='staffno'
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name" name='fname'
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Surname" name='sname' required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Middle Name" name='mname'>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="sex" required>
                                        <option value="" disabled selected>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="School" name='college'
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Department" name='dept'
                                        required>
                                </div>
                                <button type="submit" class="btn btn-default" name='signup'><i
                                        class="fa fa-lock"></i> Sign Up</button>
                                <a href="siwesadmin.php" class="btn btn-primary" style="float:right;">Back to Login</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <footer class="navbar-fixed-bottom">
        <div class="container-fluid ui-widget-header text-center">
            Powered by Computer Science Department, 2018 Academic Session Students, The FEDERAL POLYTECHNIC Bauchi,
            Nigeria
        </div>
    </footer>

    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="public/datepicker/jquery-ui.min.js"></script>
</body>

</html>
