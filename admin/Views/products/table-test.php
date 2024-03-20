<div class="section">
    <div class="section-body">
        <?php

        echo "<pre>";
        print_r($data);
        echo "</pre>";


        ?>

        <a href="<?= BASE_URL_ADMIN ?>?act=upload-image" class="btn btn-info">Create</a>


        <hr>
        <?php foreach ($data as $key => $value) :   ?>
            <div style="border: 1px solid black;">
                <h1><?= $value['id'] ?></h1>
                <img src="<?= BASE_URL . $value['image'] ?>" alt="" style="width: 500px; height: 500px;">


                <a href="<?= BASE_URL_ADMIN ?>?act=delete-image&id=<?= $value['id'] ?>" class="btn btn-info">Delete</a>
            </div>
        <?php endforeach ?>

    </div>
</div>