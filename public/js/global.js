// handle input search
const handleSearch = () => {
    const inputValue = document.querySelector('.input__search').value
    const slug = convertToSlug(inputValue);
    const url = `/duan1/?act=shop&search=${slug}`
    window.location.href = url;
}
// convert slug value
function convertToSlug(text) {
    return text
        .toLowerCase() // Chuyển tất cả sang chữ thường
        .normalize("NFD") // Chuyển unicode thành các ký tự tương đương không dấu
        .replace(/[\u0300-\u036f]/g, "") // Loại bỏ các ký tự có dấu
        .replace(/[^a-z0-9 ]/g, "") // Loại bỏ các ký tự không phải chữ cái hoặc số hoặc khoảng trắng
        .replace(/\s+/g, "-"); // Thay thế khoảng trắng bằng dấu gạch ngang
}

