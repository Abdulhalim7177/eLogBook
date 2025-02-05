<?php
error_reporting(0);
include_once 'includes/session.php';
include_once 'includes/zz.php';
include_once 'includes/functions.php';

if (isset($_POST['submit'])) {
    $matno = $_POST['matno'];
    $fno = $_POST['regno'];

    // Search for matric
    $getstdnt = "SELECT * FROM reglist WHERE matno='$matno' AND password='$fno'";
    $stdnt = mysqli_query($connection, $getstdnt);
    if (!$stdnt) {
        $incorrectLogin = 'Wrong';
    }

    if (mysqli_num_rows($stdnt) < 1) {
        // Invalid Matric Number
        $incorrectLogin = 'Matric No. or Reg No. Incorrect';
    } else {
        // Valid Matric Number
        $_SESSION['matno'] = $matno;
        $_SESSION['is_logged_in'] = true;
        header('Location:mylogbook.php');
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
    <title> FPTB E-SIWES</title>
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
    <div class="container-fluid" style="margin-top:5px;">
        <div class="row">
            <div class="col-lg-9">
                <!-- Jssor Slider Begin -->
                <!-- ================================================== -->
                <div id="slider1_container" class="well modal-dialog modal-content"
                    style="visibility: hidden; position: relative; margin: 0 auto; width: 1140px; height: 428px; overflow:hidden;">

                    <!-- Loading Screen -->
                    <div data-u="loading"
                        style="position:absolute;top:0px;left:0px;background:url(public/img/loading.gif) no-repeat 50% 50%; background-color: rgba(0, 0, 0, .7);">
                    </div>

                    <!-- Slides Container -->
                    <div u="slides"
                        style="position: absolute; left: 0px; top: 0px; width: 1140px; height: 442px;overflow: hidden;">
                        <div>
                            <img u="image" src2="public/img/home/1.jpg" />
                        </div>
                        <div>
                            <img u="image" src2="public/img/home/2.jpeg" />
                        </div>
                        <div>
                            <img u="image" src2="public/img/home/3.jpg" />
                        </div>
                        <div>
                            <img u="image" src2="public/img/home/4.jpg" />
                        </div>
                        <div>
                            <img u="image" src2="public/img/home/5.jpg" />
                        </div>
                        <div>
                            <img u="image" src2="public/img/home/6.jpg" />
                        </div>
                        <div>
                            <img u="image" src2="public/img/home/7.jpg" />
                        </div>
                        <div>
                            <img u="image" src2="public/img/home/8.jpg" />
                        </div>
                    </div>

                    <!--#region Bullet Navigator Skin Begin -->
                    <style>
                    .jssorb051 .i {
                        position: absolute;
                        cursor: pointer;
                    }

                    .jssorb051 .i .b {
                        fill: #fff;
                        fill-opacity: 0.5;
                        stroke: #000;
                        stroke-width: 400;
                        stroke-miterlimit: 10;
                        stroke-opacity: 0.5;
                    }

                    .jssorb051 .i:hover .b {
                        fill-opacity: .7;
                    }

                    .jssorb051 .iav .b {
                        fill-opacity: 1;
                    }

                    .jssorb051 .i.idn {
                        opacity: .3;
                    }
                    </style>
                    <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;"
                        data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                        <div data-u="prototype" class="i" style="width:16px;height:16px;">
                            <svg viewBox="0 0 16000 16000"
                                style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                            </svg>
                        </div>
                    </div>
                    <!--#endregion Bullet Navigator Skin End -->

                    <!--#region Arrow Navigator Skin Begin -->
                    <style>
                    .jssora051 {
                        display: block;
                        position: absolute;
                        cursor: pointer;
                    }

                    .jssora051 .a {
                        fill: none;
                        stroke: #fff;
                        stroke-width: 360;
                        stroke-miterlimit: 10;
                    }

                    .jssora051:hover {
                        opacity: .8;
                    }

                    .jssora051.jssora051dn {
                        opacity: .5;
                    }

                    .jssora051.jssora051ds {
                        opacity: .3;
                        pointer-events: none;
                    }
                    </style>
                    <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;"
                        data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                        </svg>
                    </div>
                    <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;"
                        data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                        </svg>
                    </div>
                </div>
                <style>
                .indexnote {
                    color: blue;
                    font-size: large;
                    font-style: italic;
                    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                    text-shadow: royalblue;
                    text-transform: lowercase;
                    text-align: center;
                    /* style="color:darkblue;text:bold;" */
                }
                </style>
                <h5 class="indexnote" ></br>ALL STUDENTS ON IT ARE HEREBY WARNED AGAINST USING MANUAL LOG BOOK AS MANUAL LOG BOOK HAS NOW BEEN FULLY AUTOMATED. THEREFORE IT STUDENTS ARE STRICTLY ADVISED TO SIGN DAILY ATTENDANCE, REPORT WEEKLY AND MONTHLY ACTIVITIES ONLINE. FAILURE TO FOLLOW THIS INSTRUCTION INVALIDATES YOUR IT AS NO SUPERVISOR WILL BE ASSIGNED TO YOU.<br>To properly sign daily attendance, submit weekly and monthly reports YOU MUST FIRST SUPPLY INFORMATION ABOUT THE ORGANIZATION WHERE YOU ARE DOING THE IT OR YOU CANNOT PROCEED WITH ANY OF THE OPERATIONS.</h5>            </div>
            <div class="col-lg-3">
                <div class="panel ui-widget-shadow" style="margin:0;max-width:350px;height:420px;">
                    <h4 class="panel-heading panel-title text-center ui-widget-header" id="myModalLabel">Student Login</h4>
                    <div class="panel-body ui-widget-content">
                        <div class="well" style="position:relative;top:5px;height:276px;">
                            <input type="hidden" name="login_token" value="63eafa8d" />
                            <div class="form-group">
                                <div class="widget-content">
                                    <?php if (isset($incorrectLogin)) : ?>
                                        <div class='alert alert-error'>
                                            <h6><?php echo $incorrectLogin; ?></h6>
                                            <a href='#' class='close fa fa-times'></a>
                                        </div>
                                    <?php endif; ?>
                                    <form class="mt30" action='' method='POST'>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username" name='matno' required>
                                            <input type="password" class="form-control" placeholder="Password" name='regno' required>
                                        </div>
                                        <center>
                                            <button type="submit" class="btn btn-default" name='submit'><i class="fa fa-lock"></i> Sign In</button> 
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer ui-widget-header">
                        <a href="signup.php" class="btn btn-primary btn-block ui-button"><i class="fa fa-lock"></i> Student Sign Up</a>
                        <button class="btn btn-primary btn-block ui-button" name='op'><a href="siwesadmin.php"><i class="fa fa-lock"></i> Supervisor Login Page</a></button>
                    </div>
                    </div>
                </div>
            </div>

        </div>


        </div>
        <div class="row" style="margin-top:30px;margin-bottom:0px;">
        <div class="col-lg-3" >
            <div class="panel ui-widget-shadow" >
                <h3 class="panel-heading panel-title text-center ui-widget-header">News & Events</h3>
                <div class="panel-body ui-widget-content">
                <div class="panel-group" id="accordionfour">
                    <div class="panel-heading ui-widget-header">
                        <span class="panel-title"><a data-toggle="collapse" data-parent="#accordionfour" href="#news">Latest News</a></span>
                    </div>
                    <div id="news" class="panel-collapse collapse">
                       <div class="panel-body ui-widget-content">
                        	<a href="https://www.youtube.com/channel" target="_blank">ESIWES YOUTUBE CHANNEL</a><br>
                            <a href="https://t.me/joinchat/" target="_blank">IT STUDENTS TELEGRAM GROUP</a>
                       </div>
                    </div>
                    <div class="panel-heading ui-widget-header" style="margin-top:4px;">
                        <span class="panel-title"><a data-toggle="collapse" data-parent="#accordionfour" href="#events">Latest Events</a></span>
                    </div>
                    <div id="events" class="panel-collapse collapse">
                        <div class="panel-body ui-widget-content">
                                                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel ui-widget-shadow">
                <h3 class="panel-heading panel-title text-center ui-widget-header">BUK Mission & Vision</h3>
                <div class="panel-body ui-widget-content">
                    <div class="panel-group" id="accordion">
                        <div class="panel-heading ui-widget-header">
                            <span class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#vision">Vision Statement</a></span>
                        </div>
                        <div id="vision" class="panel-collapse collapse">
                            <div class="panel-body text-justify ui-widget-content">
                            To lead in research and education in Africa.
                            </div>
                        </div>
                        <div class="panel-heading ui-widget-header" style="margin-top:4px;">
                            <span class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#mission">Mission Statement</a></span>
                        </div>
                        <div id="mission" class="panel-collapse collapse">
                            <div class="panel-body text-justify ui-widget-content">
                            Committed to addressing African Developmental challenges 
                            through cutting-edge research, knowledge transfer 
                            and training of high-quality graduates.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel ui-widget-shadow" >
                <h3 class="panel-heading panel-title text-center ui-widget-header">ITF Mission & Vision</h3>
                <div class="panel-body ui-widget-content">
                    <div class="panel-group" id="accordiontwo">
                        <div class="panel-heading ui-widget-header">
                            <span class="panel-title"><a data-toggle="collapse" data-parent="#accordiontwo" href="#visiontwo">Vision Statement</a></span>
                        </div>
                        <div id="visiontwo" class="panel-collapse collapse">
                            <div class="panel-body text-justify ui-widget-content">
                            To be the leading skills development organization 
                            in Nigeria and one of the best in the world.
                            </div>
                        </div>
                        
                        <div class="panel-heading ui-widget-header" style="margin-top:4px;">
                            <span class="panel-title"><a data-toggle="collapse" data-parent="#accordiontwo" href="#missiontwo">Mission Statement</a></span>
                        </div>
                        <div id="missiontwo" class="panel-collapse collapse">
                            <div class="panel-body text-justify ui-widget-content">
                                To set and regulate standards and offer direct
                                training intervention in industrial and commercial,
                                using a corps of highly competent professional staff,
                                modern techniques and technology.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel ui-widget-shadow">
                <h3 class="panel-heading panel-title text-center ui-widget-header">BUK Gallery</h3>
                <div class="panel-body ui-widget-content">
                    <div class="panel-group" id="accordionthree">
                        <div class="panel-heading ui-widget-header">
                            <span class="panel-title"><a data-toggle="collapse" data-parent="#accordionthree" href="#magazine">BUK Herald Magazine</a></span>
                        </div>
                        <div id="magazine" class="panel-collapse collapse">
                            <a href="http://fptb.edu.ng/app/assets/files/fptb_HERALD_Online.pdf" target="_blank">Magazine</a>
                        </div>
                        <div class="panel-heading ui-widget-header" style="margin-top:4px;">
                            <span class="panel-title"><a data-toggle="collapse" data-parent="#accordionthree" href="#website">BUK Website</a></span>
                        </div>
                        <div id="website" class="panel-collapse collapse">
                            <a href="https://buk.edu.ng/home" target="_blank">BUK Official Website</a>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    </div>
    <footer class="navbar-fixed-bottom">
        <div class="container-fluid ui-widget-header text-center">
            <marquee scrolldelay="20%"> Powered by computer Science Department, 2018 Academic session student, The
                FEDERAL
                POLYTECHNIC
                Bauchi, Nigeria</marquee>
        </div>
    </footer>

    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="public/datepicker/jquery-ui.min.js"></script>
    <script src="public/js/jquery-1.9.1.min.js"></script>
    <script src="public/js/jssor.slider.min.js"></script>

    <script>
    jQuery(document).ready(function($) {
        var options = {
            $AutoPlay: 1, //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
            $AutoPlaySteps: 1, //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
            $Idle: 2000, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            $ArrowKeyNavigation: 1, //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
            $SlideEasing: $Jease$
                .$OutQuint, //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
            $SlideDuration: 800, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
            $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide, default value is 20
            //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
            //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
            $SlideSpacing: 0, //[Optional] Space between each slide in pixels, default value is 0
            $Cols: 1, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
            $Align: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
            $UISearchMode: 1, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
            $PlayOrientation: 1, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
            $DragOrientation: 1, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

            $ArrowNavigatorOptions: { //[Optional] Options to specify and enable arrow navigator or not
                $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
                $Steps: 1 //[Optional] Steps to go for each navigation request, default value is 1
            },

            $BulletNavigatorOptions: { //[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$, //[Required] Class to create navigator instance
                $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
                $Steps: 1, //[Optional] Steps to go for each navigation request, default value is 1
                $Rows: 1, //[Optional] Specify lanes to arrange items, default value is 1
                $SpacingX: 12, //[Optional] Horizontal space between each item in pixel, default value is 0
                $SpacingY: 4, //[Optional] Vertical space between each item in pixel, default value is 0
                $Orientation: 1 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
            }
        };

        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizing
        function ScaleSlider() {
            var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
            if (parentWidth) {
                jssor_slider1.$ScaleWidth(parentWidth - 30);
            } else
                window.setTimeout(ScaleSlider, 30);
        }
        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
    </script>
</body>

</html>