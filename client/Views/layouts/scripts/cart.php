<script>
    const plus__button = document.querySelectorAll('.plus__button');
    const dash__button = document.querySelectorAll('.dash__button');


    plus__button.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            const input = document.querySelector(`.qtyInput-${index}`);

            input.value = +input.value + 1;
        })
    })


    dash__button.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            console.log(`remive ${index}`);
        })
    })



    // console.log('success');
</script>