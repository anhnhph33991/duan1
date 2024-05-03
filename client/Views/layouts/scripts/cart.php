<!-- <script>
    const plusButton = document.querySelectorAll('.plus__button');
    const dashButton = document.querySelectorAll('.dash__button');
    const subTotal = document.querySelectorAll(`.subTotal`);
    const idUser = "<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>";

    plusButton.forEach((btn) => {
        btn.addEventListener('click', () => {
            // lấy ra id của product
            const productId = btn.getAttribute('data-product-id');
            // console.log(productId);
            // lấy ra value của input
            const inputQty = document.querySelector(`.qtyInput-${productId}`);
            // lấy ra giá tiền
            const priceProduct = document.querySelector(`.priceProduct-${productId}`);
            const priceOneProduct = parseInt(priceProduct.getAttribute('data-price'))

            // subToal
            const priceSubTotal = document.querySelector(`.subTotal-${productId}`);



            // console.log(priceOneProduct);



            // console.log(inputQty.value);
            // console.log(inputQty.value = +inputQty.value + 1);

            $.ajax({
                type: "POST",
                url: "<?= BASE_URL . '?act=updateCart' ?>",
                data: {
                    inputQty: +inputQty.value + 1,
                    productId: productId,
                    productPrice: priceOneProduct,
                    idUser: idUser,
                },
                success: function(res) {
                    // $('.qty_cart').text(res.title);
                    console.log(res.title);
                    console.log(res.qtyValue);
                    inputQty.value = res.qtyValue;
                    // console.log(res.productId);
                    console.log(res.productPrice);
                    const priceFormat = res.productPrice.toLocaleString('vi-VN');
                    priceSubTotal.innerHTML = `${priceFormat}đ`;

                    console.log(`id user ${res.idUser}`);
                    toastr.success('Thay đổi số lượng thành công');
                },
                error: function(xhr, status, error) {
                    toastr.error('Có lỗi xảy ra. Vui lòng thử lại sau!');
                }
            })

        })
    })

    dashButton.forEach((btn) => {
        btn.addEventListener('click', () => {
            // lấy ra id của product
            const productId = btn.getAttribute('data-product-id');
            // console.log(productId);
            // lấy ra value của input
            const inputQty = document.querySelector(`.qtyInput-${productId}`);
            // lấy ra giá tiền
            const priceProduct = document.querySelector(`.priceProduct-${productId}`);
            const priceOneProduct = parseInt(priceProduct.getAttribute('data-price'))

            // subToal
            const priceSubTotal = document.querySelector(`.subTotal-${productId}`);



            // console.log(priceOneProduct);



            // console.log(inputQty.value);
            // console.log(inputQty.value = +inputQty.value + 1);

            $.ajax({
                type: "POST",
                url: "<?= BASE_URL . '?act=updateCart' ?>",
                data: {
                    inputQty: +inputQty.value - 1,
                    productId: productId,
                    productPrice: priceOneProduct,
                    idUser: idUser,
                },
                success: function(res) {
                    // $('.qty_cart').text(res.title);
                    console.log(res.title);
                    console.log(res.qtyValue);
                    inputQty.value = res.qtyValue;
                    // console.log(res.productId);
                    console.log(res.productPrice);
                    const priceFormat = res.productPrice.toLocaleString('vi-VN');
                    priceSubTotal.innerHTML = `${priceFormat}đ`;
                    toastr.success('Thay đổi số lượng thành công');
                },
                error: function(xhr, status, error) {
                    toastr.error('Có lỗi xảy ra. Vui lòng thử lại sau!');
                }
            })

        })
    })

    // subTotal.forEach((sub) => {
    //     const productId = sub.getAttribute('data-product-id');
    // })
</script> -->


<script>
    const plusButtons = document.querySelectorAll('.plus__button');
    const dashButtons = document.querySelectorAll('.dash__button');
    // const subTotal = document.querySelectorAll(`.subTotal`);
    const idUser = "<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>";
    const sumPriceCart = document.querySelector('.sumPriceCart');

    function handleQtyChange(btn, changeCount) {
        const productId = btn.getAttribute('data-product-id');
        const inputQty = document.querySelector(`.qtyInput-${productId}`);
        const priceProduct = document.querySelector(`.priceProduct-${productId}`);
        const priceOneProduct = parseInt(priceProduct.getAttribute('data-price'));
        const priceSubTotal = document.querySelector(`.subTotal-${productId}`);

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL . '?act=updateCart' ?>",
            data: {
                inputQty: +inputQty.value + changeCount,
                productId: productId,
                productPrice: priceOneProduct,
                idUser: idUser,
            },
            success: function(res) {
                inputQty.value = res.qtyValue;
                const priceFormat = res.productPrice.toLocaleString('vi-VN');
                priceSubTotal.innerHTML = `${priceFormat}đ`;

                toastr.success('Thay đổi số lượng thành công');
                // Thay đổi số lượng giá tiền tổng
                const allPriceSubTotal = document.querySelectorAll('#priceSubTotal');
                let totalPrice = 0;

                allPriceSubTotal.forEach((el) => {
                    const price = parseInt(el.innerHTML.replace(/\D/g, ''));
                    // console.log(price);
                    totalPrice += price;
                })
                sumPriceCart.innerHTML = `${totalPrice.toLocaleString('vi-VN')}Đ`
            },
            error: function(xhr, status, error) {
                toastr.error('Có lỗi xảy ra. Vui lòng thử lại sau!');
            }
        })

    }

    plusButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            handleQtyChange(btn, 1); // Gọi hàm xử lý với changeAmount là 1 (tăng số lượng)
        });
    });

    dashButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const productId = btn.getAttribute('data-product-id');
            const inputQty = document.querySelector(`.qtyInput-${productId}`);
            let currentQty = parseInt(inputQty.value);

            if (currentQty === 1) {
                toastr.warning('Xóa đi. Giảm gì lắm thế 🤬🤬');
                return;
            }


            handleQtyChange(btn, -1); // Gọi hàm xử lý với changeAmount là -1 (giảm số lượng)
        });
    });
</script>