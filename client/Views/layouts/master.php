<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?? 'LuxChill Shop' ?></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="<?= BASE_URL ?>public/assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="<?= BASE_URL ?>public/assets/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?= BASE_URL ?>public/assets/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?= BASE_URL ?>public/assets/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?= BASE_URL ?>public/assets/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?= BASE_URL ?>public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>public/assets/css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <!-- Home -->
    <link href="<?= BASE_URL ?>public/assets/css/home_1.css" rel="stylesheet">
    <!-- Shop -->
    <link href="<?= BASE_URL ?>public/assets/css/listing.css" rel="stylesheet">
    <!-- Detail Product -->
    <link href="<?= BASE_URL ?>public/assets/css/product_page.css" rel="stylesheet">
    <!-- Cart -->
    <link href="<?= BASE_URL ?>public/assets/css/cart.css" rel="stylesheet">
    <!-- Checkout -->
    <link href="<?= BASE_URL ?>public/assets/css/checkout.css" rel="stylesheet">
    <!-- Auth -->
    <link href="<?= BASE_URL ?>public/assets/css/account.css" rel="stylesheet">



    <!-- YOUR CUSTOM CSS -->
    <link href="<?= BASE_URL ?>public/assets/css/custom.css" rel="stylesheet">

    <!-- RemixIcon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" integrity="sha512-MqL4+Io386IOPMKKyplKII0pVW5e+kb+PI/I3N87G3fHIfrgNNsRpzIXEi+0MQC0sR9xZNqZqCYVcC61fL5+Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php
    $act = $GLOBALS['act'];
    ?>

    <div id="page">
        <header class="version_1">
            <?php require_once VIEW . 'layouts/header.php' ?>
        </header>

        <main class="<?= $act == 'confirm' ? 'bg_gray' : '' ?>">
            <?php require_once VIEW . $view . '.php' ?>
        </main>

        <footer class="revealed">
            <?php require_once VIEW . 'layouts/footer.php' ?>
        </footer>
    </div>

    <div id="toTop"></div> <!-- Button trở về đầu trang -->

    <!-- Thành phần html riêng -->
    <?php
    if (isset($components) && $components) {
        require_once VIEW . 'layouts/components/' . $components . '.php';
    }
    ?>

    <!-- scipt chung - global -->
    <script src="<?= BASE_URL ?>public/assets/js/common_scripts.min.js"></script>
    <script src="<?= BASE_URL ?>public/assets/js/main.js"></script>

    <!-- File js cụ thể -->
    <?php
    if (isset($script) && $script) {
        require_once VIEW . 'layouts/scripts/' . $script . '.php';
    }
    ?>

</body>

</html>