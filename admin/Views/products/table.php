<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="section-header-button">
            <a href="<?= BASE_URL_ADMIN . '?act=add-product' ?>" class="btn btn-primary">Add Product</a>
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
        <p class="section-lead">Hiển Thị Products</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Products Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <!-- <th>Description</th> -->
                                        <th>Views</th>
                                        <th>Categorys</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($data as $key => $value) :  ?>
                                        <?php
                                        // class change status color
                                        $checkStyleStatus = $value['p_status'] == 'public' ? 'badge-primary' : 'badge-warning';
                                        // chuyển chuối string thành array
                                        $explodeImage = explode(',', $value['p_image']);
                                        ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td>
                                                <div class="gallery">
                                                    <div class="gallery-item" data-image="<?= BASE_URL . $explodeImage[0] ?>" data-title="<?= $value['p_name'] ?>"></div>
                                                </div>
                                            </td>
                                            <td><?= strlen($value['p_name']) > 10 ? substr($value['p_name'], 0, 30) . '...' : $value['p_name'] ?></td>
                                            <td><?= number_format($value['p_price'], 0, '.', '.') ?> đ</td>
                                            <td><?= $value['p_views'] ?></td>
                                            <td><?= $value['c_name'] ?></td>
                                            <td>
                                                <div class="badge <?= $checkStyleStatus ?>"><?= $value['p_status'] ?></div>
                                            </td>
                                            <td>
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa-solid fa-sliders"></i>

                                                    </button>
                                                    <div class="dropdown-menu dropleft" x-placement="left-start" style="position: absolute; transform: translate3d(-202px, 0px, 0px); top: 0px; left: 0px; will-change: transform; border: 1px solid black;">
                                                        <a class="dropdown-item" href="<?= BASE_URL_ADMIN ?>?act=show-product&id=<?= $value['p_id'] ?>"><i class="fa-regular fa-eye" style="color: #ababab;"></i><span style="margin-left: 0.5rem">Show</span></a>
                                                        <a class="dropdown-item" href="<?= BASE_URL_ADMIN ?>?act=update-product&id=<?= $value['p_id'] ?>"><i class="fa-regular fa-pen-to-square" style="color: #FFD43B;"></i><span style="margin-left: 0.5rem">Edit</span></a>
                                                        <a class="dropdown-item" href="<?= BASE_URL_ADMIN ?>?act=delete-product&id=<?= $value['p_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa product: <?= $value['p_name'] ?>')"><i class="fa-solid fa-trash" style="color: #f50529;"></i><span style="margin-left: 0.5rem">Delete</span></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;  ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=products&page=<?= ($page > 1) ? ($page - 1) : 1 ?>" tabindex="-1">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                    <li class="page-item  <?= $i == $page ? 'active' : ''  ?>">
                                        <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=products&page=<?= $i ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=products&page=<?= ($page == $total_pages) ? $page : ($page + 1) ?>"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>