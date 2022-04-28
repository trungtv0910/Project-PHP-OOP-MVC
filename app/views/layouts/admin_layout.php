<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- plugins:css -->
    <link rel="stylesheet"
          href="<?php echo _WEB_ROOT ?>/public/assets/admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/admin/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet"
          href="<?php echo _WEB_ROOT ?>/public/assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/admin/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo _WEB_ROOT ?>/public/assets/admin/images/favicon.png"/>
    <title><?php echo (!empty($page_title)) ? $page_title : 'Trang Chủ' ?></title>
    <link href="<?php echo _WEB_ROOT ?>/public/assets/admin/js/select2/select2.min.css" rel="stylesheet" />


</head>
<style>
    .sidebar .nav .nav-item.active > .nav-link i, .sidebar .nav .nav-item.active > .nav-link .menu-title{
        color: black;
    }
    .menu-title, .nav-link i,.navbar-toggler {
        color: white !important;
    }

     .form-control, .dataTables_wrapper select{
         border :1px solid #1a1a1a;
     }
    select.form-control, .dataTables_wrapper select {
        border :1px solid #1a1a1a;
    }
    .sidebar,.navbar .navbar-brand-wrapper {
        background-color:   #343a40;
    }


</style>
<body>
<!--cách 1 dùng include hoặc requid-->
<!--cách  2 dùng $this->render() hoặc view-->

<!--header-->
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php $this->render('components/admin_navbar'); ?>

    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php $this->render('components/admin_sidebar'); ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <?php $this->render($content, $sub_content) ?>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php $this->render('components/admin_footer'); ?>

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!--content-->


<!--end content-->


<!--footer-->
<?php
$this->render('components/admin_footer');
?>


<!-- plugins:js -->
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/vendors/chart.js/Chart.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/off-canvas.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/hoverable-collapse.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/dashboard.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/data-table.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/jquery.dataTables.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page-->
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/jquery.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/customer.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/sweetalert.js"></script>
<!--file upload-->
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/file-upload.js"></script>

<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/select2/select2.min.js"></script>
<script>
    $(function (){
        $(".roles_select_choose").select2({
            tags: true,
            tokenSeparators: [',']
        });
        $(".select2_init").select2({
            placeholder: "Select a state",
            allowClear: true
        })
    })
</script>
</body>
</html>