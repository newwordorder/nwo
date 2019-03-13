<?php  // IMAGE BLOCK

if (get_row_layout() == 'image') :

  $image = get_sub_field('image');
  $width = get_sub_field('width');
  $spaceBelow = get_sub_field('space_below');

  ?>

<?php if ($width == 'full') : ?>

<?php

if (!empty($image)) :

  // vars
  $url = $image['url'];
  $alt = $image['alt'];

  ?>
<div class="img-box">
    <img class="" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
</div>
<?php endif; ?>

<?php else : ?>


<div class="container space-below--<?php echo $spaceBelow ?>">
    <div class="row justify-content-center">
        <div class="col-md-<?php echo $width; ?>">

            <?php

            if (!empty($image)) :

              // vars
              $url = $image['url'];
              $alt = $image['alt'];

              ?>
            <img class="" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
            <?php endif; ?>

        </div>
    </div>
</div>

<?php endif; ?>

<?php endif;

?> 