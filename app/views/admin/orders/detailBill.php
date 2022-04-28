<style>
    .table td img {
        width: 100px;
        height: 100px;
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

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo !empty($msg)? '<div class="alert alert-danger" role="alert">'.$msg.'</div>':false; ?>
        <?php echo !empty($msgSuccess)? '<div class="alert alert-success" role="alert">'.$msgSuccess.'</div>':false; ?>
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
                            <th>Tên sản Phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php


                        if (!empty($list_prod)) {
                            $totalBill=0;
                            foreach ($list_prod as $key => $prodItem) {


                                ?>

                                <tr>

                                    <td class="py-1"><?= $key ?></td>
                                    <td>
                                        <?= $prodItem['name'] ?>
                                    </td>
                                    <td><img width="200px" src="<?= $prodItem['image'] ?>" alt="">

                                    </td>
                                    <td>
                                        <?= number_format($prodItem['price'],0,',','.') ?> đ
                                    </td>
                                    <td>
                                       x<?= $prodItem['qty'] ?> (Cái)
                                    </td>
                                    <td>
                                        <?php $total =$prodItem['qty']*$prodItem['price'];$totalBill +=$total;  echo number_format($total,0,',','.') ?> đ
                                    </td>

                                </tr>

                            <?php } ?>
                            <tr>

                                <td colspan="2">
                                    <form action="<?php echo _WEB_ROOT ?>/admin/orders/updateBill/<?=!empty($billId)?$billId:"null"?>" method="post">
                                        <input class="btn btn-danger" type="submit" name="status" value="Huỷ đơn"></input>
                                        <input class="btn btn-warning" type="submit" name="status" value="Đang xữ lý"></input>
                                        <input class="btn btn-success" type="submit" name="status" value="Đã Giao Hàng"></input>
                                    </form>
                                </td>
                                <td></td>
                                <td></td>
                                <td><strong>Tổng Hoá Đơn:</strong></td>
                                <td><strong><?= number_format($totalBill,0,',','.')?> đ</strong></td>
                            </tr>
                       <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
