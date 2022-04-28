<style>

    .table td img {
        width: 100px;
        height: 100px;
        border-radius: 0%;
    }
</style>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-5">
                    <h2> <?php echo(!empty($title) ? $title : false) ?></h2>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">
                            &nbsp;/&nbsp;<?php echo(!empty($title) ? $title : false) ?>&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor"> <?php echo(!empty($title_child) ? '/' . $title_child : false) ?></p>
                    </div>
                </div>

            </div>
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
                <a href="<?php echo _WEB_ROOT ?>/admin/products/create">
                    <button class="btn btn-primary mt-2 mt-xl-0"><?php echo (!empty($btn_add))?$btn_add:'Thêm' ?></button>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= (!empty($title_child)?$title_child:'') ?></h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Danh mục</th>
                            <th>Ảnh</th>
                            <th>Mô Tả</th>
                            <th>Giá</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php


                        if (!empty($product_list)) {
                            foreach ($product_list as $key => $prodItem) {?>
                                <tr>
                                    <td><?=$key+1 ?></td>
                                    <td class="py-1"><?= $prodItem['name'] ?></td>
                                    <td><?php
                                        if(!empty($categories)){
                                            foreach ($categories as $cateItem){
                                                if($cateItem['id']==$prodItem['category_id']){
                                                    echo $cateItem['name'];
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td ><img width="100%"  src="<?= _WEB_ROOT.$prodItem['feature_image_path']?>" alt=""></td>
                                    <td><?=$prodItem['content']?></td>
                                    <td><?=number_format($prodItem['price'],0,',','.')?> Đ</td>



                                    <td>
                                        <a href="<?php echo _WEB_ROOT ?>/admin/products/edit/<?=$prodItem['id']?>"><button class="btn btn-primary">Sửa</button></a>
                                        <!--                                        <a href="--><?php //echo _WEB_ROOT ?><!--/admin/categories/delete/--><?//=$cateItem['id']?><!--"><button class="btn btn-danger">Xoá</button></a>-->
                                        <a href="<?php echo _WEB_ROOT ?>/admin/products/delete/<?=$prodItem['id']?>" data-url="<?php echo _WEB_ROOT ?>/admin/products/delete/<?=$prodItem['id']?>" class="btn btn-danger actionDelete">Xoá</a>

                                    </td>

                                </tr>
                            <?php }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
