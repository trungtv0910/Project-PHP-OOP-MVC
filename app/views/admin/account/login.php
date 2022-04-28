<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/admin/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/admin/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo _WEB_ROOT ?>/public/assets/admin/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="<?php echo _WEB_ROOT ?>/public/assets/admin/images/logo.svg" alt="logo">
                        </div>
                        <h4>Xin chào! Bạn đang đăng nhập Admin</h4>

                        <form class="pt-3" action="<?php echo _WEB_ROOT ?>/admin/Admin_login/login" method="post" >
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                            </div>
                            <?php echo (!empty($msg))?"<span style='color: red'>".$msg."</span>":false; ?>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >ĐĂNG NHẬP</button>
                            </div>
<!--                            <div class="my-2 d-flex justify-content-between align-items-center">-->
<!--                                <div class="form-check">-->
<!--                                    <label class="form-check-label text-muted">-->
<!--                                        <input type="checkbox" class="form-check-input">-->
<!--                                        Keep me signed in-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                                <a href="#" class="auth-link text-black">Forgot password?</a href="#">-->
<!--                            </div>-->
<!--                            <div class="mb-2">-->
<!--                                <button type="button" class="btn btn-block btn-facebook auth-form-btn">-->
<!--                                    <i class="mdi mdi-facebook mr-2"></i>Connect using facebook-->
<!--                                </button>-->
<!--                            </div>-->
<!--                            <div class="text-center mt-4 font-weight-light">-->
<!--                                Don't have an account? <a href="register.html" class="text-primary">Create</a>-->
<!--                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/off-canvas.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/hoverable-collapse.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/template.js"></script>
<!-- endinject -->
</body>

</html>
