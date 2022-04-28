<style>
    .auth form .form-group .form-control, .auth form .form-group .dataTables_wrapper select, .dataTables_wrapper .auth form .form-group select {
        background: transparent;
        border-radius: 0;
        font-size: .9375rem;}
    .form-control-lg{
        border-radius: 0px !important;
    }
</style>


<div class="row">
    <?php if(!empty($msg)){ ?>
        <div class="col-md-4  mx-auto">
            <div class="alert alert-danger" role="alert">
                <?php echo $msg ?>
            </div>
        </div>
    <?php } ?>
</div>

<div class="row">
    <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

            <h4>Đăng Ký Tài Khoản</h4>
            <h6 class="font-weight-light">Đăng ký để tiếp tục mua hàng.</h6>
            <form class="pt-3" method="post" action="<?php echo _WEB_ROOT ?>/resigter/store">
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

                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Nhập lại Password">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg"
                           placeholder="Địa chỉ" name="address" value="<?php echo old('address') ?>">
                    <?php echo form_error('address','<span style="color: red">','</span>') ?>

                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg"
                           placeholder="Số điện thoại" name="phone" value="<?php echo old('phone') ?>">
                    <?php echo form_error('phone','<span style="color: red">','</span>') ?>

                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                           placeholder="Email" name="email" value="<?php echo old('email') ?>">
                    <?php echo form_error('email','<span style="color: red">','</span>') ?>

                </div>



                <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Đăng Ký</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                    Tôi đã có tài khoản! <a href="<?php echo _WEB_ROOT ?>/login/viewLogin" class="text-primary">Đăng Nhập</a>
                </div>
            </form>
        </div>
    </div>

</div>