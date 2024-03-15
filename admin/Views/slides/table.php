<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="section-header-button">
            <a href="<?= BASE_URL_ADMIN . '?act=create-slides' ?>" class="btn btn-primary">Add Slide</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN . '?act=slides' ?>">Slide</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <?php

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        ?>
        <h2 class="section-title">Table</h2>
        <p class="section-lead">Hiển Thị Slide</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Slide Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Url</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($data as $key => $value) :  ?>
                                        <?php
                                        // class change status color
                                        // $checkStyleStatus = $value['p_status'] == 'public' ? 'badge-primary' : 'badge-warning';
                                        // echo "<pre>";
                                        // print_r($value);
                                        // echo "</pre>";

                                        ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td>
                                                <div class="gallery">
                                                    <div class="gallery-item" data-image="data:image/jpeg;base64,<?= $value['url'] ?>" data-title="<?= $value['id'] ?>"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <?= $value['type'] ?>
                                            </td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN ?>?act=show-product&id=<?= $value['id'] ?>" class="btn btn-secondary"><i class="fa-regular fa-eye"></i></a>
                                                <a href="<?= BASE_URL_ADMIN ?>?act=update-slides&id=<?= $value['id'] ?>" class="btn btn-warning">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN ?>?act=delete-slides&id=<?= $value['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa slide: <?= $value['id'] ?>')">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach;  ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=slides&page=<?= ($page > 1) ? ($page - 1) : 1 ?>" tabindex="-1">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                    <li class="page-item  <?= $i == $page ? 'active' : ''  ?>">
                                        <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=slides&page=<?= $i ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>?act=slides&page=<?= ($page == $total_pages) ? $page : ($page + 1) ?>"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>