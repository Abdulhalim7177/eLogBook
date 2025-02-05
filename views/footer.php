<footer class="navbar-fixed-bottom">
    <div class="container-fluid ui-widget-header text-center">
        Powered by computer Science Department, 2018 Academic session student, BAYERO UNIVERSITY KANO, NiGERIA
    </div>
</footer>

<!-- Core JavaScript -->
<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/bootstrap-hover-dropdown.min.js"></script>
<script src="public/datepicker/jquery-ui.min.js"></script>
<script src="public/js/jssor.slider.min.js"></script>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="GetTemplate.com">
<title>FPTB E-SIWES</title>

<!-- CSS -->
<link rel="shortcut icon" href="public/img/gt_favicon.png">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:200,400,600|Open+Sans:300,400,700">
<link href="public/css/bootstrap.min.css" rel="stylesheet">
<link href="public/datepicker/themes/start/jquery-ui.min.css" rel="stylesheet">
<link href="public/css/sticky-footer-navbar.css" rel="stylesheet">

<style>
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 1050;
    overflow: auto;
}

.modal-dialog {
    position: relative;
    width: 500px;
    margin: 30px auto;
    margin-top: 60px;
}

.modal.show {
    display: block;
}

.modal-content {
    position: relative;
    background-color: #fff;
    border-radius: 6px;
    box-shadow: 0 3px 9px rgba(0,0,0,.5);
    margin: 0 auto;
}
</style>
</head>

</div> <!-- end #main-wrapper -->

<!-- Additional Scripts -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/maplace.min.js"></script>
<script src="assets/js/jquery.ba-outside-events.min.js"></script>
<script src="assets/js/jquery.responsive-tabs.js"></script>
<script src="assets/js/jquery.flexslider-min.js"></script>
<script src="assets/js/jquery.fitvids.js"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="assets/js/jquery.inview.min.js"></script>
<script src="assets/js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize all modals
    $('.modal').modal({
        show: false
    });
    
    // Handle modal triggers
    $('[data-toggle="modal"]').click(function() {
        var targetModal = $($(this).data('target'));
        targetModal.modal('show');
    });
});
</script>

</body>
</html>