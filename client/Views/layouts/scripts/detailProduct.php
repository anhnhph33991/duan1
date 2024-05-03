<script src="<?= BASE_URL ?>public/assets/js/carousel_with_thumbs.js"></script>

<script>
    const modal = document.querySelector('.modal__detailProduct');

    function handleAddToCart(id, name, price, image, description, type, cName) {

        const numericPrice = typeof price === 'string' ? parseFloat(price) : price;

        // Format the price to Vietnamese dong format
        const formattedPrice = numericPrice.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });

        let idUser = "<?php echo isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>";




        const data = {
            idProduct: id,
            nameProduct: name,
            priceProduct: price,
            imageProduct: image,
            descriptionProduct: description,
            typeProduct: type,
            cName: cName,
            idUser: idUser
        }

        let baseUrl = "<?= BASE_URL ?>";

        // console.log(data);


        let renderProduct = `
                <div class="col-md-7">
            <div class="item_panel">
                <figure>
                    <img src="${baseUrl}${image}" data-src="${baseUrl}${image}" class="lazy" alt="">
                </figure>
                <h4>${name}</h4>
                <div class="price_panel"><span class="new_price">${formattedPrice}</span><span class="percentage">-20%</span> <span class="old_price">$160.00</span></div>
            </div>
        </div>
        <div class="col-md-5 btn_panel">
            <a href="${baseUrl}?act=cart" class="btn_1 outline">View cart</a> <a href="${baseUrl}?act=checkout" class="btn_1">Checkout</a>
        </div>
                `;

        modal.innerHTML = `${renderProduct}`;

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL . '?act=handleAddToCart' ?>",
            data: {
                idProduct: id,
                nameProduct: name,
                priceProduct: price,
                imageProduct: image,
                descriptionProduct: description,
                typeProduct: type,
                cName: cName,
                idUser: idUser
            },
            success: function(res) {
                $('.qty_cart').text(res.cartItemCount);
                toastr.success('Thêm vào giỏ hàng thành công 🛒');
            },
            error: function(xhr, status, error) {
                toastr.error('Có lỗi xảy ra. Vui lòng thử lại sau!');
            }
        })
    }
</script>