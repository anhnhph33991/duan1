<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?= BASE_URL ?>">Home</a></li>
                <!-- <li><a href="#">Category</a></li> -->
                <li>Checkout</li>
            </ul>
        </div>

        <!-- Nếu chưa đăng nhập -->
        <!-- <h1>Sign In or Create an Account</h1> -->
        <!-- Đã đăng nhập -->
        <h1>Checkout Shopping</h1>


    </div>
    <!-- /page_header -->
    <form class="row" action="" method="post">
        <div class="col-lg-4 col-md-6">
            <?php if (isset($_SESSION['user'])) : ?>
                <div class="step first">
                    <h3>1. Your address </h3>
                    <?php if (!empty($user['address'])) : ?>
                        <label>
                            <input type="radio" name="address" value="address1" checked>
                            Name: <?= $user['username'] ?><br>
                            Phone: 0<?= $user['tel'] ?><br>
                            Address: <?= $user['address'] ?>
                        </label><br>

                    <?php else :  ?>
                        <button>Thêm địa chỉ</button>
                    <?php endif  ?>
                    <?php

                    // echo "<pre>";
                    // print_r($user);
                    // echo "</pre>";

                    ?>
                </div>

            <?php else : ?>
                <div class="step first">
                    <h3>1. User Info and Billing address</h3>
                    <ul class="nav nav-tabs" id="tab_checkout" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">Login</a>
                        </li>
                    </ul>
                    <div class="tab-content checkout">
                        <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <hr>
                            <div class="row no-gutters">
                                <div class="col-6 form-group pr-1">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-6 form-group pl-1">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Address">
                            </div>
                            <div class="row no-gutters">
                                <div class="col-6 form-group pr-1">
                                    <input type="text" class="form-control" placeholder="City">
                                </div>
                                <div class="col-6 form-group pl-1">
                                    <input type="text" class="form-control" placeholder="Postal code">
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row no-gutters">
                                <div class="col-md-12 form-group">
                                    <div class="custom-select-form">
                                        <select class="wide add_bottom_15" name="country" id="country">
                                            <option value="" selected>Country</option>
                                            <option value="Europe">Europe</option>
                                            <option value="United states">United states</option>
                                            <option value="Asia">Asia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Telephone">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="container_check" id="other_addr">Other billing address
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div id="other_addr_c" class="pt-2">
                                <div class="row no-gutters">
                                    <div class="col-6 form-group pr-1">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-6 form-group pl-1">
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Address">
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-6 form-group pr-1">
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                    <div class="col-6 form-group pl-1">
                                        <input type="text" class="form-control" placeholder="Postal code">
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row no-gutters">
                                    <div class="col-md-12 form-group">
                                        <div class="custom-select-form">
                                            <select class="wide add_bottom_15" name="country" id="country_2">
                                                <option value="" selected>Country</option>
                                                <option value="Europe">Europe</option>
                                                <option value="United states">United states</option>
                                                <option value="Asia">Asia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Telephone">
                                </div>
                            </div>
                            <!-- /other_addr_c -->
                            <hr>
                        </div>
                        <!-- /tab_1 -->
                        <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab_2" style="position: relative;">
                            <a href="#0" class="social_bt facebook">Login con Facebook</a>
                            <a href="#0" class="social_bt google">Login con Google</a>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password_in" id="password_in">
                            </div>
                            <div class="clearfix add_bottom_15">
                                <div class="checkboxes float-start">
                                    <label class="container_check">Remember me
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="float-end"><a id="forgot" href="#0">Lost Password?</a></div>
                            </div>
                            <div id="forgot_pw">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
                                </div>
                                <p>A new password will be sent shortly.</p>
                                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                            </div>
                            <hr>
                            <input type="submit" class="btn_1 full-width" value="Login">
                        </div>
                        <!-- /tab_2 -->
                    </div>
                </div>
            <?php endif ?>
            <!-- /step -->
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="step middle payments">
                <h3>2. Payment and Shipping</h3>
                <ul>
                    <li>
                        <label class="container_radio">Nhận hàng thanh toán<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                            <input type="radio" name="paypal" checked value="cod">
                            <span class="checkmark"></span>
                        </label>
                    </li>
                    <li>
                        <label class="container_radio">Momo<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                            <input type="radio" name="paypal" value="momo">
                            <span class="checkmark"></span>
                        </label>
                    </li>
                </ul>
                <div class="payment_info d-none d-sm-block">
                    <figure><img src="<?= BASE_URL ?>public/assets/img/cards_all.svg" alt=""></figure>
                    <p>Sensibus reformidans interpretaris sit ne, nec errem nostrum et, te nec meliore
                        philosophia. At vix quidam periculis. Solet tritani ad pri, no iisque definitiones
                        sea.</p>
                </div>
            </div>
            <!-- /step -->

        </div>

        <div class="col-lg-4 col-md-6">
            <div class="step last">
                <h3>3. Order Summary</h3>
                <div class="box_general summary">
                    <ul>
                        <?php
                        $priceSum = 0;
                        ?>

                        <?php foreach ($dataCart as $value) :  ?>
                            <?php
                            // Biến tính giá tiền sản phẩm
                            $priceSubTotal = $value['qty'] * $value['price'];
                            // Biến tính giá tiền tổng của all sản phẩm
                            $priceSum += $priceSubTotal;
                            ?>
                            <li class="clearfix"><em><?= $value['qty'] ?>x <?= $value['name'] ?></em> <span><?= number_format($priceSubTotal, 0, '.', '.') ?>đ</span></li>
                        <?php endforeach  ?>
                    </ul>
                    <div class="total clearfix">TOTAL <span><?= number_format($priceSum, 0, '.', '.') ?>đ</span></div>
                    <!-- <a href="<?= BASE_URL ?>?act=confirm" class="btn_1 full-width">Đặt Hàng</a> -->
                    <button class="btn_1 full-width" name="payUrl" type="submit">Mua Hàng</button>
                </div>
                <!-- /box_general -->
            </div>
            <!-- /step -->
        </div>

    </form>
    <!-- /row -->
</div>
<!-- /container -->