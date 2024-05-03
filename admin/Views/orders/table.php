<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN . '?act=orders' ?>">Orders</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>
    <div class="section-body">
        <?php require_once "../core/toast.php" ?>

        <?php
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        ?>
        <h2 class="section-title">Table</h2>
        <p class="section-lead">Hiển Thị Orders</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Orders Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Họ Tên</th>
                                    <th>Tổng Giá</th>
                                    <th>Trạng Thái</th>
                                    <th>Thời Gian</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach ($dataOrder as $key => $value) :  ?>
                                    <?php

                                    $status = $value['status'];
                                    $status_text = ($status == 'Đang Xử Lý') ? 'badge-danger' : (($status == 'Đang Vận Chuyển') ? 'badge-warning' : 'badge-success');
                                    ?>
                                    <tr>
                                        <td><?= $value['id'] ?></td>
                                        <td><?= $value['code_order'] ?></td>
                                        <td><?= $value['username'] ?></td>
                                        <td><?= number_format($value['total_amount'], 0, '.', '.') ?>đ</td>
                                        <td class="badge <?= $status_text ?>"><?= $value['status'] ?></td>
                                        <td><?= $value['time_at'] ?></td>
                                        <td>
                                            <a href="<?= BASE_URL_ADMIN ?>?act=show-order&id=<?= $value['id'] ?>" class="btn btn-success">SHOW</a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=delete-order&id=' . $value['id'] ?>" class="btn btn-warning" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không ?')">DELETE</a>
                                        </td>
                                    </tr>
                                <?php endforeach  ?>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=comments&page=<?= ($page > 1) ? ($page - 1) : 1 ?>" tabindex="-1">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                    <li class="page-item  <?= $i == $page ? 'active' : ''  ?>">
                                        <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=comments&page=<?= $i ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=comments&page=<?= ($page == $total_pages) ? $page : ($page + 1) ?>"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>