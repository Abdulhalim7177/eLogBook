<?php
error_reporting(1);
include_once 'includes/session.php';
include_once 'includes/zz.php';
include_once 'includes/functions.php';
include_once 'models/studentinfo.php';

confirm_logged_in();

$serial = 1;
$inc = 1;
?>
<?php require 'views/header.php'; ?>

<div id="page-content">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .containe {
            margin: 20px;
        }
        .white-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table {
            background: #fff;
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
        }
        .table th {
            background: #007bff;
            color: #fff;
        }
        .btn-primary {
            margin-right: 5px;
        }
        .sidebar-widget ul {
            list-style: none;
            padding: 0;
        }
        .sidebar-widget ul li a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .sidebar-widget ul li a:hover {
            background: #007bff;
            color: #fff;
            border-radius: 5px;
        }
    </style>
    <div class="containe">
        <div class="row g-2">
            <div class="col-sm-9 page-content">
                <div class="white-container mb0">
                    <div id='thegentable' class='pb90'>
                        <h4 class="mb-3">Student Work Done</h4>
                        <?php if ($_SESSION['adminrole'] == 'Administrator') { ?>
                            <a href="#" id='shownew' class="btn btn-primary mb-3">Add New Work Done</a>
                        <?php } else {
                            $thel = mysqli_query($connection, "SELECT * FROM siwespost WHERE siwesMat = '$matno'");
                            if (mysqli_num_rows($thel) > 0) { ?>
                                <a href="#" id='shownew' class="btn btn-primary mb-3">Add New Work Done</a>
                            <?php } else { ?>
                                <h3>NO SIWES INDUSTRY ASSIGNED YET</h3>
                            <?php }
                        }
                        $thelogs = mysqli_query($connection, "SELECT * FROM logbook WHERE logbookMat = '$matno' and logbookDelete = '0' ORDER BY logbookId DESC");
                        if (mysqli_num_rows($thelogs) == 0) { ?>
                            <p class='pt20 mb90 pb210'>You have not added any work progress yet.</p>
                        <?php } else { ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Supervisor Comment</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($logrow = mysqli_fetch_array($thelogs)) { ?>
                                        <tr>
                                            <td><?php echo $serial; ?></td>
                                            <td><?php echo date_format(date_create($logrow['logbookDate']), 'l F j, Y'); ?></td>
                                            <td><?php echo $logrow['logbookDesc']; ?>
                                                <?php if ($logrow['logbookAttach'] != ''): ?>
                                                    <p><a href='models/downloadfile.php?thedocument=<?php echo $logrow['logbookAttach']; ?>' class="btn btn-primary">Download Attachment</a></p><br>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $logrow['logbookComment']; ?></td>
                                            <td>
                                                <a href="models/logedit.php?log=<?php echo $logrow['logbookId']; ?>" class='btn btn-success btn-sm' title='Edit'><i class="fa fa-edit"></i></a>
                                                <a data-href="models/logdelete.php?log=<?php echo $logrow['logbookId']; ?>" data-toggle="modal" data-target="#confirm-delete" href="#" class='btn btn-danger btn-sm' title='Delete'><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php $serial++; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                    <div id='thenew'>
                        <form method='post' action="models/newworkdone.php" enctype='multipart/form-data' >
                            <fieldset>
                                <legend>New Work Done</legend>
                                <div class="form-group">
                                    <label for="logbookDesc">Description of Work Done:</label>
                                    <textarea name="logbookDesc" id="logbookDesc" rows='5' class="form-control" required></textarea>
                                    <script>
                                        CKEDITOR.replace('logbookDesc');
                                    </script>
                                </div>
                                <div class="form-group mt20">
                                    <label for="logbookAttach">Attachment where necessary (For your Sketches, Diagrams and Graphs, upload a document with file types .pdf .doc .docx .xls .xlsx, Max Size: 3mb):</label>
                                    <input type="file" name="logbookAttach" class="form-control">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                <a href="#" id='hidenew' class="btn btn-secondary">Cancel</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 page-sidebar">
                <aside>
                    <div class="white-container sidebar-widget">
                        <h5>Welcome <br> <strong><?php echo ucwords($sname . ' ' . $fname . ' ' . $mname); ?></strong></h5>
                        <div class="mb-3">
                            <strong>REG NO:</strong> <?php echo ucwords($matno); ?><br>
                            <strong>DEPARTMENT:</strong> <?php echo ucwords($program); ?><br>
                            <strong>LEVEL:</strong> <?php echo ucwords($level); ?><br>
                            <strong>STATUS:</strong> <?php echo ucwords($studentshipStatus); ?>
                        </div>
                        <ul>
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
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var showNewButton = document.getElementById('shownew');
        var hideNewButton = document.getElementById('hidenew');
        var newForm = document.getElementById('thenew');
        var genTable = document.getElementById('thegentable');

        newForm.style.display = 'none';

        showNewButton.addEventListener('click', function(e) {
            e.preventDefault();
            newForm.style.display = 'block';
            genTable.style.display = 'none';
        });

        hideNewButton.addEventListener('click', function(e) {
            e.preventDefault();
            newForm.style.display = 'none';
            genTable.style.display = 'block';
        });
    });
</script>
<style>
    @media (max-width: 768px) {
        .containe {
            margin: 5px;
        }
        .white-container {
            padding: 10px;
        }
        .table th, .table td {
            padding: 8px;
        }
        .btn-primary, .btn-secondary {
            width: 100%;
            margin-bottom: 10px;
        }
        .sidebar-widget ul li a {
            padding: 8px;
        }
    }
</style>





<!-- Modal Confirmation -->
<div class="modal fade" id="confirm-delete" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method='post' class='theform' action=''>
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this work done? If Yes, give a reason below</p>
                    <div class="form-group">
                        <label for="reason">Reason</label>
                        <textarea required name='reason' id='reason' class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger themodal">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'views/footer.php'; ?>