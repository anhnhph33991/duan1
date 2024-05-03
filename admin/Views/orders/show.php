<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= BASE_URL_ADMIN ?>?act=orders" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Show Order</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=orders">Orders</a></div>
            <div class="breadcrumb-item">Show order</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Show Order</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>- Thông tin đơn hàng</h4>
                    </div>
                    <div class="card-body">

                        <div>
                            <div>
                                <h5>Mã đơn hàng</h5>
                                <p><?= $dataOrder['code_order'] ?></p>
                            </div>
                            <div>
                                <h5>Địa chỉ nhận hàng</h5>
                                <p><?= $dataOrder['address'] ?></p>
                            </div>
                            <div>
                                <h5>Hình thức thanh toán</h5>
                                <p><?= $dataOrder['payments'] ?></p>
                            </div>
                            <div>
                                <form action="" method="post">
                                    <h5>Tình trạng đơn hàng</h5>
                                    <select name="status">
                                        <option value="" disabled selected><?= $dataOrder['status'] ?></option>
                                        <option value="Đang Vận Chuyển">Đang Vận Chuyển</option>
                                        <option value="Đã Giao Hàng">Đã Giao Hàng</option>
                                    </select>
                                    <button type="submit" name="submit">Cập nhật đơn hàng</button>
                                </form>
                            </div>
                        </div>

                    </div>


                    <div class="card-header">
                        <h4>- Sản phẩm đơn hàng</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>STT</th>
                                    <th>Image Product</th>
                                    <th>Name Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>TOTAL</th>
                                </tr>

                                <?php

                                // echo "<pre>";
                                // print_r($testdata);
                                // echo "</pre>";


                                ?>
                                <?php $priceSum = 0 ?>
                                <?php foreach ($testdata as $key => $value) :  ?>
                                    <?php
                                    $priceTotal =  $value['price'] * $value['qty'];
                                    $priceSum += $priceTotal;


                                    ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td>
                                            <img src="<?= BASE_URL . $value['image'] ?>" alt="" style="height: 70px; width: 70px;">
                                        </td>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= number_format($value['price'], 0, '.', '.') ?> đ</td>
                                        <td><?= $value['qty'] ?></td>
                                        <td><?= number_format($priceTotal, 0, '.', '.') ?> đ</td>
                                    </tr>
                                <?php endforeach  ?>
                            </table>
                        </div>

                    </div>

                    <div class="card-header">
                        <h4>- Giá trị đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <h1>Tổng số lượng: <span><?= count($testdata) ?? '' ?> sản phẩm</span></h1>
                        <h1>Tổng Tiền: <span class="text-danger"><?= number_format($priceSum, 0, '.', '.') ?>đ</span></h1>
                    </div>
                </div>

            </div>
        </div>
    </div>