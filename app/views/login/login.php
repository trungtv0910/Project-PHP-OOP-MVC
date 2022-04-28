<div class="row">
    <?php if(!empty($msg)){ ?>
    <div class="col-md-4  mx-auto">
        <div class="alert alert-danger" role="alert">
            <?php echo $msg ?>
        </div>
    </div>
    <?php } ?>
</div>
<style>
    .auth form .form-group .form-control, .auth form .form-group .dataTables_wrapper select, .dataTables_wrapper .auth form .form-group select {
        background: transparent;
        border-radius: 0 !important;
        font-size: .9375rem;}
    .form-control-lg{
        border-radius: 0px !important;

    }
</style>
<div class="row">
    <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <h4>Đăng Nhập</h4>
            <h6 class="font-weight-light">Đăng nhập để tiếp tục mua hàng.</h6>
            <form class="pt-3" method="post" action="<?php echo _WEB_ROOT ?>/Login/Login">
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1"
                           placeholder="Username" name="name" value="<?php echo old('name') ?>">
                    <?php echo form_error('name','<span style="color: red">','</span>') ?>

                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" value="<?php echo old('password') ?>"
                           placeholder="Password" name="password">
                    <?php echo form_error('password','<span style="color: red">','</span>') ?>
                </div>
                <?php if(!empty($msgError)){ ?>

                  <span style="color: red"><?=$msgError ?></span>

                <?php } ?>
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Đăng
                        Nhập
                    </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                    Tôi chưa có tài khoản! <a href="<?php echo _WEB_ROOT ?>/resigter" class="text-primary">Đăng Ký</a>
                </div>

            </form>
        </div>
    </div>

</div>

