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
                                    <th>Số Sản Phẩm</th>
                                    <th>Tổng Giá</th>
                                    <th>Trạng Thái</th>
                                    <th>Thời Gian</th>
                                    <th>Action</th>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>LUXCHILL#239223</td>
                                    <td>Nguyễn Hoàng Anh</td>
                                    <td>10</td>
                                    <td>1.200.999đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td>10-3-2024</td>
                                    <td>
                                        <a href="<?= BASE_URL_ADMIN ?>?act=show-order" class="btn btn-success">SHOW</a>
                                        <a href="" class="btn btn-warning">DELETE</a>
                                    </td>
                                </tr>
                                    <?php

                                    // echo "<pre>";
                                    // print_r($value);
                                    // echo "</pre>";

                                    ?>
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