<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="section-header-button">
            <a href="<?= BASE_URL_ADMIN . '?act=add-user' ?>" class="btn btn-primary">Add User</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN . '?act=users' ?>">Users</a></div>
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
        <p class="section-lead">Hiển Thị Users</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Users Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>Image</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Tel</th>
                                    <th>Shipping Address</th>
                                    <th>Wallet Balance</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach ($data as $key => $value) :  ?>
                                    <?php

                                    // echo "<pre>";
                                    // print_r($value);
                                    // echo "</pre>";

                                    ?>
                                    <tr>
                                        <td>
                                            <div class="gallery">
                                                <div class="gallery-item" data-image="<?= BASE_URL . $value['image'] ?>" data-title="<?= $value['username'] ?>"></div>
                                            </div>
                                        </td>
                                        <td><?= $value['username'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td>
                                            <?= $value['address'] ?? '<p class="text-danger">No Data</p>' ?>
                                        </td>
                                        <td><?= $value['tel'] ?? '<p class="text-danger">No Data</p>' ?></td>
                                        <td><?= $value['shipping_address'] ?? '<p class="text-danger">No Data</p>' ?></td>
                                        <td><?= $value['wallet_balance'] ?? '<p class="text-danger">No Data</p>' ?></td>
                                        <td>
                                            <a href="<?= BASE_URL_ADMIN ?>?act=show-user&id=<?= $value['id'] ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" data-original-title="Show">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN ?>?act=update-user&id=<?= $value['id'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" data-original-title="Update">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN ?>?act=delete-user&id=<?= $value['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa user: <?= $value['username'] ?>')" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa-solid fa-sliders"></i>

                                                </button>
                                                <div class="dropdown-menu dropleft" x-placement="left-start" style="position: absolute; transform: translate3d(-202px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach;  ?>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=users&page=<?= ($page > 1) ? ($page - 1) : 1 ?>" tabindex="-1">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                    <li class="page-item  <?= $i == $page ? 'active' : ''  ?>">
                                        <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=users&page=<?= $i ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=users&page=<?= ($page == $total_pages) ? $page : ($page + 1) ?>"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>