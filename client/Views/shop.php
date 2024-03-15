<div class="top_banner">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="<?= BASE_URL ?>">Home</a></li>
                    <!-- <li><a href="#">Category</a></li> check nếu có category mới hiển thị -->
                    <li>Shop</li>
                </ul>
            </div>
            <h1>Shop - LuxChill</h1> <!-- check title sẽ thay đổi nếu có category -->
        </div>
    </div>
    <img src="<?= BASE_URL ?>public/image/bannerShop.jpg" class="img-fluid" alt="" style="object-fit: fill;">
</div>
<!-- /top_banner -->
<div id="stick_here"></div>
<div class="toolbox elemento_stick">
    <div class="container">
        <ul class="clearfix">
            <li>
                <div class="sort_select">
                    <select name="sort" id="sort">
                        <option value="popularity" selected="selected">Sort by popularity</option>
                        <option value="rating">Sort by average rating</option>
                        <option value="date">Sort by newness</option>
                        <option value="price">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to
                    </select>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /toolbox -->

<div class="container margin_30">

    <div class="row">
        <aside class="col-lg-3" id="sidebar_fixed">
            <div class="filter_col">
                <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                <div class="filter_type version_2">
                    <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Categories</a></h4>
                    <div class="collapse show" id="filter_1">
                        <ul>
                            <li>
                                <label class="container_check">Tất Cả<small>12</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <?php foreach ($dataCategory as $key => $value) :  ?>
                                <li>
                                    <label class="container_check"><?= $value['name'] ?> <small>12</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            <?php endforeach;  ?>
                        </ul>
                    </div>
                    <!-- /filter_type -->
                </div>
                <!-- /filter_type -->
                <div class="filter_type version_2">
                    <h4><a href="#filter_2" data-bs-toggle="collapse" class="opened">Color</a></h4>
                    <div class="collapse show" id="filter_2">
                        <ul>
                            <li>
                                <label class="container_check">Blue <small>06</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Red <small>12</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Orange <small>17</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Black <small>43</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /filter_type -->
                <div class="filter_type version_2">
                    <h4><a href="#filter_3" data-bs-toggle="collapse" class="closed">Brands</a></h4>
                    <div class="collapse" id="filter_3">
                        <ul>
                            <li>
                                <label class="container_check">Adidas <small>11</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Nike <small>08</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Vans <small>05</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Puma <small>18</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /filter_type -->
                <div class="filter_type version_2">
                    <h4><a href="#filter_4" data-bs-toggle="collapse" class="closed">Price</a></h4>
                    <div class="collapse" id="filter_4">
                        <ul>
                            <li>
                                <label class="container_check">50.000đ — 99.000đ<small>11</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">120.000đ — 199.000đ<small>08</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">250.000đ — 399.000đ<small>05</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">450.000đ — 599.000đ<small>18</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /filter_type -->
                <div class="buttons">
                    <a href="#0" class="btn_1">Filter</a> <a href="#0" class="btn_1 gray">Reset</a>
                </div>
            </div>
        </aside>
        <!-- /col -->
        <div class="col-lg-9">
            <div class="row small-gutters">
                <!-- -30 % -->

                <?php foreach ($dataProduct as $key => $value) :  ?>
                    <?php
                    $priceOld = $value['p_price'];
                    $discount = 0; // Giảm giá ban đầu là 0
                    $mess = '';
                    if ($value['p_type'] == 'sale') {
                        $discount = 0.3;
                    }
                    $priceNew = $priceOld - ($priceOld * $discount);
                    // echo $priceOld . '</br>';

                    // echo "<pre>";
                    // print_r($value);
                    // echo "</pre>";
                    ?>

                    <?php // if ($value['p_status'] == 'public') :  ?>
                        <div class="col-6 col-md-4">
                            <div class="grid_item">
                                <!-- <span class="ribbon off">-30%</span> -->
                                <span class="ribbon <?= $value['p_type'] == 'new' ? 'new' : ($value['p_type'] == 'hot' ? 'hot' : 'off') ?>">
                                    <?php
                                    if ($value['p_type'] == 'new') {
                                        echo "New";
                                    } elseif ($value['p_type'] == 'hot') {
                                        echo "Hot";
                                    } elseif ($value['p_type'] == 'sale') {
                                        echo "-30%";
                                    }
                                    ?>
                                </span>

                                <figure>
                                    <a href="<?= BASE_URL ?>?act=product-detail&id=<?= $value['p_id'] ?>">
                                        <img class="img-fluid lazy" src="data:image/jpeg;base64,<?= $value['p_image'] ?>" data-src="data:image/jpeg;base64,<?= $value['p_image'] ?>" alt="" style="width: 100%; height: 300px; object-fit: fill;">
                                    </a>

                                    <?php if ($value['p_type'] == 'sale') :  ?>
                                        <div data-countdown="2024/3/18" class="countdown"></div>
                                    <?php endif; ?>

                                </figure>
                                <a href="<?= BASE_URL ?>?act=product-detail&id=<?= $value['p_id'] ?>">
                                    <h3><?= $value['p_name'] ?></h3>
                                </a>
                                <div class=" price_box">
                                    <span class="new_price"><?= number_format($value['p_price'], 0, '.', '.') ?>đ</span>

                                    <?php if ($value['p_type'] == 'sale') :  ?>
                                        <span class="old_price"><?= number_format($priceNew, 0, '.', '.') ?>đ</span>
                                    <?php endif; ?>
                                </div>
                                <ul>
                                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php // endif; ?>
                <?php endforeach; ?>

            </div>
            <!-- /row -->
            <div class="pagination__wrapper">
                <ul class="pagination">
                    <li><a href="<?= BASE_URL ?>?act=shop&page=<?= ($page > 1) ? ($page - 1) : 1 ?>" class="prev" title="previous page">&#10094;</a></li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li>
                            <a href="<?= BASE_URL ?>?act=shop&page=<?= $i ?>" <?= $i == $page ? 'class="active"' : '' ?>>
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li><a href="<?= BASE_URL ?>?act=shop&page=<?= ($page == $total_pages) ? $page : ($page + 1) ?>" class="next" title="next page">&#10095;</a></li>
                </ul>
            </div>

        </div>
        <!-- /col -->
    </div>
    <!-- /row -->

</div>
<!-- /container -->