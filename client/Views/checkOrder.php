<div id="track_order">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-7 col-lg-9">
                <img src="<?= BASE_URL ?>public/assets/img/track_order.svg" alt="" class="img-fluid add_bottom_15" width="200" height="177">
                <p>Quick Tracking Order</p>
                <!-- <form method="post" action=""> -->
                <div class="search_bar">
                    <input type="text" class="form-control checking" placeholder="Invoice ID" name="checkorder">
                    <input type="submit" value="Search" onclick="searchCheckOrder()">
                </div>
                <!-- </form> -->
            </div>
        </div>

        <?php if (isset($dataOrder)) : ?>
            <?php if (!empty($dataOrder)) : ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Đơn Hàng</th>
                            <th scope="col">Khách Hàng</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Hình thức thanh toán</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php

                            if (isset($dataOrder['status']) && $dataOrder['status'] == 'Đã Giao Hàng') {
                                $activeClass = 'badge bg-success';
                            } elseif ($dataOrder['status'] == 'Đang Vận Chuyển') {
                                $activeClass = 'badge bg-warning';
                            } else {
                                $activeClass = 'badge bg-danger';
                            }


                            ?>
                            <th scope="row">1</th>
                            <td><?= $dataOrder['code_order'] ?></td>
                            <td><?= $dataOrder['username'] ?></td>
                            <td>
                                <span class="<?= $activeClass ?> p-2">
                                    <?= $dataOrder['status'] ?>
                                </span>
                            </td>
                            <td><span class="badge bg-success p-2"><?= $dataOrder['payments'] ?></span></td>
                            <td><?= $dataOrder['address'] ?></td>
                            <td><?= number_format($dataOrder['total_amount'], 0, '.', '.') ?>đ</td>
                        </tr>
                    </tbody>
                </table>
            <?php else :  ?>

                <h1 class="text-danger">Mã đơn hàng sai . Vui lòng kiểm tra lại tin nhắn email</h1>

            <?php endif ?>
        <?php endif ?>
        <!-- /row -->
    </div>


    <!-- /container -->
</div>
<!-- /track_order -->