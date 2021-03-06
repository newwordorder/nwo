<?php  // VIDEO BLOCK

if (get_row_layout() == 'video') :

    $type = get_sub_field('video_type');
    $videoCoverImage = get_sub_field('video_cover_image');
    $videoEmbedCode = get_sub_field('video_embed_code');
    $text = get_sub_field('text');
    $width = get_sub_field('width');
    $spaceBelow = get_sub_field('space_below');

    ?>

<?php if ($type == 'inline') : ?>

<?php if ($width == 'full') : ?>

<div class="video-cover ">
    <div class="background-image-holder">
        <?php if (!empty($videoCoverImage)) :

            // vars
            $url = $videoCoverImage['url'];
            $alt = $videoCoverImage['alt'];

            ?>
        <img class="" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
        <?php endif; ?>
    </div>
    <div class="video-play-icon video-play-icon--sm"></div>
    <div class="embed-container ">
        <?php echo $videoEmbedCode; ?>
    </div>
</div>
<!--end video cover-->

<?php else : ?>


<div class="container space-below--<?php echo $spaceBelow ?>">
    <div class="row justify-content-center">
        <div class="col-md-<?php echo $width; ?>">

            <div class="video-cover ">
                <div class="background-image-holder ">
                    <?php if (!empty($videoCoverImage)) :
                        // vars
                        $url = $videoCoverImage['url'];
                        $alt = $videoCoverImage['alt'];
                        ?>
                    <img class="" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
                    <?php endif; ?>
                </div>
                <div class="video-play-icon video-play-icon--sm"></div>
                <div class="embed-container ">
                    <?php echo $videoEmbedCode; ?>
                </div>
            </div>
            <!--end video cover-->

        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
<?php if ($type == 'modal') : ?>
<div class="container video video-1 space-below--<?php echo $spaceBelow ?>"">
    <div class=" row">
    <div class="col-sm-12 modal-video" style="min-height:32rem;">
        <div class="background-image-holder">
            <?php if (!empty($videoCoverImage)) :

                // vars
                $url = $videoCoverImage['url'];
                $alt = $videoCoverImage['alt'];

                ?>
            <img class="" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
            <?php endif; ?>
        </div>
        <div class="modal-instance">
            <div class="video-play-icon video-play-icon--sm modal-trigger box-shadow"></div>
            <div class="modal-container">
                <div class="modal-content bg-dark" data-width="60%">
                    <div class="embed-container ">
                        <?php echo $videoEmbedCode; ?>
                    </div>
                </div>
                <!--end of modal-content-->
            </div>
            <!--end of modal-container-->
        </div>
        <!--end of modal instance-->
        <div class="modal-video__text">
            <?php echo $text; ?>
        </div>
    </div>
</div>
<!--end of row-->
</div>
<!--end of container-->
<?php endif; ?>
<?php endif; ?> 