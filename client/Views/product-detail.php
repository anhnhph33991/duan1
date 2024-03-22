<?php

// echo "<pre>";
// print_r($listColor);
// echo "</pre>";

if (!empty($dataColor)) {
    foreach ($dataColor as $color) {
        $listColor[] = $color['name'];
    }
}

if (!empty($dataSize)) {
    foreach ($dataSize as $size) {
        $listSize[] = $size['name'];
    }
}

// echo "<pre>";
// print_r($listColor);
// echo "</pre>";


?>

<div class="container margin_30">
    <!-- <div class="countdown_inner">-20% This offer ends in <div data-countdown="2024/3/20" class="countdown"></div> -->

    <div class="countdown_inner title__render">-20% This offer ends in <div data-countdown="2024/3/20" class="countdown"></div>
    </div>
    <!-- Banner -->
    <div class="row">
        <div class="col-md-6">
            <div class="all">
                <?php

                // echo "<pre>";
                // print_r($product);
                // echo "</pre>";

                // echo "</br>";

                // echo "<pre>";
                // print_r($listImage);
                // echo "</pre>";

                $merge = array_merge($product, $listImage);

                // echo "<pre>";
                // print_r($product);
                // echo "</pre>";

                // $slideShow = [$product['p_image'], $listImage];

                $slideShow = array_merge(array($product['p_image']), array_column($listImage, 'image'));


                // echo "<pre>";
                // print_r($slideShow);
                // echo "</pre>";
                // $dataImage2 = [];

                // foreach ($listImage as $key => $value) {
                //     $dataImage2[] = $value;
                //   }

                // foreach ($product as $key => $value) {
                //     $dataImage2[] = $value['p_image'];
                // }


                // echo "<pre>";
                // print_r($dataImage2);
                // echo "</pre>";

                // for ($i = 0; $i <br $slideShow; $i++) {
                //     echo '<div style="background-image: url(' . BASE_URL . $slideShow . ');" class="item-box"></div>';
                // }

                // foreach ($slideShow as $slide) {
                //     echo $slide . '</br>';
                // }


                ?>
                <div class="slider">
                    <div class="owl-carousel owl-theme main">

                        <?php foreach ($slideShow as $slide) :  ?>
                            <div style="background-image: url(<?= BASE_URL . $slide ?>);" class="item-box"></div>
                        <?php endforeach  ?>
                    </div>
                    <div class="left nonl"><i class="ti-angle-left"></i></div>
                    <div class="right"><i class="ti-angle-right"></i></div>
                </div>
                <div class="slider-two">
                    <div class="owl-carousel owl-theme thumbs">
                        <?php foreach ($slideShow as $slide) :  ?>
                            <div style="background-image: url(<?= BASE_URL . $slide ?>" class="item active"></div>
                        <?php endforeach  ?>
                    </div>
                    <div class="left-t nonl-t"></div>
                    <div class="right-t"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="<?= BASE_URL ?>">Home</a></li>
                    <li><a href="<?= BASE_URL ?>?act=shop">Shop</a></li>
                    <li><?= $product['p_name'] ?></li>
                </ul>
            </div>
            <!-- /page_header -->
            <div class="prod_info">
                <h1><?= $product['p_name'] ?></h1>
                <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em><?= $product['p_views'] ?? '0' ?> reviews</em></span>
                <br>
                <small>SL: <?= $product['p_qty'] ?? '0' ?></small>
                <p><small>SKU: MTKRY-001</small><br><?= $product['p_description'] ?>.</p>
                <div class="prod_options">
                    <div class="row">
                        <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Color</strong></label>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
                            <ul>
                                <li><a href="#0" class="color color_1 active"></a></li>
                                <li><a href="#0" class="color color_2"></a></li>
                                <li><a href="#0" class="color color_3"></a></li>
                                <li><a href="#0" class="color color_4"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                            <div class="custom-select-form">
                                <select class="wide">
                                    <option value="S" selected>Small (S)</option>
                                    <?php foreach ($listSize as $size) :  ?>
                                        <option value="<?= $size ?>"><?= $size ?></option>
                                    <?php endforeach  ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                            <div class="numbers-row">
                                <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="price_main"><span class="new_price"><?= number_format($product['p_price'], 0, '.', '.') ?>đ</span>
                            <?php if ($product['p_type'] == 'sale') : ?>
                                <?php $productPriceSale = $product['p_price'] * 0.8;   ?>
                                <span class="percentage">-20%</span> <span class="old_price"><?= number_format($productPriceSale, 0, '.', '.') ?>đ</span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="btn_add_to_cart"><a href="#0" class="btn_1 " onclick="handleAddToCart('<?= $product['p_id'] ?>', '<?= $product['p_name'] ?>', '<?= $product['p_price'] ?>','<?= $product['p_image'] ?>','<?= $product['p_description'] ?>','<?= $product['p_type'] ?>','<?= $product['c_name'] ?>')">Add to Cart</a></div>


                    </div>
                </div>
            </div>
            <!-- /prod_info -->
            <div class="product_actions">
                <ul>
                    <li>
                        <a href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
                    </li>
                </ul>
            </div>
            <!-- /product_actions -->
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="tabs_product">
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Description</a>
            </li>
            <li class="nav-item">
                <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
            </li>
        </ul>
    </div>
