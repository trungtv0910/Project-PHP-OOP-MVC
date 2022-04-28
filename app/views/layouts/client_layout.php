<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="<?php echo _WEB_ROOT ?>/public/assets/clients/img/favicon.ico" type="image/png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/linericon/style.css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/themify-icons.css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/flaticon.css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/jquery-ui/jquery-ui.css" />
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/style.css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/responsive.css" />

<!--    customer-->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/customer.css" />

<!--    notivacation-->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/sweetablert2.min.css" />

    <title><?php echo (!empty($page_title))?$page_title:'Trang Chủ' ?></title>
<!--    <link rel="stylesheet" href="--><?php //echo _WEB_ROOT ?><!--/public/assets/clients/css/style.css">-->
</head>
<style>
    .section_gap{padding: 70px 0px}
    .header_area .navbar .nav .nav-item .nav-link {
        font: 400 13px/80px "roboto",sans-serif;
    }
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Roboto',sans-serif;

    }
</style>
<body>
<!--cách 1 dùng include hoặc requid-->
<!--cách  2 dùng $this->render() hoặc view-->
    <?php
    $this->render('components/header');
    ?>
<!--header-->

<!--content-->

<?php
$this->render($content,$sub_content) ?>
<!--end content-->


<!--footer-->
<?php
$this->render('components/footer');
?>
<!--notivacation-->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/popper.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/bootstrap.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/stellar.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/isotope/isotope-min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/vendors/counter-up/jquery.counterup.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/mail-script.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/theme.js"></script>


<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/sweetalert.js"></script>
<!--================ End footer Area  =================-->
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/script.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/cart.js"></script>




</body>
</html>