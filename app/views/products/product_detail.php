<!--================Home Banner Area =================-->
<!--<section class="banner_area">-->
<!--    <div class="banner_inner d-flex align-items-center">-->
<!--        <div class="container">-->
<!--            <div-->
<!--                    class="banner_content d-md-flex justify-content-between align-items-center"-->
<!--            >-->
<!--                <div class="mb-3 mb-md-0">-->
<!--                    <h2>Product Details</h2>-->
<!--                    <p>Very us move be blessed multiply night</p>-->
<!--                </div>-->
<!--                <div class="page_link">-->
<!--                    <a href="index.html">Home</a>-->
<!--                    <a href="single-product.html">Product Details</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--================End Home Banner Area =================-->

<style>

    .product_image_area {
        padding: 80px 0;
    }
</style>
<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_product_img">
                    <div
                            id="carouselExampleIndicators"
                            class="carousel slide"
                            data-ride="carousel"
                    >
                        <ol class="carousel-indicators">
                            <!--                            <li-->
                            <!--                                    data-target="#carouselExampleIndicators"-->
                            <!--                                    data-slide-to="0"-->
                            <!--                                    class="active"-->
                            <!--                            >-->
                            <!--                                <img-->
                            <!--                                        src="-->
                            <?php //echo _WEB_ROOT ?><!--/public/assets/clients/img/product/single-product/s-product-s-2.jpg"-->
                            <!--                                        alt=""-->
                            <!--                                />-->
                            <!--                            </li>-->
                            <!--                            <li-->
                            <!--                                    data-target="#carouselExampleIndicators"-->
                            <!--                                    data-slide-to="1"-->
                            <!--                            >-->
                            <!--                                <img-->
                            <!--                                        src="-->
                            <?php //echo _WEB_ROOT ?><!--/public/assets/clients/img/product/single-product/s-product-s-3.jpg"-->
                            <!--                                        alt=""-->
                            <!--                                />-->
                            <!--                            </li>-->
                            <!--                            <li-->
                            <!--                                    data-target="#carouselExampleIndicators"-->
                            <!--                                    data-slide-to="2"-->
                            <!--                            >-->
                            <!--                                <img-->
                            <!--                                        src="-->
                            <?php //echo _WEB_ROOT ?><!--/public/assets/clients/img/product/single-product/s-product-s-4.jpg"-->
                            <!--                                        alt=""-->
                            <!--                                />-->
                            <!--                            </li>-->
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <?php if (!empty($product_detail)) { ?>
                                    <img
                                            class="d-block w-100"
                                            src="<?php echo _WEB_ROOT . $product_detail['feature_image_path'] ?>"
                                            alt="First slide"
                                    />
                                <?php } ?>
                            </div>
                            <!--                            <div class="carousel-item">-->
                            <!--                                <img-->
                            <!--                                        class="d-block w-100"-->
                            <!--                                        src="-->
                            <?php //echo _WEB_ROOT ?><!--/public/assets/clients/img/product/single-product/s-product-1.jpg"-->
                            <!--                                        alt="Second slide"-->
                            <!--                                />-->
                            <!--                            </div>-->
                            <!--                            <div class="carousel-item">-->
                            <!--                                <img-->
                            <!--                                        class="d-block w-100"-->
                            <!--                                        src="-->
                            <?php //echo _WEB_ROOT ?><!--/public/assets/clients/img/product/single-product/s-product-1.jpg"-->
                            <!---->
                            <!--                                        alt="Third slide"-->
                            <!--                                />-->
                            <!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <?php if (!empty($product_detail)) { ?>
<!--                <form action="--><?php //echo _WEB_ROOT ?><!--/client_cart/addToCard/--><?php //echo $product_detail['id'] ?><!--" method="post">-->
                    <input type="hidden" id="prodName" name ="name" value="<?=$product_detail['name'] ?>">
                    <input type="hidden"  id="prodPrice" name ="price" value="<?=$product_detail['price'] ?>">
                    <input type="hidden"  id="prodImage" name="feature_image_path" value="<?=$product_detail['feature_image_path'] ?>">
                    <div class="s_product_text">

                        <h3><?= $product_detail['name'] ?></h3>
                        <h2><?= number_format($product_detail['price'], 0, ',', '.') ?> ??</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Danh m???c</span> :
                                    <?php if (!empty($categories)) {
                                        foreach ($categories as $cateItem) {
                                            if ($cateItem['id'] == $product_detail['category_id']) {
                                                echo $cateItem['name'];
                                            }
                                        }
                                    }

                                    ?>

                                </a>
                            </li>
                            <li>
                                <a href="#"> <span>Kho</span> : C??n H??ng</a>
                            </li>
                        </ul>
                        <p>
                            <?= $product_detail['content'] ?>
                        </p>


                            <div class="product_count">
                                <label for="qty">S??? l?????ng:</label>
                                <input
                                        type="text"
                                        name="qty"
                                        id="sst"
                                        maxlength="12"
                                        value="1"
                                        title="Quantity:"
                                        class="input-text qty"
                                />
                                <button
                                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count"
                                        type="button">
                                    <i class="lnr lnr-chevron-up"></i>
                                </button>
                                <button
                                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                        class="reduced items-count"
                                        type="button"
                                >
                                    <i class="lnr lnr-chevron-down"></i>
                                </button>
                            </div>

                            <div class="card_area">
                                <a
                                        href="<?php echo _WEB_ROOT ?>/client_cart/addToCard/<?php echo $product_detail['id'] ?>"
                                        type="submit" class="main_btn <?php echo (!empty(Session::data('client_login'))?'addToCart':'loginToAdd') ?>"
                                        data-url="<?php echo _WEB_ROOT ?>/client_cart/addToCard/<?php echo $product_detail['id'] ?>"
                                >Th??m Gi??? H??ng</a>

                                <a class="icon_btn" href="#">
                                    <i class="lnr lnr lnr-diamond"></i>
                                </a>
                                <a class="icon_btn" href="#">
                                    <i class="lnr lnr lnr-heart"></i>
                                </a>
                            </div>


                    </div>
<!--                </form>-->
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a
                        class="nav-link"
                        id="home-tab"
                        data-toggle="tab"
                        href="#home"
                        role="tab"
                        aria-controls="home"
                        aria-selected="true"
                >Description</a
                >
            </li>
            <li class="nav-item">
                <a
                        class="nav-link"
                        id="profile-tab"
                        data-toggle="tab"
                        href="#profile"
                        role="tab"
                        aria-controls="profile"
                        aria-selected="false"
                >Specification</a
                >
            </li>
            <li class="nav-item">
                <a
                        class="nav-link"
                        id="contact-tab"
                        data-toggle="tab"
                        href="#contact"
                        role="tab"
                        aria-controls="contact"
                        aria-selected="false"
                >Comments</a
                >
            </li>
            <li class="nav-item">
                <a
                        class="nav-link active"
                        id="review-tab"
                        data-toggle="tab"
                        href="#review"
                        role="tab"
                        aria-controls="review"
                        aria-selected="false"
                >Reviews</a
                >
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <?php if (!empty($product_detail['content'])) { ?>
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>
                        <?= $product_detail['content'] ?>
                    </p>

                </div>
            <?php } ?>
            <div
                    class="tab-pane fade"
                    id="profile"
                    role="tabpanel"
                    aria-labelledby="profile-tab"
            >
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <h5>Width</h5>
                            </td>
                            <td>
                                <h5>128mm</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Height</h5>
                            </td>
                            <td>
                                <h5>508mm</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Depth</h5>
                            </td>
                            <td>
                                <h5>85mm</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Weight</h5>
                            </td>
                            <td>
                                <h5>52gm</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Quality checking</h5>
                            </td>
                            <td>
                                <h5>yes</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Freshness Duration</h5>
                            </td>
                            <td>
                                <h5>03days</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>When packeting</h5>
                            </td>
                            <td>
                                <h5>Without touch of hand</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Each Box contains</h5>
                            </td>
                            <td>
                                <h5>60pcs</h5>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div
                    class="tab-pane fade"
                    id="contact"
                    role="tabpanel"
                    aria-labelledby="contact-tab"
            >
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img
                                                src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/single-product/review-1.png"
                                                alt=""
                                        />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div class="review_item reply">
                                <div class="media">
                                    <div class="d-flex">
                                        <img
                                                src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/single-product/review-2.png"
                                                alt=""
                                        />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img
                                                src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/single-product/review-3.png"
                                                alt=""
                                        />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Post a comment</h4>
                            <form
                                    class="row contact_form"
                                    action="contact_process.php"
                                    method="post"
                                    id="contactForm"
                                    novalidate="novalidate"
                            >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="name"
                                                name="name"
                                                placeholder="Your Full name"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input
                                                type="email"
                                                class="form-control"
                                                id="email"
                                                name="email"
                                                placeholder="Email Address"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="number"
                                                name="number"
                                                placeholder="Phone Number"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                        <textarea
                                class="form-control"
                                name="message"
                                id="message"
                                rows="1"
                                placeholder="Message"
                        ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button
                                            type="submit"
                                            value="submit"
                                            class="btn submit_btn"
                                    >
                                        Submit Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div
                    class="tab-pane fade show active"
                    id="review"
                    role="tabpanel"
                    aria-labelledby="review-tab"
            >
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row total_rate">
                            <div class="col-6">
                                <div class="box_total">
                                    <h5>Overall</h5>
                                    <h4>4.0</h4>
                                    <h6>(03 Reviews)</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rating_list">
                                    <h3>Based on 3 Reviews</h3>
                                    <ul class="list">
                                        <li>
                                            <a href="#"
                                            >5 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> 01</a
                                            >
                                        </li>
                                        <li>
                                            <a href="#"
                                            >4 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> 01</a
                                            >
                                        </li>
                                        <li>
                                            <a href="#"
                                            >3 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> 01</a
                                            >
                                        </li>
                                        <li>
                                            <a href="#"
                                            >2 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> 01</a
                                            >
                                        </li>
                                        <li>
                                            <a href="#"
                                            >1 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> 01</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="review_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img
                                                src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/single-product/review-1.png"
                                                alt=""
                                        />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img
                                                src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/single-product/review-2.png"
                                                alt=""
                                        />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img
                                                src="<?php echo _WEB_ROOT ?>/public/assets/clients/img/product/single-product/review-3.png"
                                                alt=""
                                        />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Add a Review</h4>
                            <p>Your Rating:</p>
                            <ul class="list">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                            </ul>
                            <p>Outstanding</p>
                            <form
                                    class="row contact_form"
                                    action="contact_process.php"
                                    method="post"
                                    id="contactForm"
                                    novalidate="novalidate"
                            >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="name"
                                                name="name"
                                                placeholder="Your Full name"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input
                                                type="email"
                                                class="form-control"
                                                id="email"
                                                name="email"
                                                placeholder="Email Address"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="number"
                                                name="number"
                                                placeholder="Phone Number"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                        <textarea
                                class="form-control"
                                name="message"
                                id="message"
                                rows="1"
                                placeholder="Review"
                        ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button
                                            type="submit"
                                            value="submit"
                                            class="btn submit_btn"
                                    >
                                        Submit Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->
