<?php if (isset($_COOKIE['message'])) : ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong><?= $_COOKIE['message'] ?? '' ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?= BASE_URL ?>">Home</a></li>
                <li>Login Form</li>
            </ul>
        </div>
        <h1>Login</h1>
    </div>
    <!-- /page_header -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Đã là khách hàng</h3>
                <form class="form_container" action="" method="post">
                    <div class="row no-gutters">
                        <div class="col-lg-6 pr-lg-1">
                            <a href="#0" class="social_bt facebook">Login with Facebook</a>
                        </div>
                        <div class="col-lg-6 pl-lg-1">
                            <a href="#0" class="social_bt google">Login with Google</a>
                        </div>
                    </div>
                    <div class="divider"><span>Or</span></div>
                    <div class="form-group">
                        <input type="email" class="form-control <?= !empty($_SESSION['errors']['email']) ? 'is-invalid' : '' ?>" name="email" id="email" placeholder="Email*">
                        <div class="invalid-feedback">
                            <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control <?= !empty($_SESSION['errors']['password']) ? 'is-invalid' : '' ?>" name="password" id="password_in" value="" placeholder="Password*">
                        <div class="invalid-feedback">
                            <?= !empty($_SESSION['errors']['password']) ? $_SESSION['errors']['password'] : '' ?>
                        </div>
                    </div>
                    <div class="clearfix add_bottom_15">
                        <div class="checkboxes float-start">
                            <label class="container_check">Remember me
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="float-end"><a id="forgot" href="<?= BASE_URL ?>?act=forgotPassword">Quên Mật Khẩu ?</a></div>
                    </div>
                    <div class="text-center"><input type="submit" name="submit" value="Log In" class="btn_1 full-width"></div>
                    <div class="py-3">
                        <div class="float-end"><a id="forgot" href="<?= BASE_URL ?>?act=register">Chưa có tài khoản ?</a></div>
                    </div>
                </form>
                <!-- /form_container -->
            </div>
            <!-- /box_account -->
            <div class="row">
                <div class="col-md-6 d-none d-lg-block">
                    <ul class="list_ok">
                        <li>Find Locations</li>
                        <li>Quality Location check</li>
                        <li>Data Protection</li>
                    </ul>
                </div>
                <div class="col-md-6 d-none d-lg-block">
                    <ul class="list_ok">
                        <li>Secure Payments</li>
                        <li>H24 Support</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /row -->
</div>