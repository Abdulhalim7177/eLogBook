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
    $postrow = array(
        'siwesCompName' => 'No data to display',
        'siwesCompAdd' => 'No data to display',
        'siwesCompCountry' => 'No data to display',
        'siwesCompState' => 'No data to display',
        'siwesSupervisor' => 'No data to display',
        'siwesSupervisorNo' => 'No data to display',
        'siwesCompLetter' => ''
    );
}
?>
<?php require('views/header.php'); ?>

<div id="page-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 page-content">
                <div class="white-container mb0">
                    <fieldset>
                        <legend>Company Information</legend>
                        <div id='thegentable'>
                            <label>
                                Name of Company/Establishment:
                            </label>
                            <p><?php echo $postrow['siwesCompName']; ?></p>
                            <label>
                                Address of Company/Establishment:
                            </label>
                            <p><?php echo $postrow['siwesCompAdd']; ?></p>
                            <label>
                                Country of Company/Establishment:
                            </label>
                            <p><?php echo $postrow['siwesCompCountry']; ?></p>
                            <?php if ($postrow['siwesCompState'] != '') : ?>
                                <label>
                                    State of Company/Establishment:
                                </label>
                                <p><?php echo $postrow['siwesCompState']; ?></p>
                            <?php endif; ?>
                            <label>
                                Supervisor Name:
                            </label>
                            <p><?php echo $postrow['siwesSupervisor']; ?></p>
                            <label>
                                Supervisor Phone Number:
                            </label>
                            <p><?php echo $postrow['siwesSupervisorNo']; ?></p>
                            <?php if ($postrow['siwesCompLetter'] != '') : ?>
                                <a href='models/downloadletter.php?letter=<?php echo $postrow['siwesCompLetter']; ?>' class="btn btn-default mt20 mb20">Download Acceptance Letter</a>
                            <?php endif; ?>
                        </div>
                    </fieldset>
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
                            <li><a href="mylogbook.php">MY LOGBOOK</a></li>
                            <li><a href="siwes.php">MY SIWES DETAILS</a></li>
                            <li><a href="siwesdocs.php">MY IT DOCUMENTS</a></li>
                            <li class="active" ><a href="siwesorg.php">MY IT ORGANIZATION</a></li>
                            <li><a href="models/logout.php">LOG OUT</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div> <!-- end .container -->
</div> <!-- end #page-content -->

<?php require('views/footer.php'); ?>
