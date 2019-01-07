<?php // FEATURE COLUMNS

if( get_row_layout() == 'people' ):

  $spaceBelow = get_sub_field('space_below');
  
  ?>

  <?php $posts = get_sub_field('people');



  if( $posts ): ?>

<div class="container">
  <div class="row">
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
      <?php setup_postdata($post); ?>
        <div class="col-lg-3 col-md-4 col-6">
          <div class="people-tile">
            <a class="people-tile__link" href="<?php the_permalink(); ?>"></a>

            <?php $image = get_field('profile_photo');
              if( !empty($image) ):

                // vars
                $url = $image['url'];
                $alt = $image['alt'];

                $size = '600x600';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ];

                ?>
                <a href="<?php the_permalink(); ?>">
                <div class="media-1 imagebg avatar">
                  <div class="background-image-holder">
                    <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                  </div>
                </div>
                </a>
            <?php endif; ?>
            <h5 class="mb-0"><?php the_title(); ?></h5>
            <?php if(get_field('title')): ?>
              <p ><?php the_field('title'); ?></p>
            <?php endif; ?>
            </div>
        </div>

      <?php endforeach; ?>
  
  </div>
</div>
    
    
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>


<?php endif; ?>
