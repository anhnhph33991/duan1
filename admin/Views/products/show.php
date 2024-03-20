<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= BASE_URL_ADMIN ?>?act=products" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Show Product</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=products">Product</a></div>
            <div class="breadcrumb-item">Show Product</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Show Products</h2>
        <!-- {{-- <p class="section-lead">--}}
        {{-- Show Category--}}
        {{-- </p>--}} -->

        <div class="row" action="" method="post">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Your Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Id</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $product['p_id'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $product['p_name'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="$<?= $product['p_price'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item" data-image="<?= BASE_URL . $product['p_image'] ?>" data-title="<?= $product['p_image'] ?>" style="width: 100%; height: 500px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $product['p_description'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Views</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $product['p_views'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $product['c_name'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>