<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= BASE_URL_ADMIN ?>?act=products" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Product</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=products">Product</a></div>
            <div class="breadcrumb-item">Update Product</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Update Product</h2>
        <!-- {{-- <p class="section-lead">--}}
        {{-- Tạo category--}}
        {{-- </p>--}} -->

        <form class="row" action="" method="post" enctype="multipart/form-data">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Your Product</h4>
                    </div>
                    <div class="card-body">
                        <!-- Id Product Hidden -->

                        <input type="tel" name="id" class="d-none" value="<?= $product['p_id'] ?>">

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control <?= !empty($_SESSION['errors']['name']) ? 'is-invalid' : '' ?>" name="name" value="<?= $product['p_name'] ?>">
                                <div class="invalid-feedback">
                                    <?= !empty($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control <?= !empty($_SESSION['errors']['price']) ? 'is-invalid' : '' ?>" name="price" value="<?= $product['p_price'] ?>">
                                <div class="invalid-feedback">
                                    <?= !empty($_SESSION['errors']['price']) ? $_SESSION['errors']['price'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image" id="image-upload" class="<?= !empty($_SESSION['errors']['image']) ? 'is-invalid' : '' ?>" style="height: 100%" />
                                </div>
                                <div style="color: #dc3545; font-size: 80%; margin-top: 0.25rem; width: 100%;">
                                    <?= !empty($_SESSION['errors']['image']) ? $_SESSION['errors']['image'] : '' ?>
                                </div>
                            </div>
                        </div>

                        <!-- Image Old Hidden -->

                        <input type="text" name="imageOld" value="<?= $product['p_image'] ?>" class="d-none">

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" name="description"></textarea>
                                <div style="color: #dc3545; font-size: 80%; margin-top: 0.25rem; width: 100%;">
                                    <?= !empty($_SESSION['errors']['description']) ? $_SESSION['errors']['description'] : '' ?>
                                </div>
                            </div>
                        </div>

                        <!-- Desc Old Hidden -->

                        <input type="text" name="descOld" value="<?= $product['p_description'] ?>" class="d-none">

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="id_category">
                                    <option disabled selected value="<?= $product['c_id'] ?>"><?= $product['c_name'] ?></option>
                                    <?php foreach($categorys as $key => $value) : ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <div style="color: #dc3545; font-size: 80%; margin-top: 0.25rem; width: 100%;">
                                    <?= !empty($_SESSION['errors']['id_category']) ? $_SESSION['errors']['id_category'] : '' ?>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" name="submit">Update Product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>