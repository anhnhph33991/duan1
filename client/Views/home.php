<?php if (isset($_COOKIE['welcome'])) : ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong><?= $_COOKIE['welcome'] ?? '' ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<?php

// echo "<pre>";
// print_r($dataCategory);
// echo "</pre>";

// foreach ($dataSlide as $key => $value) {
//     if ($value['type'] == 'main') {
//         echo "<pre>";
//         print_r($value);
//         echo "</pre>";
//     }
// }

?>

<?php // thêm file handle toast mess  
?>
<?php require_once "./core/toast.php";  ?>

<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        <!--/owl-slide-->
        <?php foreach ($dataSlide as $key => $value) : ?>
            <?php

            // echo "<pre>";
            // print_r($value);
            // echo "</pre>";

            ?>
            <?php if ($value['type'] == 'main') : ?>
                <div class="owl-slide cover" style="background-image: url(data:image/jpeg;base64,<?= $value['url'] ?>);">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <!-- <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 static">
                                <div class="slide-text white">
                                    <h2 class="owl-slide-animated owl-slide-title">Attack Air<br>VaporMax Flyknit 3</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        Limited items available at this price
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div id="icon_drag_mobile"></div>
</div>
<!--/carousel-->

<!-- Banner Category -->
<ul id="banners_grid" class="clearfix">
    <?php foreach ($dataCategory as $key => $value) :  ?>
        <li>
            <a href="<?= BASE_URL . '?act=shop&category=' . $value['slug'] ?>" class="img_container">
                <img src="<?= BASE_URL . $value['image'] ?>" data-src="<?= BASE_URL . $value['image'] ?>" alt="" class="lazy">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <h3><?= $value['name'] ?></h3>
                    <div><span class="btn_1">Shop Now</span></div>
                </div>
            </a>
        </li>
    <?php endforeach  ?>
</ul>
<!--/banners_grid -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Top Selling</h2>
        <span>Products</span>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="row small-gutters">
        <?php if (!empty($dataTop8)) : ?>
            <?php foreach ($dataTop8 as $key => $value) :  ?>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="grid_item">
                        <figure>
                            <!-- <span class="ribbon off">-30%</span> -->
                            <a href="<?= BASE_URL . '?act=product-detail&id=' . $value['p_id']  ?>">
                                <img class="img-fluid lazy" src="<?= BASE_URL . $value['p_image'] ?>" data-src="<?= BASE_URL . $value['p_image'] ?>" alt="">
                                <img class="img-fluid lazy" src="<?= BASE_URL . $value['p_image'] ?>" data-src="<?= BASE_URL . $value['p_image'] ?>" alt="">
                            </a>
                            <?php if ($value['p_type'] == 'sale') :  ?>
                                <div data-countdown="2024/3/29" class="countdown"></div>
                            <?php endif  ?>
                        </figure>
                        <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                        <a href="<?= BASE_URL . '?act=product-detail&id=' . $value['p_id']  ?>">
                            <h3><?= $value['p_name'] ?></h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price"><?= number_format($value['p_price'], 0, '.', '.') ?>đ</span>
                            <?php if ($value['p_type'] == 'sale') : ?>
                                <?php $productPriceSale = $value['p_price'] * 0.8;   ?>
                                <span class="old_price"><?= number_format($productPriceSale, 0, '.', '.') ?>đ</span>
                            <?php endif ?>
                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào danh mục yêu thích"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào so sánh"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào giỏ hàng"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
            <?php endforeach  ?>
        <?php endif ?>
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="featured lazy" data-bg="url(<?= BASE_URL ?>public/image/banner.jpg)">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 wow" data-wow-offset="150">
                    <h3>Thời Trang Giới Trẻ</h3>
                    <p>Shop chuyên cung cấp thời trang giới trẻ hợp gu thời trang thời đại mới</p>
                    <div class="feat_text_block">
                        <div class="price_box">
                            <span class="new_price">$90.00</span>
                            <span class="old_price">$170.00</span>
                        </div>
                        <a class="btn_1" href="<?= BASE_URL ?>?act=shop" role="button">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /featured -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Featured</h2>
        <span>Products</span>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="owl-carousel owl-theme products_carousel">
        <?php foreach ($data8prodctViews as $key => $value) :  ?>
            <div class="item">
                <div class="grid_item">
                    <!-- <span class="ribbon new">New</span> -->
                    <figure>
                        <a href="<?= BASE_URL . '?act=product-detail&id=' . $value['id']  ?>">
                            <img class="owl-lazy" src="<?= BASE_URL ?>public/assets/img/products/product_placeholder_square_medium.jpg" data-src="<?= BASE_URL . $value['image'] ?>" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="<?= BASE_URL . '?act=product-detail&id=' . $value['id']  ?>">
                        <h3><?= $value['name'] ?></h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price"><?= number_format($value['price'], 0, '.', '.') ?>đ</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào danh mục yêu thích"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào so sánh"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào giỏ hàng"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
        <?php endforeach  ?>
        <!-- /item -->
    </div>
    <!-- /products_carousel -->
</div>
<!-- /container -->

<div class="bg_gray">
    <div class="container margin_30">
        <div id="brands" class="owl-carousel owl-theme">
            <div class="item">
                <a href="#0"><img src="<?= BASE_URL ?>public/assets/img/brands/placeholder_brands.png" data-src="<?= BASE_URL ?>public/assets/img/brands/logo_1.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="<?= BASE_URL ?>public/assets/img/brands/placeholder_brands.png" data-src="<?= BASE_URL ?>public/assets/img/brands/logo_2.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="<?= BASE_URL ?>public/assets/img/brands/placeholder_brands.png" data-src="<?= BASE_URL ?>public/assets/img/brands/logo_3.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="<?= BASE_URL ?>public/assets/img/brands/placeholder_brands.png" data-src="<?= BASE_URL ?>public/assets/img/brands/logo_4.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="<?= BASE_URL ?>public/assets/img/brands/placeholder_brands.png" data-src="<?= BASE_URL ?>public/assets/img/brands/logo_5.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="<?= BASE_URL ?>public/assets/img/brands/placeholder_brands.png" data-src="<?= BASE_URL ?>public/assets/img/brands/logo_6.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
        </div><!-- /carousel -->
    </div><!-- /container -->
</div>
<!-- /bg_gray -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Teams</h2>
        <span>Nhom 12</span>
        <p>Đây là thành viên nhóm 12</p>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <a class="box_news" href="fb.com.vn">
                <figure>
                    <img src="<?= BASE_URL ?>public/assets/img/blog-thumb-placeholder.jpg" data-src="<?= BASE_URL ?>public/image/luxchill.jpg" alt="" width="400" height="266" class="lazy">
                </figure>
                <ul>
                    <li>by Mark Twain</li>
                    <li>20.11.2017</li>
                </ul>
                <h4>Pri oportere scribentur eu</h4>
                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
            </a>
        </div>
        <!-- /box_news -->
        <div class="col-lg-6">
            <a class="box_news" href="blog.html">
                <figure>
                    <img src="<?= BASE_URL ?>public/assets/img/blog-thumb-placeholder.jpg" data-src="<?= BASE_URL ?>public/assets/img/blog-thumb-2.jpg" alt="" width="400" height="266" class="lazy">
                    <figcaption><strong>28</strong>Dec</figcaption>
                </figure>
                <ul>
                    <li>By Jhon Doe</li>
                    <li>20.11.2017</li>
                </ul>
                <h4>Duo eius postea suscipit ad</h4>
                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
            </a>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->