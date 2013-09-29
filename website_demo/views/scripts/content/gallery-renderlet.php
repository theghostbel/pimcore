
<section>

    <?php if($this->asset) { ?>
        <div class="row">
            <?php
                $children = $this->asset->getChilds();
                $count = 0;
                $totalCount = count($children);
                foreach ($children as $image) { ?>

                    <?php if($image instanceof Asset_Image) { ?>
                        <div class="col-md-3 col-xs-6">
                            <a href="<?php echo $image->getThumbnail("galleryLightbox"); ?>" class="thumbnail">
                                <img src="<?php echo $image->getThumbnail("galleryThumbnail"); ?>">
                            </a>
                        </div>
                    <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>

</section>