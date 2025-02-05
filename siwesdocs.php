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

$matno = $_SESSION['matno']; // Ensure $matno is defined

$getpost = "SELECT * FROM siwespost WHERE siwesMat = '$matno' ORDER BY siwesPostId DESC LIMIT 1";
$thepost = mysqli_query($connection, $getpost);
if ($thepost && mysqli_num_rows($thepost) > 0) {
    $postrow = mysqli_fetch_array($thepost);
} else {
    $postrow = [
        'siwesCompName' => '',
        'siwesCompAdd' => '',
        'siwesCompCountry' => '',
        'siwesCompState' => '',
        'siwesSupervisor' => ''
    ];
}
?>
<?php require('views/header.php'); ?>

<div id="page-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 page-content">
                <div class="white-container mb0">
                    <div id='thegentable' class='pb90'>
                        <h4 class="mb-3">My Work Documents</h4>
                        <?php
                        $thelogs = mysqli_query($connection, "SELECT * FROM logbook WHERE logbookMat = '$matno' and logbookDelete = '0' ORDER BY logbookId DESC");
                        if (mysqli_num_rows($thelogs) == 0) { ?>
                            <p class='pt20 mb90 pb210'>No document to display.</p>
                        <?php } else { ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Description</th>
                                        <th>Supervisor Comment</th>
                                    <?php 
                                    $serial = 1; // Initialize $serial
                                    ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($logrow = mysqli_fetch_array($thelogs)) { ?>
                                        <tr>
                                            <td><?php echo $serial; ?></td>
                                            <td><?php echo $logrow['logbookDesc']; ?>
                                                <?php if ($logrow['logbookAttach'] != ''): ?>
                                                    <p><a href='models/downloadfile.php?thedocument=<?php echo $logrow['logbookAttach']; ?>' class="btn btn-primary">Download Document</a></p><br>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $logrow['logbookComment']; ?></td>
                                        </tr>
                                        <?php $serial++; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
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
                            <li ><a href="mylogbook.php">MY LOGBOOK</a></li>
                            <li><a href="siwes.php">MY SIWES DETAILS</a></li>
                            <li class="active"><a href="siwesdocs.php">MY IT DOCUMENTS</a></li>
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
