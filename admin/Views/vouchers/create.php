<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= BASE_URL_ADMIN ?>?act=vouchers" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New Voucher</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=vouchers">Voucher</a></div>
            <div class="breadcrumb-item">Voucher</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Create New Voucher</h2>

        <form class="row" action="" method="post" enctype="multipart/form-data">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Write Your Voucher</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Voucher Code</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control <?= !empty($_SESSION['errors']['code']) ? 'is-invalid' : '' ?>" name="code">
                                <div class="invalid-feedback">
                                    <?= !empty($_SESSION['errors']['code']) ? $_SESSION['errors']['code'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Voucher Value</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control <?= !empty($_SESSION['errors']['value']) ? 'is-invalid' : '' ?>" name="value">
                                <div class="invalid-feedback">
                                    <?= !empty($_SESSION['errors']['value']) ? $_SESSION['errors']['value'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Voucher Desc</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" name="desc"></textarea>
                                <div style="color: #dc3545; font-size: 80%; margin-top: 0.25rem; width: 100%;">
                                    <?= !empty($_SESSION['errors']['desc']) ? $_SESSION['errors']['desc'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Voucher Qty</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control <?= !empty($_SESSION['errors']['qty']) ? 'is-invalid' : '' ?>" name="qty">
                                <div class="invalid-feedback">
                                    <?= !empty($_SESSION['errors']['qty']) ? $_SESSION['errors']['qty'] : '' ?>
                                </div>
                            </div>
                        </div>                      

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" name="submit">Create Voucher</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>