<?php
include_once("../includes/session.php");
include_once("../includes/zz.php");
include_once("../includes/functions.php");

confirm_adminlogged_in();

if(isset($_POST['std']) && isset($_POST['super'])) {
        $std = $_POST['std'];
        $super = $_POST['super'];
        $cname = $_POST['cname'];
        $cadd = $_POST['cadd'];
        $ccountry = $_POST['ccountry'];
        $state = $_POST['state'];
        
        // Convert date to MySQL format (YYYY-MM-DD)
        $cdate = date('Y-m-d', strtotime($_POST['cdate']));
        
        // Check if duration field exists before accessing
        $dur = isset($_POST['dur']) ? $_POST['dur'] : '';

        $loginTime = date('Y-m-d H:i:s');

        // Remove siwesDuration field since it doesn't exist in table
        $newprogress = mysqli_query($connection, "INSERT INTO siwespost (siwesOfficer, siwesMat, siwesCompName, siwesCompAdd, siwesCompCountry, siwesCompState, siwesCompDate, siwesCompLetter) 
                VALUES ('$super', '$std', '$cname', '$cadd', '$ccountry', '$state', '$cdate', '')");
        
        if(!$newprogress) {
                die("Database query failed: " . mysqli_error($connection));
        }
        confirm_query($newprogress);

        $newprogress2 = mysqli_query($connection, "UPDATE reglist SET studentshipStatus = 'Active' WHERE matno = '$std'");
        if(!$newprogress2) {
                die("Database query failed: " . mysqli_error($connection));
        }
        confirm_query($newprogress2);

        if ($newprogress && $newprogress2) {
                header("Location: ../activate.php");
                exit();
        } else {
                echo "Student cannot be assigned. Please try again.";
        }
} else {
        echo "Required fields are missing";
}
