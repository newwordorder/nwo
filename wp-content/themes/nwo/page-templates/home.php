<?php
/**
* Template Name: Home
*
*
* @package understrap
*/

get_header();


?>

<section id="sub-header"

class="page-header--home p-0"
>


    <?php $slides = get_field('texts'); ?>
      <div class='slider'>
        <div class="slide__container">
        <?php while( have_rows('texts') ): the_row();
          $text = get_sub_field('text');
        ?>
          <div class="slide">
            <?php echo $text; ?>
          </div>
          <? endwhile; ?>
        </div>
      </div>
      <div class="ctrls">
        <div class="previous control"><i class="fal fa-long-arrow-left"></i></div>
        <div class="next control"><i class="fal fa-long-arrow-right"></i>
        </div>
      </div>
      <div class="line"></div>
    <div class="right-tile">
      <div class="tile tile--1">
      <?php $posts = get_field('featured_post'); if( $posts ): ?>

        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

        <?php setup_postdata($post); ?>
            <div class="project-thumb  hover-element" >
              <a href="<?php the_permalink(); ?>">
                <div class="hover-element__initial">
                  <?php
                  $workImage = get_field('background_image');

                  if( !empty($workImage) ):

                    // vars
                    $url = $workImage['background_image'];
                    $alt = $workImage['alt'];
                    ?>
                    <div class="background-image-holder">
                      <img src="<?php echo $url['url']; ?>" alt="<?php echo $alt; ?>"/>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="project-thumb__title">
                  <h6><?php the_field('client'); ?></h6>
                  <h4><?php the_title(); ?></h4>
                  <p class="lead"><?php the_field('one_liner'); ?></span>
                  </div>
                  <div class="hover-element__reveal" data-overlay="9">

                  </div>
                </a>
                </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
          <?php endif; ?>
      </div>
      <div class="tile tile--2">
      <?php $posts = get_field('featured_project'); if( $posts ): ?>

        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

        <?php setup_postdata($post); ?>


          <div class="project-thumb  hover-element">
            <a href="<?php the_permalink(); ?>">
              <div class="hover-element__initial">
                <?php
                $workImage3 = get_field('feature_image');

                if( !empty($workImage3) ):

                  // vars
                  $url3 = $workImage3['url'];
                  $alt3 = $workImage3['alt'];

                  ?>
                  <div class="background-image-holder">
                    <img src="<?php echo $url3; ?>" alt="<?php echo $alt3; ?>"/>
                  </div>
                <?php endif; ?>
              </div>
              <div class="project-thumb__title">
                <h6><?php the_field('client'); ?></h6>
                <h4><?php the_title(); ?></h4>
                <p class="lead"><?php the_field('one_liner'); ?></span>
                </div>
                <div class="hover-element__reveal" data-overlay="9">

                </div>
              </a>
              </div>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
      </div>
      <div class="btn tile-btn"><a href="#">Contact</a></div>

    </div>



</section>

<?php get_template_part( 'page-templates/blocks' ); ?>

<script>
  var displacement = [
    '<?php bloginfo('template_directory'); ?>' + '/img/20.jpg',
  ];

  <?php $images = get_field('images'); 
    $imageArray = array();
  ?>
    <?php while( have_rows('images') ): the_row();
      $image = get_sub_field('image');
      array_push($imageArray, $image['url']);
    ?>
    <?php  endwhile; ?>
  var images = <?php echo json_encode($imageArray); ?>;
  
  var assets = [
    '<?php bloginfo('template_directory'); ?>' + '/img/Asset2-80.jpg',
    '<?php bloginfo('template_directory'); ?>' + '/img/Asset3-80.jpg',
    '<?php bloginfo('template_directory'); ?>' + '/img/Asset4-80.jpg',
    '<?php bloginfo('template_directory'); ?>' + '/img/Asset5-80.jpg',
  ]
var slide1 = new sliderEffect({
    parent: document.querySelector('.slider'),
    intensity: 0.2,
    images: images,
    displacements: displacement,
    slides: document.querySelectorAll('.slide'),
    hover: false,
    line: document.querySelector('.line')
});

document.querySelector('.next').addEventListener('click', slide1.next);
document.querySelector('.previous').addEventListener('click', slide1.previous);
</script>

<?php get_footer();
