<section class="cat_product_area section_gap">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="product_top_bar">
                    <div class="left_dorp">
                        <h5><?php echo !empty($title)?$title:'Danh Sách Sản Phẩm'  ?></h5>
<!--                        <select class="sorting" style="display: none;">-->
<!--                            <option value="1">Default sorting</option>-->
<!--                            <option value="2">Default sorting 01</option>-->
<!--                            <option value="4">Default sorting 02</option>-->
<!--                        </select><div class="nice-select sorting" tabindex="0"><span class="current">Default sorting</span><ul class="list"><li data-value="1" class="option selected">Default sorting</li><li data-value="2" class="option">Default sorting 01</li><li data-value="4" class="option">Default sorting 02</li></ul></div>-->
<!--                        <select class="show" style="display: none;">-->
<!--                            <option value="1">Show 12</option>-->
<!--                            <option value="2">Show 14</option>-->
<!--                            <option value="4">Show 16</option>-->
<!--                        </select><div class="nice-select show" tabindex="0"><span class="current">Show 12</span><ul class="list"><li data-value="1" class="option selected">Show 12</li><li data-value="2" class="option">Show 14</li><li data-value="4" class="option">Show 16</li></ul></div>-->
                    </div>
                </div>

                <div class="latest_product_inner">
                    <div class="row">
                        <?php if(!empty($list_product_byCate)){
                            foreach ($list_product_byCate as $key => $prodItem){ ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <div class="product-img">
                                    <img class="card-img" src="<?php echo _WEB_ROOT.$prodItem['feature_image_path'] ?>" alt="">
                                    <div class="p_icon">
                                        <a href="#">
                                            <i class="ti-eye"></i>
                                        </a>
                                        <a href="#">
                                            <i class="ti-heart"></i>
                                        </a>
                                        <a href="<?php _WEB_ROOT ?>/product/product_detail/<?=$prodItem['id']?>">
                                            <i class="ti-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-btm">
                                    <a href="<?php _WEB_ROOT ?>/product/product_detail/<?=$prodItem['id']?>" class="d-block">
                                        <h4><?=$prodItem['name'] ?></h4>
                                    </a>
                                    <div class="mt-3">
                                        <span class="mr-4"><?= number_format($prodItem['price'],0,',','.') ?> đ</span>
<!--                                        <del>$35.00</del>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }}?>

                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Danh Mục </h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <?php
                                if(!empty($list_category)){
                                    foreach ($list_category as $cateItem){
                                ?>
                                <li>
                                    <a href="<?= _WEB_ROOT?>/product/list_productByCate/<?=$cateItem['id']?>"><?= $cateItem['name'] ?></a>
                                </li>
                               <?php }} ?>
                            </ul>
                        </div>
                    </aside>


                </div>
            </div>
        </div>
    </div>
</section>