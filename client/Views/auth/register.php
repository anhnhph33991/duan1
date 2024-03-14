<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?= BASE_URL ?>">Home</a></li>
                <li>Register</li>
            </ul>
        </div>
        <h1>Register Form</h1>
    </div>
    <!-- /page_header -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="new_client">New Client</h3> <small class="float-right pt-2">* Required Fields</small>
                <form class="form_container" action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control <?= !empty($_SESSION['errors']['username']) ? 'is-invalid' : '' ?>" name="username" placeholder="Họ và tên">
                        <div class="invalid-feedback">
                            <?= !empty($_SESSION['errors']['username']) ? $_SESSION['errors']['username'] : '' ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control <?= !empty($_SESSION['errors']['email']) ? 'is-invalid' : '' ?>" id="password_in_2" name="email" id="email_2" placeholder="Email*">
                        <div class="invalid-feedback">
                            <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control <?= !empty($_SESSION['errors']['password']) ? 'is-invalid' : '' ?>" name="password" id="password_in_2" value="" placeholder="Password*">
                        <div class="invalid-feedback">
                            <?= !empty($_SESSION['errors']['password']) ? $_SESSION['errors']['password'] : '' ?>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" placeholder="Thành Phố">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tel" placeholder="Số điện thoại">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Full địa chỉ">
                    </div> -->

                    <hr>
                    <hr>
                    <!-- <div class="form-group">
                        <label class="container_check">Accept <a href="#0">Terms and conditions</a>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> -->
                    <div class="text-center"><input type="submit" name="submit" value="Register" class="btn_1 full-width"></div>
                    <div class="py-3">
                        <div class="float-end"><a id="forgot" href="<?= BASE_URL ?>?act=login">Đã có tài khoản ?</a></div>
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
        </div>
    </div>
    <!-- /row -->
</div>