<script>
    const searchCheckOrder = () => {
        const inputValue = document.querySelector('.checking').value
        const url = `/duan1/?act=check-your-order&search=${inputValue}`
        window.location.href = url;
    }
</script>