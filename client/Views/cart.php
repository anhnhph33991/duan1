<?php require_once "./core/toast.php" ?>
<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?= BASE_URL ?>">Home</a></li>
                <!-- <li><a href="#">Category</a></li> -->
                <li>Cart</li>
            </ul>
        </div>
        <h1>Cart page</h1>
    </div>
    <!-- /page_header -->
    <?php if (!empty($_SESSION['cart'])) : ?>
        <table class="table table-striped cart-list">
            <thead>
                <tr>
                    <th>
                        Product
                    </th>
                    <th>
                        Id
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Quantity
                    </th>
                    <th>
                        Subtotal
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $key => $value) : ?>
                    <?php

                    // echo "<pre>";
                    // print_r($value);
                    // echo "</pre>";


                    ?>
                    <tr>
                        <td>
                            <div class="thumb_cart">
                                <img src="<?= BASE_URL . $value['imageProduct'] ?>" data-src="<?= BASE_URL . $value['imageProduct'] ?>" class="lazy" alt="Image">
                            </div>
                            <span class="item_cart"><?= $value['nameProduct'] ?></span>
                        </td>
                        <td>
                            <strong><?= $value['idUser'] ?></strong>
                        </td>
                        <td>
                            <strong><?= number_format($value['priceProduct'], 0, '.', '.') ?>đ</strong>
                        </td>
                        <td>
                            <!-- <div class="numbers-row"> -->
                            <!-- <input type="text" value="1" id="quantity_1" class="qty2 input_qty" name="quantity_1" min="1">
                                <div class="inc button_inc plus__button">+</div>
                                <div class="dec button_inc dash__button">-</div> -->
                            <div class="d-flex">
                                <button class="plus__button btn btn-outline-primary" style="width: 30px; ">+</button>
                                <input type="tel" value="1" name="qty_product_cart" style="width: 30%;" class="qtyInput-<?= $key ?>">
                                <button class="dash__button btn btn-outline-primary" style="width: 30px; ">-</button>
                            </div>
                            <!-- </div> -->
                        </td>
                        <td>
                            <strong>$140.00</strong>
                        </td>
                        <td class="options">
                            <a href="<?= BASE_URL ?>?act=remove-product&id=<?= $key ?>&name=<?= $value['nameProduct'] ?>"><i class="ti-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else : ?>
        <h1>Ko co data</h1>
        <a href="<?= BASE_URL ?>?act=shop">Shopping</a>
    <?php endif ?>



    <div class="row add_top_30 flex-sm-row-reverse cart_actions">
        <div class="col-sm-4 text-end">
            <button type="button" class="btn_1 gray">Update Cart</button>
        </div>
        <div class="col-sm-8">
            <div class="apply-coupon">
                <div class="form-group">
                    <div class="row g-2">
                        <div class="col-md-6"><input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"></div>
                        <div class="col-md-4"><button type="button" class="btn_1 outline">Apply Coupon</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /cart_actions -->

</div>
<!-- /container -->

<div class="box_cart">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <ul>
                    <li>
                        <span>Subtotal</span> $240.00
                    </li>
                    <li>
                        <span>Shipping</span> $7.00
                    </li>
                    <li>
                        <span>Total</span> $247.00
                    </li>
                </ul>
                <a href="<?= BASE_URL ?>?act=checkout" class="btn_1 full-width cart">Thanh Toán</a>
            </div>
        </div>
    </div>
</div>
<!-- /box_cart -->