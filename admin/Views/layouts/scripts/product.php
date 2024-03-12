<script src="<?= BASE_URL ?>assets/js/page/features-post-create.js"></script>

<script>
    function formatPrice(input) {
        // Lấy giá trị từ input
        let price = input.value;

        // Xóa bỏ các dấu chấm hiện tại
        price = price.replace(/\./g, '');

        // Định dạng lại giá trị với dấu chấm sau mỗi 3 số
        price = price.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        // Cập nhật giá trị vào input
        input.value = price;
    }
</script>