<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= BASE_URL_ADMIN ?>?act=products" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Table</h1>
        <div class="section-header-button">
            <a href="<?= BASE_URL_ADMIN . '?act=add-variant-product&id=' . $id ?>" class="btn btn-primary">Thêm Biến Thể</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN . '?act=products' ?>">Products</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <?php

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        ?>

        <?php require_once "../core/toast.php" ?>

        <h2 class="section-title">Table</h2>
        <p class="section-lead">Hiển Thị Biến Thể Product</p>

        <?php if (!empty($data)) :  ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Variant Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Image</th>
                                            <th>User Name</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php foreach ($data as $key => $value) :  ?>
                                            <?php
                                            // class change status color

                                            // $checkStyleStatus = $value['p_status'] == 'public' ? 'badge-primary' : 'badge-warning';

                                            // echo "<pre>";
                                            // print_r($value);
                                            // echo "</pre>";

                                            ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td>
                                                    <div class="gallery">
                                                        <div class="gallery-item" data-image="<?= BASE_URL . $value['v_image'] ?>" data-title="<?= $value['p_name'] ?>"></div>
                                                    </div>
                                                </td>
                                                <td><?= $value['p_name'] ?></td>
                                                <td>
                                                    <a href="<?= BASE_URL_ADMIN ?>?act=show-product&id=<?= $value['p_id'] ?>" class="btn btn-secondary"><i class="fa-regular fa-eye"></i></a>
                                                    <a href="<?= BASE_URL_ADMIN ?>?act=update-product&id=<?= $value['p_id'] ?>" class="btn btn-warning">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="<?= BASE_URL_ADMIN ?>?act=delete-product&id=<?= $value['p_id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa product: <?= $value['p_name'] ?>')">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                    <div class="btn-group dropleft">
                                                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa-solid fa-sliders"></i>

                                                        </button>
                                                        <div class="dropdown-menu dropleft" x-placement="left-start" style="position: absolute; transform: translate3d(-202px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a class="dropdown-item" href="<?= BASE_URL_ADMIN ?>?act=variant-product&id=<?= $value['p_id'] ?>">Biến Thể</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;  ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        <?php else :  ?>

            <div class="row">
                <div class="text-center col-12">
                    <h1 class="text-danger">No data</h1>
                    <a href="<?= BASE_URL_ADMIN ?>?act=products">Back Table Product</a>
                </div>
            </div>

        <?php endif ?>

    </div>

</section>