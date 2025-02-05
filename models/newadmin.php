<?php
include_once("../includes/session.php");
include_once("../includes/zz.php");
include_once("../includes/functions.php");

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
                header("Location: ../dashboard.php");
                exit();
            } else {
                $signupError = "Error creating staff role. Please try again.";
            }
        } else {
            $signupError = "Error signing up. Please try again.";
        }
    }
}
?>