<div class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= BASE_URL_ADMIN ?>?act=products" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Upload image</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=products">Image</a></div>
            <div class="breadcrumb-item">Upload Image</div>
        </div>
    </div>
    <div class="section-body">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Image</label>
            <input type="file" name="image">
            <br>
            <input type="submit" name="submit" value="submit" class="btn btn-warning">
        </form>
    </div>
</div>