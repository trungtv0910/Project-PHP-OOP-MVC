<h1> Xin chào đây là thêm danh mục</h1>
<form action="<?php echo _WEB_ROOT?>/home/post_user" method="post" >
    <div class="div">
        <lable>
            Nhập tên:
            <input type="text" placeholder="nhập tên" name="fullname" >
        </lable>
    </div>

    <div class="div">
        <lable>
            Nhập email:
            <input type="email" placeholder="nhập tên" name="email" >
        </lable>
    </div>
    <div class="div">
        <lable>
            Nhập mật khẩu:
            <input type="password" placeholder="nhập tên" name="password" >
        </lable>
    </div>
    <div class="div">
        <lable>
            Nhập số điện thoại:
            <input type="password" placeholder="nhập lại pass" name="confirm_password"  >
        </lable>
    </div>

    <button type="submit" >Thêm</button>
</form>