<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= BASE_URL_ADMIN ?>?act=users" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Show User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=users">Users</a></div>
            <div class="breadcrumb-item">Show User</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Show User</h2>
        <div class="row" action="" method="post">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Your Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Id</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $user['id'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $user['username'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $user['email'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item" data-image="<?= BASE_URL . $user['image'] ?>" data-title="<?= $user['username'] ?>" style="width: 100%; height: 500px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $user['address'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tel</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control <?= $user['tel'] ? '' : 'text-danger'  ?>" name="name" value="<?= $user['tel'] ?? 'No Data' ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Shipping Address</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control <?= $user['shipping_address'] ? '' : 'text-danger'  ?>" name="name" value="<?= $user['shipping_address'] ?? 'No Data' ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wallet Balance</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control <?= $user['wallet_balance'] ? '' : 'text-danger'  ?>" name="name" value="<?= $user['wallet_balance'] ?? 'No Data' ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>