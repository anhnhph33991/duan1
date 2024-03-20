<?php if (isset($_COOKIE['message'])) : ?>
    <?php
    $typeMess = $_COOKIE['type_mess'] ?? '';
    ?>


    <script type="text/javascript">
        let mess = "<?= $_COOKIE['message'] ?? '' ?>";
        let toastType = "<?= $typeMess ?>"
        // toastr.success(mess);
        switch (toastType) {
            case 'error':
                toastr.error(mess);
                break;
            case 'success':
                toastr.success(mess);
                break;
            case 'info':
                toastr.info(mess);
                break;
        }
    </script>
<?php endif ?>