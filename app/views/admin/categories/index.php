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
                <a href="<?php echo _WEB_ROOT ?>/admin/categories/create">
                    <button class="btn btn-primary mt-2 mt-xl-0">Thêm danh mục</button>
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
                            <th>Tên Danh Mục</th>
                            <th>Danh mục chính</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php


                        if (!empty($categories)) {
                            foreach ($categories as $key => $cateItem) {?>
                                <tr>
                                    <td><?=$key+1 ?></td>
                                    <td class="py-1"><?= $cateItem['name'] ?></td>
                                    <td>
                                        <?php
                                        if(!empty($list_parent_cate)){
                                            foreach ($list_parent_cate as  $parentCate){
                                               if( $parentCate['id'] == $cateItem['parent_id']){

                                                   echo   ' <label class="badge badge-success">'. $parentCate['name'].'</label>';

                                               };
                                            }
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <a href="<?php echo _WEB_ROOT ?>/admin/categories/edit/<?=$cateItem['id']?>"><button class="btn btn-primary">Sửa</button></a>
<!--                                        <a href="--><?php //echo _WEB_ROOT ?><!--/admin/categories/delete/--><?//=$cateItem['id']?><!--"><button class="btn btn-danger">Xoá</button></a>-->
                                        <a href="<?php echo _WEB_ROOT ?>/admin/categories/delete/<?=$cateItem['id']?>" data-url="<?php echo _WEB_ROOT ?>/admin/categories/delete/<?=$cateItem['id']?>" class="btn btn-danger actionDelete">Xoá</a>

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
