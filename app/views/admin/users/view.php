
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-5">
                    <h2> <?php echo (!empty($title)?$title:false) ?></h2>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;<?php echo (!empty($title)?$title:false) ?>&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor"> <?php echo (!empty($title_child)? '/'. $title_child:false) ?></p>
                    </div>
                </div>

            </div>
            <?php if(empty($title_child)){ ?>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                        <i class="mdi mdi-download text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-clock-outline text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                    <a href="<?php echo _WEB_ROOT ?>/admin/categories/create"><button class="btn btn-primary mt-2 mt-xl-0">Thêm danh mục</button></a>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo !empty($msg)? '<div class="alert alert-danger" role="alert">'.$msg.'</div>':false; ?>
        <?php echo !empty($msgSuccess)? '<div class="alert alert-success" role="alert">'.$msgSuccess.'</div>':false; ?>
    </div>


</div>
<div class="row ">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo (!empty($title_child)?  $title_child:'Form..') ?></h4>

                <form class="forms-sample" action="<?php echo _WEB_ROOT ?>/admin/users/update/<?=!empty($user['id'])?$user['id']:'' ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tên Khách Hàng</label>
                        <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Nhập Tên Sản Phẩm"  value="<?php echo !empty($user['name'])?$user['name']:'' ?>">
                        <?php echo form_error('name','<span style="color: red">','</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputUsername1"  value="<?php echo !empty($user['email'])?$user['email']:'' ?>">
                        <?php echo form_error('email','<span style="color: red">','</span>') ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Phone</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputUsername1"  value="<?php echo !empty($user['phone'])?$user['phone']:'' ?>">
                        <?php echo form_error('phone','<span style="color: red">','</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputUsername1"  value="<?php echo !empty($user['address'])?$user['address']:'' ?>">
                        <?php echo form_error('address','<span style="color: red">','</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Phân quyền</label>
                        <select name="roles[]" class="form-control roles_select_choose"  multiple="multiple">

                            <?php
                            if(!empty($role_list)){
                                foreach ($role_list as $roleItem){
                            ?>
                                    <option
                                        <?php
                                        if(!empty($roleOfUser)){
                                            foreach ($roleOfUser as $roleUser){
                                                if($roleUser['role_id']== $roleItem['id']){
                                                    echo 'selected';
                                                }

                                            }
                                        }
                                        ?>
                                            value="<?=$roleItem['id']?>"><?=$roleItem['display_name'] ?></option>
                            <?php }} ?>
                        </select>

                    </div>
                    <div class="form-group">

                    </div>



                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                    <button class="btn btn-light">Huỷ</button>
                </form>
            </div>
        </div>
    </div>
</div>
