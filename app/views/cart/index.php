
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div
                class="banner_content d-md-flex justify-content-between align-items-center"
            >
                <div class="mb-3 mb-md-0">
                    <h2>Giỏ hàng</h2>
<!--                    <p>Very us move be blessed multiply night</p>-->
                </div>
                <div class="page_link">
                    <a href="index.html">Trang Chủ</a>
                    <a href="cart.html">Giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Sản Phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Tổng </th>
                        <th scope="col">Tác Vụ </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($list_cart)){
                        $total_all =0;
                        foreach ($list_cart as $key => $cartItem){
                        ?>
                    <tr>
                        <td>
                            <div class="media">
                                <div class="d-flex">
                                    <img width="160px"
                                        src="<?php echo _WEB_ROOT.$cartItem['image'] ?>"
                                        alt=""
                                    />
                                </div>
                                <div class="media-body">
                                    <p><?php echo $cartItem['name'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h5><?php echo number_format($cartItem['price'],0,',','.') ?> đ</h5>
                        </td>
                        <td>
                            <div class="product_count">
                                <input
                                    type="text"
                                    name="qty"
                                    id="sst<?php echo $key ?>"
                                    maxlength="12"
                                    value="<?php echo $cartItem['qty'] ?>"
                                    title="Quantity:"
                                    class="input-text qty "

                                />
                                <button


                                    onclick="var result = document.getElementById('sst<?php echo $key ?>'); var sst = result.value;
                                    if( !isNaN( sst )) result.value++ ;return false; "
                                    class="increase items-count "
                                    type="button"
                                >
                                    <i class="lnr lnr-chevron-up"></i>
                                </button>
                                <button
                                    onclick="var result = document.getElementById('sst<?php echo $key ?>'); var sst = result.value;
                                    if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                    class="reduced items-count "
                                    type="button"
                                >
                                    <i class="lnr lnr-chevron-down"></i>
                                </button>
                            </div>
                        </td>
                        <td>
                            <?php
                            $total = $cartItem['price']*$cartItem['qty'];
                            $total_all+=$total;
                            ?>
                            <h5> <?php echo
                                number_format($total,0,',','.') ;
                                ?>đ</h5>
                            <input type="hidden" class="total_prod" value="<?= $total?>">
                        </td>
                        <td>
                            <a href="<?php echo _WEB_ROOT ?>/cart/deleteProdCart/<?= $key ?>" data-url="<?php echo _WEB_ROOT ?>/cart/deleteProdCart/<?= $key ?>" class="btn btn-danger deleteProdCart">Xoá</a>
                        </td>
                    </tr>
                    <?php }} ?>

<!--                    <tr class="bottom_button">-->
<!--                        <td>-->
<!--                            <a class="gray_btn" href="#">Update Cart</a>-->
<!--                        </td>-->
<!--                        <td></td>-->
<!--                        <td></td>-->
<!--                        <td>-->
<!--                            <div class="cupon_text">-->
<!--                                <input type="text" placeholder="Coupon Code" />-->
<!--                                <a class="main_btn" href="#">Apply</a>-->
<!--                                <a class="gray_btn" href="#">Close Coupon</a>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                    </tr>-->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <h5>Thanh Toán</h5>
                        </td>
                        <td>
                            <h5 id="total_all"><?=number_format($total_all,0,',','.')?>đ</h5>
                        </td>
                    </tr>

                    <tr class="out_button_area">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="checkout_btn_inner">
                                <a class="gray_btn" href="#">Tiếp Tục Mua Hàng</a>
                                <a  class="main_btn" href="<?php echo _WEB_ROOT ?>/cart/checkOut"> Xác Nhận Thanh Toán</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->