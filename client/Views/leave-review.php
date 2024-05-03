<div class="container margin_60_35">

    <div class="row justify-content-center">
        <form action="" method="post" class="col-lg-8">
            <div class="write_review">
                <h1>Write a review for <b class="text-warning"><?= $product['p_name'] ?></b></h1>
                <?php

                // echo "<pre>";
                // print_r($product);
                // echo "</pre>";


                ?>
                <div class="rating_submit">
                    <div class="form-group">
                        <label class="d-block">Overall rating</label>
                        <span class="rating mb-0">
                            <input type="radio" class="rating-input" id="5_star" name="rating-input" value="5 Stars"><label for="5_star" class="rating-star"></label>
                            <input type="radio" class="rating-input" id="4_star" name="rating-input" value="4 Stars"><label for="4_star" class="rating-star"></label>
                            <input type="radio" class="rating-input" id="3_star" name="rating-input" value="3 Stars"><label for="3_star" class="rating-star"></label>
                            <input type="radio" class="rating-input" id="2_star" name="rating-input" value="2 Stars"><label for="2_star" class="rating-star"></label>
                            <input type="radio" class="rating-input" id="1_star" name="rating-input" value="1 Star"><label for="1_star" class="rating-star"></label>
                        </span>
                    </div>
                </div>
                <!-- /rating_submit -->
                <!-- <div class="form-group">
                    <label>Title of your review</label>
                    <input class="form-control" type="text" placeholder="If you could say it in one sentence, what would you say?">
                </div> -->

                <!-- Id Product -->
                <input type="text" value="<?= $product['p_id'] ?>" name="idProduct" class="d-none">
                <!-- Id User -->
                <input type="text" value="<?= $_SESSION['user']['id'] ?>" name="idUser" class="d-none">

                <div class="form-group">
                    <label>Your review</label>
                    <textarea class="form-control" style="height: 180px;" placeholder="Write your review to help others learn about this online business" name="content"></textarea>
                    <div style="color: #dc3545; font-size: 80%; margin-top: 0.25rem; width: 100%;">
                        <?= !empty($_SESSION['error']['content']) ? $_SESSION['error']['content'] : '' ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Add your photo (optional)</label>
                    <div class="fileupload"><input type="file" name="fileupload" accept="image/*"></div>
                </div>
                <!-- <a href="confirm.html" class="btn_1">Submit review</a> -->
                <button class="btn_1" type="submit" name="submit">Submit review</button>
            </div>
        </form>
    </div>
    <!-- /row -->
</div>