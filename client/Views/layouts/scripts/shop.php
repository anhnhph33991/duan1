<script src="<?= BASE_URL ?>public/assets/js/sticky_sidebar.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/specific_listing.js"></script>

<script>
    const filterButton = document.querySelector('.filter__button');
    const resetButton = document.querySelector('.reset__button');
    let checkboxes = document.querySelectorAll('.category_checkbox');

    let btn_addToCart = document.querySelectorAll('.btn__addToCart');


    filterButton.addEventListener('click', (event) => {
        event.preventDefault();


        var selectedCategories = Array.from(checkboxes).filter(function(checkbox) {
            return checkbox.checked;
        }).map(function(checkbox) {
            return checkbox.value;
        });

        var categoryParam = selectedCategories.length > 0 ? 'category=' + selectedCategories.join(',') : '';
        var url = 'http://localhost/duan1/?act=shop';

        if (categoryParam !== '') {
            url += '&' + categoryParam;
        }

        window.location.href = url;

    })

    // btn_addToCart.forEach((btn) => {
    //     btn.addEventListener('click', (e) => {
    //         e.preventDefault();
    //         console.log('success add cart');
    //     })
    // })

    function addToCart(e, id, name, price, image, description, type, cName) {
        e.preventDefault();
        console.log('success');
        let data = {
            idProduct: id,
            nameProduct: name,
            priceProduct: price,
            imageProduct: image,
            descriptionProduct: description,
            typeProduct: type,
            nameCategory: cName
        };

        console.log(data);

    }
</script>