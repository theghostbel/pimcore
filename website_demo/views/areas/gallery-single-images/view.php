<section class="area-gallery-single-images">

    <?php $this->template("/includes/area-headlines.php"); ?>

    <div class="row">
        <?php
        $block = $this->block("gallery");

        while ($block->loop()) { ?>
            <div class="col-md-3 col-xs-6">
                <a href="<?php echo $this->image("image")->getThumbnail("galleryLightbox"); ?>" class="thumbnail">
                    <?php echo $this->image("image", array(
                        "thumbnail" => "galleryThumbnail",
                        "width" => 140
                    )); ?>
                </a>
            </div>
        <?php } ?>
    </div>

</section>

