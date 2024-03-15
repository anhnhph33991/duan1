<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= BASE_URL_ADMIN ?>?act=slides" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New Slide</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=slides">Slide</a></div>
            <div class="breadcrumb-item">Create New Slide</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Create New Slide</h2>

        <form class="row" action="" method="post" enctype="multipart/form-data">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Write Your Slide</h4>
                    </div>
                    <div class="card-body">
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
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="typeSlide">
                                    <option disabled selected>Select Type Slide</option>
                                    <option value="main">Slide Main</option>
                                    <option value="slideCategory">Slide Categoy</option>
                                    
                                </select>

                                <div style="color: #dc3545; font-size: 80%; margin-top: 0.25rem; width: 100%;">
                                    <?= !empty($_SESSION['errors']['typeSlide']) ? $_SESSION['errors']['typeSlide'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" name="submit">Create Slide</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>