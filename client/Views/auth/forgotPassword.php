<?php if (isset($_COOKIE['message'])) : ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong><?= $_COOKIE['message'] ?? '' ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<div class="container margin_30">
    <div class="page_header">
        <h1>Forgot Password</h1>
    </div>
    <!-- /page_header -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <form class="form_container" action="" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                    </div>
                    <div class="text-center"><input type="submit" name="submit" value="Submit" class="btn_1 full-width"></div>
                    <div class="py-3">
                        <div class="float-end"><a id="forgot" href="<?= BASE_URL ?>?act=login">Trở về login</a></div>
                    </div>
                </form>
                <!-- /form_container -->
            </div>
            <!-- /box_account -->
            <div class="row">
                <div class="col-md-12 d-none d-lg-block">
                    <ol class="list_ok">
                        <li class="text-danger">Có cái mật khẩu cũng quên thì làm gì cho đời ?</li>
                        <li class="text-danger">Nhập email vào</li>
                        <li class="text-danger">Check mail rồi tạo pass mới</li>
                    </ol>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /row -->
</div>