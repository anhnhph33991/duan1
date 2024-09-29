// handle input search
const handleSearch = () => {
  const inputValue = document.querySelector(".input__search").value;
  const slug = convertToSlug(inputValue);
  const url = `/duan1/?act=shop&search=${slug}`;
  window.location.href = url;
};
// convert slug value
const convertToSlug = (text) => {
  return text
    .toLowerCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[^a-z0-9 ]/g, "")
    .replace(/\s+/g, "-");
};

// sweetalert2
const showAlert = (icon = null, message = null, title = null) => {
  Swal.fire({
    title: `${title ?? ""}`,
    text: `${message}`,
    icon: `${icon}`,
  });
};

const showAlertConfirm = (callback) => {
  Swal.fire({
    title: "Bạn có chắc không?",
    text: "Sau khi xóa sẽ chuyển vào thùng rác 30d!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Xác Nhận",
    cancelButtonText: "Hủy",
  }).then((result) => {
    if (result.isConfirmed) {
      callback();
    }
  });
};
