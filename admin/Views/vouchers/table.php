<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="section-header-button">
            <a href="<?= BASE_URL_ADMIN . '?act=add-voucher' ?>" class="btn btn-primary">Add Voucher</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN . '?act=vouchers' ?>">Vouchers</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <?php

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        ?>
        <h2 class="section-title">Table</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Vouchers Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>Voucher_Code</th>
                                    <th>Voucher_Value</th>
                                    <th>Voucher_Desc</th>
                                    <th>Voucher_Qty</th>
                                    <th>Time_Create</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach ($data as $key => $value) :  ?>
                                    <?php

                                    // echo "<pre>";
                                    // print_r($value);
                                    // echo "</pre>";

                                    ?>
                                    <tr>
                                        <td><?= $value['voucher_code'] ?></td>
                                        <td><?= $value['value'] ?></td>
                                        <td><?= $value['voucher_desc'] ?></td>
                                        <td>
                                            <?= $value['qty'] ?>
                                        </td>
                                        <td><?= $value['time_create'] ?></td>
                                        <td>
                                            <a href="<?= BASE_URL_ADMIN ?>?act=show-voucher&id=<?= $value['id'] ?>" class="btn btn-secondary"><i class="fa-regular fa-eye"></i></a>
                                            <a href="<?= BASE_URL_ADMIN ?>?act=update-voucher&id=<?= $value['id'] ?>" class="btn btn-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN ?>?act=delete-voucher&id=<?= $value['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa voucher: <?= $value['voucher_code'] ?>')">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
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
                                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=vouchers&page=<?= ($page > 1) ? ($page - 1) : 1 ?>" tabindex="-1">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                    <li class="page-item  <?= $i == $page ? 'active' : ''  ?>">
                                        <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=vouchers&page=<?= $i ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=vouchers&page=<?= ($page == $total_pages) ? $page : ($page + 1) ?>"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>