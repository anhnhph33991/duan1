<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?> - Admin </title>

    <?php require_once VIEW_ADMIN . 'layouts/partials/css.php'; ?>

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <!-- Navbar-header -->
            <nav class="navbar navbar-expand-lg main-navbar">
                <?php require_once VIEW_ADMIN . 'layouts/partials/navbar.php'; ?>
            </nav>
            <!-- Navbar-left -->
            <div class="main-sidebar sidebar-style-2">
                <?php require_once VIEW_ADMIN . 'layouts/partials/nav_menu.php'; ?>
            </div>
            <!-- View -->
            <div class="main-content">
                <?php require_once VIEW_ADMIN . $view . '.php'; ?>
            </div>
            <footer class="main-footer">
                <?php require_once VIEW_ADMIN . 'layouts/partials/footer.php'; ?>
            </footer>
        </div>
    </div>


    <?php require_once VIEW_ADMIN . 'layouts/partials/script.php'; ?>

    <!-- Script Riêng -->
    <?php
    if (isset($script) && $script) {
        require_once VIEW_ADMIN . 'layouts/scripts/' . $script . '.php';
    }
    ?>

</body>


</html>