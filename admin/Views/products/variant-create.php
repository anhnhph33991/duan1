<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= BASE_URL_ADMIN ?>?act=variant-product&id=<?= $id ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Thêm Biến Thể</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=products">Product</a></div>
            <div class="breadcrumb-item">Thêm Biến Thể</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Biến Thể Mới</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Multiple Upload</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" class="dropzone" id="mydropzone" method="post">
                            <div class="fallback">
                                <input name="multiple_file" type="file" multiple />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary btn__variantProduct" name="submit" type="button">Create Variant</button>
                </div>
            </div>
        </div>
    </div>
</section>