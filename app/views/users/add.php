<?php

echo (!empty($msg))?$msg:false;

?>
<h1> Xin chào đây là thêm Tài khoản</h1>
<?php HtmlHelper::formOpen('post',_WEB_ROOT.'/home/post_user'); ?>
    <div class="div">
        <lable>
            Nhập tên:
            <input type="text" placeholder="nhập tên" name="fullname" value="<?php echo old('fullname') ?>">
        </lable>
      <?php echo form_error('fullname','<span style="color: red">','</span>') ?>

    </div>

    <div class="div">
        <lable>
            Nhập email:
            <input type="email" placeholder="nhập tên" name="email" value="<?php echo old('email') ?>">
            <?php echo form_error('email','<span style="color: red">','</span>') ?>

        </lable>
    </div>
    <div class="div">
        <lable>
            Nhập tuổi:
<!--            <input type="number" placeholder="nhập tuổi" name="age" value="--><?php //echo !empty($old['age'])? $old['age']:false; ?><!--">-->
            <input type="number" placeholder="nhập tuổi" name="age" value="<?php echo old('age') ?>">

            <!--            --><?php //echo (!empty($errors) && array_key_exists('age',$errors)?'  <span style="color: red">'.$errors['age'].'</span>':false) ?>
            <?php echo form_error('age','<span style="color: red">','</span>') ?>
        </lable>
    </div>
    <div class="div">
        <lable>
            Nhập mật khẩu:
            <input type="password" placeholder="nhập tên" name="password" >
<!--            --><?php //echo (!empty($errors) && array_key_exists('password',$errors)?'  <span style="color: red">'.$errors['password'].'</span>':false) ?>
            <?php echo form_error('password','<span style="color: red">','</span>') ?>
        </lable>
    </div>
    <div class="div">
        <lable>
            Nhập lại password:
            <input type="password" placeholder="nhập lại pass" name="confirm_password"  >
<!--            --><?php //echo (!empty($errors) && array_key_exists('confirm_password',$errors)?'  <span style="color: red">'.$errors['confirm_password'].'</span>':false) ?>
            <?php echo form_error('confirm_password','<span style="color: red">','</span>') ?>
        </lable>
    </div>

    <button type="submit" >Thêm</button>
<?php HtmlHelper::formClose(); ?>