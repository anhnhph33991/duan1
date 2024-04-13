<script src="<?= BASE_URL ?>public/assets/js/sticky_sidebar.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/specific_listing.js"></script>

<script>
    const filterButton = document.querySelector('.filter__button');
    const resetButton = document.querySelector('.reset__button');
    let checkboxes = document.querySelectorAll('.category_checkbox');

    let btn_addToCart = document.querySelectorAll('.btn__addToCart');


    filterButton.addEventListener('click', (event) => {
        event.preventDefault();


        let selectedCategories = Array.from(checkboxes).filter(function(checkbox) {
            return checkbox.checked;
        }).map(function(checkbox) {
            return checkbox.value;
        });

        let categoryParam = selectedCategories.length > 0 ? 'category=' + selectedCategories.join(',') : '';
        let url = 'http://localhost/duan1/?act=shop';

        if (categoryParam !== '') {
            url += '&' + categoryParam;
        }

        window.location.href = url;

    })

    function addToCart(e, id, name, price, image, description, type, cName) {
        e.preventDefault();
        let idUser = "<?php echo isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>";
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
                // console.log(res.cartItem);
                console.log(`Số lượng sản phẩm trong giỏ hàng: ${res.cartItemCount}`);
                console.log(res.countIdUser);
                console.log(res.countProduct);
                // console.log(res.successmess);
                // console.log(res.id);
                // console.log(res.checkProductAut);
                toastr.success('Thêm vào giỏ hàng thành công 🛒');
            },
            error: function(xhr, status, error) {
                toastr.error('Có lỗi xảy ra. Vui lòng thử lại sau!');
                console.log(error);
            }
        })

    }
</script>