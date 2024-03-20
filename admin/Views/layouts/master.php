<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?> - Admin </title>

    <!--  Fontawesome  -->
    <script src="https://kit.fontawesome.com/12ffb45aae.js" crossorigin="anonymous"></script>
    <!--  Remix Icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.min.css">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/fontawesome/css/all.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/chocolat/dist/css/chocolat.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/modules/codemirror/theme/duotone-dark.css">
    <!--   Template CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/components.css">


    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <!-- Navbar-header -->
            <nav class="navbar navbar-expand-lg main-navbar">
                <?php require_once VIEW_ADMIN . 'layouts/navbar.php'; ?>
            </nav>
            <!-- Navbar-left -->
            <div class="main-sidebar sidebar-style-2">
                <?php require_once VIEW_ADMIN . 'layouts/nav_menu.php'; ?>
            </div>
            <!-- View -->
            <div class="main-content">
                <?php require_once VIEW_ADMIN . $view . '.php'; ?>
            </div>
            <footer class="main-footer">
                <?php require_once VIEW_ADMIN . 'layouts/footer.php'; ?>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= BASE_URL ?>assets/modules/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/popper.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/tooltip.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/moment.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= BASE_URL ?>assets/modules/jquery.sparkline.min.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/chart.min.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/summernote/summernote-bs4.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/codemirror/lib/codemirror.js"></script>
    <script src="<?= BASE_URL ?>assets/modules/codemirror/mode/javascript/javascript.js"></script>

    <!-- Script Riêng -->
    <?php
    if (isset($script) && $script) {
        require_once VIEW_ADMIN . 'layouts/scripts/' . $script . '.php';
    }
    ?>
    <!-- Template JS File -->
    <script src="<?= BASE_URL ?>assets/js/scripts.js"></script>
    <script src="<?= BASE_URL ?>assets/js/custom.js"></script>

</body>


</html>