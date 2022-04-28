<style>
    .new_product{

        padding: 33px 15px;
    }
    .new_product .product-img {
        padding: 10px 0px;
    }


</style>
<!--================ New Product Area =================-->
<section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
        <!--        <div class="row justify-content-center">-->
        <!--            <div class="col-lg-12">-->
        <!--                <div class="main_title">-->
        <!--                    <h2><span>new products</span></h2>-->
        <!--                    <p>Bring called seed first of third give itself now ment</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->

        <div class="row">
            <div class="col-lg-6">
                <?php if(!empty($best_product)){


                    ?>
                <div class="new_product">
                    <div class="title_new">
                        <h5 class="text-uppercase">Bộ sưu tập năm 2022</h5>
                        <h3 class="text-uppercase">Thời Trang Mùa Hè</h3>
                    </div>
                    <div class="product-img">

                        <img class="img-fluid"
                             src="<?php echo _WEB_ROOT.$best_product['feature_image_path'] ?>"
                             alt=""/>
                    </div>
                    <h4><?=number_format($best_product['price'],0,',','.' )?> đ</h4>
                    <a href="<?php echo _WEB_ROOT ?>/product/product_detail/<?=$best_product['id'] ?>" class="main_btn">Thêm Vào Giỏ Hàng</a>
                </div>
                <?php } ?>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="row">
                    <?php if(!empty($list_product_hot)){
                        foreach ($list_product_hot as $key => $prodItem){
                        ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <img class="img-fluid w-100"
                                     src="<?php echo _WEB_ROOT.$prodItem['feature_image_path'] ?>"
                                     alt=""/>
                                <div class="p_icon">
                                    <a href="#">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="<?php _WEB_ROOT ?>/product/product_detail/<?=$prodItem['id']?>" class="d-block">
                                    <h4><?= $prodItem['name'] ?> </h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4"><?= number_format($prodItem['price'],0,',','.') ?> đ</span>
<!--                                    <del>$35.00</del>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End New Product Area =================-->

<!--================ Inspired Product Area =================-->
<section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>Sản Phẩm NEW</span></h2>
                    <p>Mùa hè đang tới bạn đã sẳn sàng cháy hết mình chưa?</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            if(!empty($list_product_all)){
                foreach ($list_product_all as $key => $prodItem){
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="single-product">
                    <div class="product-img">
                        <img class="img-fluid w-100"
                             src="<?php echo _WEB_ROOT.$prodItem['feature_image_path'] ?>"
                             alt=""/>
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
<!--                            <del>$35.00</del>-->
                        </div>
                    </div>
                </div>
            </div>

        <?php }
        }
        ?>
        </div>



    </div>
</section>
<!--================ End Inspired Product Area =================-->

