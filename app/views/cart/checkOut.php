<section class="checkout_area section_gap">
    <div class="container">

        <div class="billing_details">
            <div class="row">
                <div class="col-md-12">
                    <?php echo !empty($msg)? '<div class="alert alert-danger" role="alert">'.$msg.'</div>':false; ?>
                    <?php echo !empty($msgSuccess)? '<div class="alert alert-success" role="alert">'.$msgSuccess.'</div>':false; ?>
                </div>


            </div>
            <div class="row">
                <div class="col-lg-7">
                    <h3>Thông Tin Đơn Hàng</h3>
                    <form class="row contact_form" action="<?php echo _WEB_ROOT ?>/cart/confirmCheckOut" method="post" novalidate="novalidate">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="company" name="name" placeholder="Họ Tên"  value="<?php echo old('name') ?>">
                            <?php echo form_error('name','<span style="color: red">','</span>') ?>
                        </div>

                        <div class="col-md-6 form-group p_star">
                            <input type="number" class="form-control" id="number" name="phone" placeholder="Nhập số điện thoại"  value="<?php echo old('phone') ?>">
                            <?php echo form_error('phone','<span style="color: red">','</span>') ?>
                        </div>

                        <div class="col-md-6 form-group p_star">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email"  value="<?php echo old('email') ?>">
                            <?php echo form_error('email','<span style="color: red">','</span>') ?>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <select class="country_select" name="country" style="display: none;">
                                <option value="1">việt nam</option>
                                <option value="2">Lào</option>
                                <option value="4">Campuchia</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="" name="address" placeholder="Nhập địa chỉ"  value="<?php echo old('address') ?>">
                            <?php echo form_error('address','<span style="color: red">','</span>') ?>
                        </div>
                <div class="col-md-12 form-group">
                    <button class="main_btn" type="submit">Thanh Toán</button>
                </div>

<!--                        <div class="col-md-12 form-group p_star">-->
<!--                            <input type="text" class="form-control" id="city" name="city">-->
<!--                            <span class="placeholder" data-placeholder="Town/City"></span>-->
<!--                        </div>-->
<!--                        <div class="col-md-12 form-group p_star">-->
<!--                            <select class="country_select" style="display: none;">-->
<!--                                <option value="1">District</option>-->
<!--                                <option value="2">District</option>-->
<!--                                <option value="4">District</option>-->
<!--                            </select><div class="nice-select country_select" tabindex="0"><span class="current">District</span><ul class="list"><li data-value="1" class="option selected">District</li><li data-value="2" class="option">District</li><li data-value="4" class="option">District</li></ul></div>-->
<!--                        </div>-->



                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="order_box">
                        <h2>Đơn Hàng Của Bạn</h2>
                        <ul class="list">
                            <li>
                                <a href="#">Sản phẩm
                                    <span>Giá</span>
                                </a>
                            </li>
                            <?php
                            if(!empty($list_cart)){
                                $tong=0;
                                foreach ($list_cart as $cartItem){

                            ?>
                            <li>
                                <a href="#"><?php echo $cartItem['name'] ?>
                                    <span class="middle">x<?= $cartItem['qty'] ?></span>
                                    <?php $total =$cartItem['qty']*$cartItem['price']; $tong+=$total ?>
                                    <span class="last"><?= number_format($total,0,',','.')?></span>
                                </a>
                            </li>
                            <?php }} ?>
                        </ul>
                        <ul class="list list_2">
                            <li>
                                <a href="#">Tổng Tiền
                                    <span><?php echo !empty($list_cart)? number_format($tong,0,',','.'):0 ?> đ</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Phí vận chuyển
                                    <span> Miễn Phí</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Thành Tiền
                                    <span><?php echo !empty($list_cart)? number_format($tong,0,',','.'):0?> đ</span>
                                </a>
                            </li>
                        </ul>
<!--                        <div class="payment_item">-->
<!--                            <div class="radion_btn">-->
<!--                                <input type="radio" id="f-option5" name="selector">-->
<!--                                <label for="f-option5">Check payments</label>-->
<!--                                <div class="check"></div>-->
<!--                            </div>-->
<!--                            <p>-->
<!--                                Please send a check to Store Name, Store Street, Store Town,-->
<!--                                Store State / County, Store Postcode.-->
<!--                            </p>-->
<!--                        </div>-->
<!--                        <div class="payment_item active">-->
<!--                            <div class="radion_btn">-->
<!--                                <input type="radio" id="f-option6" name="selector">-->
<!--                                <label for="f-option6">Paypal </label>-->
<!--                                <img src="img/product/single-product/card.jpg" alt="">-->
<!--                                <div class="check"></div>-->
<!--                            </div>-->
<!--                            <p>-->
<!--                                Please send a check to Store Name, Store Street, Store Town,-->
<!--                                Store State / County, Store Postcode.-->
<!--                            </p>-->
<!--                        </div>-->
<!--                        <div class="creat_account">-->
<!--                            <input type="checkbox" id="f-option4" name="selector">-->
<!--                            <label for="f-option4">I’ve read and accept the </label>-->
<!--                            <a href="#">terms &amp; conditions*</a>-->
<!--                        </div>-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>