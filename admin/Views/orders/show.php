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
                                <p>LUXCHILL#239223</p>
                            </div>
                            <div>
                                <h5>Địa chỉ nhận hàng</h5>
                                <p>Thôn 1, xã song phương, hoài đức, hà nội</p>
                            </div>
                            <div>
                                <h5>Hình thức thanh toán</h5>
                                <p>Thanh toán tại nhà</p>
                            </div>
                            <div>
                                <h5>Tình trạng đơn hàng</h5>
                                <select name="" id="">
                                    <option value="" disabled selected>Chờ Xác Nhận</option>
                                    <option value="">Đang Vận Chuyển</option>
                                    <option value="">Đã Giao Hàng</option>
                                </select>
                                <button>Cập nhật đơn hàng</button>
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

                                <tr>
                                    <td>1</td>
                                    <td>
                                        <img src="http://localhost/ismart.com/admin/public/images/img-product.png" alt="">
                                    </td>
                                    <td>Áo Nam 1</td>
                                    <td>99.000đ</td>
                                    <td>5</td>
                                    <td>495.000đ</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <img src="http://localhost/ismart.com/admin/public/images/img-product.png" alt="">
                                    </td>
                                    <td>Áo Nam 1</td>
                                    <td>99.000đ</td>
                                    <td>5</td>
                                    <td>495.000đ</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <img src="http://localhost/ismart.com/admin/public/images/img-product.png" alt="">
                                    </td>
                                    <td>Áo Nam 1</td>
                                    <td>99.000đ</td>
                                    <td>5</td>
                                    <td>495.000đ</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <div class="card-header">
                        <h4>- Giá trị đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <h1>Tổng số lượng: <span>15 sản phẩm</span></h1>
                        <h1>Tổng Tiền: <span class="text-danger">999.999đ</span></h1>
                    </div>
                </div>

            </div>
        </div>
    </div>