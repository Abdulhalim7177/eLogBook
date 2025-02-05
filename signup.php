<?php
include_once 'includes/zz.php';
include_once 'includes/functions.php';

if (isset($_POST['signup'])) {
    $matno = $_POST['matno'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $mname = $_POST['mname'];
    $sex = $_POST['sex'];
    $college = $_POST['college'];
    $dept = $_POST['dept'];
    $program = $_POST['program'];
    $level = $_POST['level'];
    $password = $_POST['password'];

    // Check if user already exists
    $checkQuery = "SELECT * FROM reglist WHERE matno='$matno'";
    $result = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $signupError = "Matric Number already exists!";
    } else {
        // Insert new user into the database
        $signupQuery = "INSERT INTO reglist (matno, fname, sname, mname, sex, college, dept, program, level, studentshipStatus, password) 
                        VALUES ('$matno', '$fname', '$sname', '$mname', '$sex', '$college', '$dept', '$program', '$level', 'inactive', '$password')";
        if (mysqli_query($connection, $signupQuery)) {
            header("Location: index.php?signup_success=1");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="GetTemplate.com">
    <title> BUK E-SIWES</title>
    <link rel="shortcut icon" href="public/img/gt_favicon.png">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:200,400,600|Open+Sans:300,400,700">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/datepicker/themes/start/jquery-ui.min.css" rel="stylesheet">
    <link href="public/css/sticky-footer-navbar.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 hidden-xs"><img src="public/img/logo.png" alt="BUK" with class="pull-left"
                    style="margin-top:9px;"></div>
            <div class="col-md-8 col-xs-12">
                <h3 class="text-center text-primary hidden-xs"><strong>BAYERO UNIVERSITY KANO, NIGERIA</strong>
                </h3>
                <h5 class="text-center text-primary hidden-xs">ONLINE STUDENTS' INDUSTRIAL WORKS EXPERIENCE SCHEME
                    (E-SIWES)</h5>
                <h5 class="text-center text-primary hidden-xs">COMPUTER SCIENCE PROJECT</h5>
                <h5 class="text-center text-primary hidden-xs">TRAINING LOG BOOK</h5>
                <h2 class="text-center text-primary hidden-xs">STUDENT LOGIN PAGE</h2>
            </div>
            <div class="col-md-2 hidden-xs"><img src="public/img/itf.jpg" alt="ITF" class="img-circle pull-right"
                    style="margin-top:9px;"></div>
        </div>
    </div>
    <nav class="navbar ui-widget-header"
        style="border-color:green;background-color:gray;border-radius:0;width:100% important;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <style>
                .ul-li :hover {

                    color: black;
                }
                </style>
                <ul class="nav navbar-nav" id="nav1">

                <li><a href="public/itdocuments/SIWES_Guidelines.pdf" target="_blank">SIWES Guidelines</a></li>
					<li><a href="public\itdocuments/SIWES_Documents.pdf"  target="_blank">IT Documents</a></li>
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
            <div class="col-lg-9">
                <h5 class="indexnote"><br><br>ALL STUDENTS MUST SIGN UP TO USE THIS PLATFORM EFFECTIVELY. PLEASE ENTER
                    YOUR DETAILS CAREFULLY AND ENSURE ALL FIELDS ARE FILLED ACCURATELY. FAILURE TO DO SO MAY RESULT IN
                    INACCESSIBILITY TO THE SYSTEM.</h5>
            </div>
            <div class="col-lg-3">
                <div class="panel ui-widget-shadow" style="margin:0;max-width:350px;">
                    <h4 class="panel-heading panel-title text-center ui-widget-header">Sign Up</h4>
                    <div class="panel-body ui-widget-content">
                        <div class="well">
                            <?php if (isset($signupError)): ?>
                            <div class='alert alert-danger'>
                                <h6><?php echo $signupError; ?></h6>
                            </div>
                            <?php endif; ?>
                            <form action='' method='POST'>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Matric Number" name='matno'
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
                                    <input type="text" class="form-control" placeholder="College" name='college' required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Department" name='dept' required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Program" name='program' required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Level" name='level' required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name='password'
                                        required>
                                </div>
                                <button type="submit" class="btn btn-default" name='signup'><i
                                        class="fa fa-lock"></i> Sign Up</button>
                                <a href="index.php" class="btn btn-primary" style="float:right;">Back to Login</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class="navbar-fixed-bottom">
        <div class="container-fluid ui-widget-header text-center">
            <marquee scrolldelay="20%"> Powered by Computer Science Department, 2018 Academic Session Students, The
                FEDERAL POLYTECHNIC Bauchi, Nigeria</marquee>
        </div>
    </footer>

    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="public/datepicker/jquery-ui.min.js"></script>
    <script src="public/js/jquery-1.9.1.min.js"></script>
    <script src="public/js/jssor.slider.min.js"></script>
</body>

</html>
