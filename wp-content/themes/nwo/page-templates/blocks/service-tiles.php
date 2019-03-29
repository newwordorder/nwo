<?php // FEATURE COLUMNS

if( get_row_layout() == 'services' ):

  $spaceBelow = get_sub_field('space_below');

  ?>

  <?php

  // check if the repeater field has rows of data
  if( have_rows('service_tile') ): ?>

  <?php $counter = 0;?>
    <div class="container space-below--<?php echo $spaceBelow ?>">

      <div class="row">

        <?php	// loop through the rows of data
        while ( have_rows('service_tile') ) : the_row();
        $targetBlank = get_sub_field('open_in_new_window');
        ?>

        <div class="col-md-4 col-sm-6 service-tile" data-aos="fadein" data-aos-delay="<?php echo $counter;?>00"">
            <div class="service-tile__body">

              <?php the_sub_field('text_box'); ?>

              <?php if (get_sub_field('button_text')): ?>

                <a class="service-tile__link" href="<?php the_sub_field('url'); ?>" <?php if($targetBlank == 'yes'): ?>target="_blank"<?php endif; ?>><?php the_sub_field('button_text'); ?><i class="fal fa-long-arrow-right"></i></a>

              <?php endif; ?>

            </div>


        </div>
        <?php $counter++; // add one per row ? ?>
      <?php  endwhile; ?>

    </div>
  </div>

<?php else :

  // no rows found

endif;

?>
<?php endif; ?>