</div>
<!-- /tabs_product -->
<div class="tab_content_wrapper">
    <div class="container">
        <div class="tab-content" role="tablist">
            <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                <div class="card-header" role="tab" id="heading-A">
                    <h5 class="mb-0">
                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                            Description
                        </a>
                    </h5>
                </div>
                <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <h3>Details</h3>
                                <?= $product['p_description'] ?>
                            </div>
                            <div class="col-lg-5">
                                <h3>Specifications</h3>
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped">
                                        <tbody>
                                            <tr>
                                                <td><strong>Color</strong></td>
                                                <td style="display: flex; gap: 5px;">
                                                    <?php foreach ($listSize as $size) :  ?>
                                                        <p><?= $size ?></p> |
                                                    <?php endforeach  ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Size</strong></td>
                                                <td>150x100x100</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Weight</strong></td>
                                                <td>0.6kg</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Người Đăng</strong></td>
                                                <td>LuxChill</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /TAB A -->
            <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                <div class="card-header" role="tab" id="heading-B">
                    <h5 class="mb-0">
                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                            Reviews
                        </a>
                    </h5>
                </div>
                <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <?php foreach ($dataComment as $key => $value) :  ?>
                                <div class="col-lg-6" data-id="<?= $value['comment_id'] ?>">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                            <em>Published 54 minutes ago</em>
                                        </div>
                                        <img class="avatar" src="<?= BASE_URL . $value['user_image'] ?>" style="width: 30px; height: 30x; border-radius: 50%;" />
                                        <h4><?= $value['user_name'] ?></h4>
                                        <p><?= $value['comment_content'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach  ?>
                        </div>
                        <!-- /row -->
                        <!-- <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <div class="review_content">
                                    <div class="clearfix add_bottom_10">
                                        <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><em>4.5/5.0</em></span>
                                        <em>Published 3 days ago</em>
                                    </div>
                                    <h4>"Outstanding"</h4>
                                    <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="review_content">
                                    <div class="clearfix add_bottom_10">
                                        <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                        <em>Published 4 days ago</em>
                                    </div>
                                    <h4>"Excellent"</h4>
                                    <p>Sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- /row -->
                        <?php if (isset($_SESSION['user'])) : ?>
                            <p class="text-end"><a href="<?= BASE_URL . '?act=leave-review&id=' . $product['p_id'] ?>" class="btn_1">Đánh giá sản phẩm</a></p>
                        <?php else :  ?>
                            <p class="text-end"><a href="<?= BASE_URL . '?act=login&auth=?act=product-detail&id=36' ?>" class="btn_1">Login để bình luận</a></p>
                        <?php endif  ?>
                    </div>
                    <!-- /card-body -->
                </div>
            </div>
            <!-- /tab B -->
        </div>
        <!-- /tab-content -->
    </div>
    <!-- /container -->
</div>
<!-- /tab_content_wrapper -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Sản Phẩm Liên Quan</h2>
        <span>Products</span>
        <p>Những sản phẩm bạn có thể thích ♨️.</p>
    </div>
    <div class="owl-carousel owl-theme products_carousel">
        <?php foreach ($productRelated as $key => $value) :  ?>
            <div class="item">
                <div class="grid_item">
                    <span class="ribbon <?= $value['type'] == 'new' ? 'new' : ($value['type'] == 'hot' ? 'hot' : 'off') ?>">
                        <?php
                        if ($value['type'] == 'new') {
                            echo "New";
                        } elseif ($value['type'] == 'hot') {
                            echo "Hot";
                        } elseif ($value['type'] == 'sale') {
                            echo "-30%";
                        }
                        ?>
                    </span>
                    <figure>
                        <a href="<?= BASE_URL ?>?act=product-detail&id=<?= $value['id'] ?>">
                            <img class="owl-lazy" src="<?= BASE_URL . $value['image'] ?>" data-src="<?= BASE_URL . $value['image'] ?>" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="product-detail-1.html">
                        <h3><?= $value['name'] ?></h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price"><?= number_format($value['price'], 0, '.', '.') ?>đ</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
        <?php endforeach ?>
        <!-- /item -->
    </div>
    <!-- /products_carousel -->
</div>
<!-- /container -->

<div class="feat">
    <div class="container">
        <ul>
            <li>
                <div class="box">
                    <i class="ti-gift"></i>
                    <div class="justify-content-center">
                        <h3>Free Shipping</h3>
                        <p>For all oders over $99</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="box">
                    <i class="ti-wallet"></i>
                    <div class="justify-content-center">
                        <h3>Secure Payment</h3>
                        <p>100% secure payment</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="box">
                    <i class="ti-headphone-alt"></i>
                    <div class="justify-content-center">
                        <h3>24/7 Support</h3>
                        <p>Online top support</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!--/feat-->