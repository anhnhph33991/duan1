<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= BASE_URL_ADMIN ?>?act=comments" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Show Comment</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=comments">Comments</a></div>
            <div class="breadcrumb-item">Show Comment</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Show Comment</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Your Products</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        // echo "<pre>";
                        // print_r($comment);
                        // echo "</pre>";

                        ?>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Comment Id</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $comment['comment_id'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Comment Content</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $comment['comment_content'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Comment Stars</label>
                            <div class="col-sm-12 col-md-7" >
                                <i class="fa-solid fa-star fa-bounce" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star fa-bounce" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star fa-bounce" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star fa-bounce" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star fa-bounce" style="color: #FFD43B;"></i>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $comment['user_name'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User Image</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item" data-image="data:image/jpeg;base64,<?= $comment['user_image'] ?>" data-title="<?= $comment['user_name'] ?>" style="width: 100%; height: 500px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="<?= $comment['product_name'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Image</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item" data-image="data:image/jpeg;base64,<?= $comment['product_image'] ?>" data-title="<?= $comment['product_name'] ?>" style="width: 100%; height: 500px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>