<?php require_once "./core/toast.php";  ?>
<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?= BASE_URL ?>">Home</a></li>
                <!-- <li><a href="#">Category</a></li> -->
                <li>Đơn hàng</li>
            </ul>
        </div>
        <h1>Đơn hàng của bạn</h1>
    </div>
    <?php if (!empty($selectOneOrder)) :  ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tình Trạng</th>
                    <th scope="col">Hình thức thanh toán</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($selectOneOrder as $key => $value) :  ?>
                    <?php

                    if ($value['status'] == 'Đã Giao Hàng') {
                        $activeClass = 'badge bg-success';
                    } elseif ($value['status'] == 'Đang Vận Chuyển') {
                        $activeClass = 'badge bg-warning';
                    } else {
                        $activeClass = 'badge bg-danger';
                    }

                    if ($value['payments'] == 'Đã thanh toán') {
                        $activePay = 'badge bg-success';
                    } else {
                        $activePay = 'badge bg-info';
                    }

                    ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $value['code_order'] ?></td>
                        <td><span class="<?= $activeClass ?> p-2"><?= $value['status'] ?></span></td>
                        <td><span class="<?= $activePay ?> p-2"><?= $value['payments'] ?></span></td>
                        <td><?= number_format($value['total_amount'], 0, '.', '.') ?>đ</td>
                        <td>
                            <a href="<?= BASE_URL . '?act=show-my-order&id=' . $value['id'] ?>" class="btn btn-primary">Xem Chi Tiết</a>
                            <?php if ($value['status'] == 'Đang Xử Lý') : ?>
                                <a href="<?= BASE_URL . '?act=delete-order&id=' . $value['id'] ?>" class="btn btn-warning" onclick="return confirm('Bạn có chắc muốn hủy bỏ đơn hàng này ?')">Hủy đơn hàng</a>
                            <?php endif  ?>
                        </td>
                    </tr>
                <?php endforeach  ?>
            </tbody>
        </table>
    <?php else : ?>
        <h1 class="text-danger">Bạn chưa có đơn hàng nào . <a href="<?= BASE_URL . '?act=shop' ?>">Shopping ngay</a></h1>
    <?php endif ?>
</div>