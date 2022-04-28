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

                            <th>Mã Đơn</th>
                            <th>Tên Khách Hàng</th>
                            <th>Điện Thoại</th>
                            <th>Email</th>
                            <th>Địa Chỉ</th>
                            <th>Trạng Thái</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php


                        if (!empty($list_bill)) {
                            foreach ($list_bill as $key => $billItem) {
                                $info_bill = $billItem['info_bill'];
                                $info_bill=json_decode($info_bill,true);
                                ?>
                                 <?php if(!empty($info_bill)){
//                                     foreach ($info_bill as $keyInfo => $InfoBill ){
                                     ?>
                                <tr>

                                    <td class="py-1"><?= $billItem['id'] ?></td>
                                    <td>
                                        <?= $info_bill['name'] ?>
                                    </td>
                                    <td>
                                        <?= $info_bill['phone'] ?>
                                    </td>
                                    <td>
                                        <?= $info_bill['email'] ?>
                                    </td>
                                    <td>
                                        <?= $info_bill['address'] ?>
                                    </td>
                                    <td>
                                        <?php if($billItem['status']=='Đang xữ lý')
                                        {echo '<label class="badge badge-warning">Đang Xử Lý</label>';}
                                        else if($billItem['status']=='Đã Giao Hàng'){
                                            echo '<label class="badge badge-success">Đã Giao Hàng</label>';
                                        }else if($billItem['status']=='Huỷ đơn'){
                                            echo '<label class="badge badge-danger">Đã huỷ</label>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo _WEB_ROOT ?>/admin/orders/viewCartById/<?=$billItem['id'] ?>"><button class="btn btn-primary">Xem</button></a>
                                        <!--                                        <a href="--><?php //echo _WEB_ROOT ?><!--/admin/categories/delete/--><?//=$cateItem['id']?><!--"><button class="btn btn-danger">Xoá</button></a>-->

                                    </td>

                                </tr>
                                <?php }
//                            }
                            ?>
                            <?php }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
