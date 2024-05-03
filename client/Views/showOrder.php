<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?= BASE_URL ?>">Home</a></li>
                <li><a href="<?= BASE_URL . '?act=my-order' ?>">Đơn hàng</a></li>
                <li>Hiển thị sản phẩm đã mua</li>
            </ul>
        </div>
        <h1>Hiển thị sản phẩm đã mua</h1>
    </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
            </tr>
        </thead>
        <?php foreach ($dataJoin as $key => $value) : ?>
            <?php

            // echo "<pre>";
            // print_r($value);
            // echo "</pre>";

            ?>
            <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><img src="<?= BASE_URL . $value['image'] ?>" alt="" style="height: 70px; width: 70px;"></td>
                <td><?= $value['name'] ?></td>
                <td><?= number_format($value['price'], 0, '.', '.') ?>đ</td>
                <td><?= $value['qty']  ?></td>
            </tr>
        <?php endforeach ?>
        <tbody>
        </tbody>
    </table>

    <h1>Tổng tiền: <?= number_format($dataSelectOrder['total_amount'], 0, '.', '.') ?>đ</h1>
</div>