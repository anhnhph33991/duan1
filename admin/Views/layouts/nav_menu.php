<?php

$menuAdmin = [
    // [
    // 	'id' => 1,
    // 	'name' => 'Dashboard',
    // 	'act' => '/',
    // 	'url' => BASE_URL_ADMIN,
    // 	'icon' => '<i class="far fa-square"></i>'
    // ],
    [
        'id' => 2,
        'name' => 'Products',
        'act' => ['products', 'add-product', 'show-product', 'update-product'],
        'url' => BASE_URL_ADMIN . '?act=products',
        'icon' => '<i class="far fa-square"></i>'
    ],
    [
        'id' => 3,
        'name' => 'Categorys',
        'act' => ['categorys', 'add-category', 'show-category', 'update-category'],
        'url' => BASE_URL_ADMIN . '?act=categorys',
        'icon' => '<i class="far fa-square"></i>'
    ],
    [
        'id' => 4,
        'name' => 'Users',
        'act' => ['users', 'add-user', 'show-user', 'update-user'],
        'url' => BASE_URL_ADMIN . '?act=users',
        'icon' => '<i class="far fa-square"></i>'
    ],
    [
        'id' => 5,
        'name' => 'Comments',
        'act' => ['comments', 'add-comment', 'show-comment', 'update-comment'],
        'url' => BASE_URL_ADMIN . '?act=comments',
        'icon' => '<i class="far fa-square"></i>'
    ],
    [
        'id' => 6,
        'name' => 'Orders',
        'act' => ['orders', 'show-order', 'update-order'],
        'url' => BASE_URL_ADMIN . '?act=orders',
        'icon' => '<i class="far fa-square"></i>'
    ],
    [
        'id' => 7,
        'name' => 'Vouchers',
        'act' => ['vouchers', 'add-voucher', 'show-voucher', 'update-voucher'],
        'url' => BASE_URL_ADMIN . '?act=vouchers',
        'icon' => '<i class="far fa-square"></i>'
    ],
    [
        'id' => 8,
        'name' => 'Slides',
        'act' => ['slides', 'create-slides', 'update-slides', 'delete-slides'],
        'url' => BASE_URL_ADMIN . '?act=slides',
        'icon' => '<i class="far fa-square"></i>'
    ]
];

?>

<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">LUXCHILL</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">LUX</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="<?= ($GLOBALS['act'] == '/') ? 'active' : '' ?>">
            <a href="<?= BASE_URL_ADMIN ?>" class="nav-link ">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-header">Managers</li>
        <?php foreach ($menuAdmin as $key => $value) : ?>
            <?php $isActive = is_array($value['act']) ? in_array($GLOBALS['act'], $value['act']) : ($GLOBALS['act'] == $value['act']);   ?>
            <li class="<?= $isActive ? 'active' : '' ?>">
                <a class="nav-link" href="<?= $value['url'] ?>">
                    <?= $value['icon'] ?>
                    <span><?= $value['name'] ?></span>
                </a>
            </li>
        <?php endforeach; ?>

        <!--        <li class="dropdown">-->
        <!--            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>-->
        <!--                <span>Layout</span></a>-->
        <!--            <ul class="dropdown-menu">-->
        <!--                <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>-->
        <!--            </ul>-->
        <!--        </li>-->
    </ul>

</aside>