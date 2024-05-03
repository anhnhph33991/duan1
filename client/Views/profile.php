<?php


if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo "<pre>";
    print_r($user);
    echo "</pre>";
}


if (isset($_SESSION['user'])) {
    echo '';
} else {
    header('location: ' . BASE_URL . '?act=login');
}

?>

<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Active</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
    </li>
</ul>

<h1>Name <span class="text-info"><?= $_SESSION['user']['username'] ?></span></h1>

<h1>Image User</h1>
<img src="<?= BASE_URL . $_SESSION['user']['image'] ?>" alt="" style="width: 500px; height: 500px;">

<br>