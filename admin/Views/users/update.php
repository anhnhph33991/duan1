<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= BASE_URL_ADMIN ?>?act=users" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=users">Users</a></div>
            <div class="breadcrumb-item">Update User</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Update User</h2>
        <form class="row" action="" method="post" enctype="multipart/form-data">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Your User</h4>
                    </div>
                    <!-- Id User Hidden -->
                    <input type="text" name="id" value="<?= $user['id'] ?>" class="d-none">

                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control <?= !empty($_SESSION['errors']['name']) ? 'is-invalid' : '' ?>" name="name" value="<?= $user['username'] ?>">
                                <div class="invalid-feedback">
                                    <?= !empty($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="email" class="form-control <?= !empty($_SESSION['errors']['email']) ? 'is-invalid' : '' ?>" name="email" value="<?= $user['email'] ?>">
                                <div class="invalid-feedback">
                                    <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="password" class="form-control <?= !empty($_SESSION['errors']['password']) ? 'is-invalid' : '' ?>" name="password" value="<?= $user['password'] ?>">
                                <div class="invalid-feedback">
                                    <?= !empty($_SESSION['errors']['password']) ? $_SESSION['errors']['password'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control <?= !empty($_SESSION['errors']['address']) ? 'is-invalid' : '' ?>" name="address" value="<?= $user['address'] ?>">
                                <div class="invalid-feedback">
                                    <?= !empty($_SESSION['errors']['address']) ? $_SESSION['errors']['address'] : '' ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Number Phone</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="tel" class="form-control <?= !empty($_SESSION['errors']['tel']) ? 'is-invalid' : '' ?>" name="tel" value="<?= $user['tel'] ?>">
                                <div class="invalid-feedback">
                                    <?= !empty($_SESSION['errors']['tel']) ? $_SESSION['errors']['tel'] : '' ?>
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
                        <input type="text" class="d-none" value="<?= $user['image'] ?>" name="imageOld">

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" name="submit">Update User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>