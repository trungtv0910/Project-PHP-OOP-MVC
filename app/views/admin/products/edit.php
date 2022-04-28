
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

                <form class="forms-sample" action="<?php echo _WEB_ROOT ?>/admin/products/update/<?=!empty($product['id'])?$product['id']:'' ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tên Sản Phẩm</label>
                        <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Nhập Tên Sản Phẩm"  value="<?php echo !empty($product['name'])?$product['name']:'' ?>">
                        <?php echo form_error('name','<span style="color: red">','</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Giá</label>
                        <input type="text" name="price" class="form-control" id="exampleInputUsername1" placeholder="Nhập Giá Sản Phẩm"  value="<?php echo !empty($product['price'])?$product['price']:'' ?>">
                        <?php echo form_error('price','<span style="color: red">','</span>') ?>
                    </div>
                    <div class="form-group">
                        <img width="200px" src="<?= (!empty($product['feature_image_path'])?_WEB_ROOT.$product['feature_image_path']:'') ?>" alt="">
                    </div>
                    <div class="form-group">
                        <label>Ảnh Sản Phẩm</label>
                        <input type="file" name="img" class="file-upload-default" value="<?= (!empty($product['feature_image_name'])?$product['feature_image_name']:'') ?>" >
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info"  value="<?= (!empty($product['feature_image_name'])?$product['feature_image_name']:'') ?>" placeholder="Upload Image">
                            <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                        <?php echo form_error('img','<span style="color: red">','</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Danh Mục</label>
                        <select class="form-control" name="category_id" >
                            <option value="0">Chọn Danh Mục</option>
                            <?php
                            if(!empty($categories)){
                                foreach ($categories  as $key => $cateItem){ ?>
                                        <?php if($cateItem['parent_id']!=0){ ?>
                                    <option <?= (($product['category_id'])==$cateItem['id']?'selected':''); ?> value="<?= $cateItem['id']?>"><?= $cateItem['name']?></option>
                                        <?php } ?>
                                <?php }} ?>
                        </select>
                         <?php echo form_error('category_id','<span style="color: red">','</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Nội dung sản phẩm</label>
                        <textarea name="content" class="form-control" id="exampleTextarea1" rows="10" >
                        <?= !empty($product['content'])? trim($product['content']):'' ?>
                        </textarea>
                        <?php echo form_error('content','<span style="color: red">','</span>') ?>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Thêm</button>
                    <button class="btn btn-light">Huỷ</button>
                </form>
            </div>
        </div>
    </div>
</div>
