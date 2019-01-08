<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$backgroundImage = get_field('background_image');

$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];
$invertColours = $backgroundImage['invert_colours'];
?>
<?php while ( have_posts() ) : the_post(); ?>
<section id="sub-header"

class="page-header page-header--work bg-effect--<?php echo $backgroundEffect ?> imagebg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
data-overlay="<?php echo $imageOverlay ?>"
>

<?php

if( !empty($image) ):

  // vars
  $url = $image['url'];
  $alt = $image['alt'];

  ?>
  <div class="background-image-holder">
    <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
  </div>
<?php endif; ?>

<div class="container ">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 text-center">
<p class="h6 mb-4">
									<?php 
										foreach((get_the_category()) as $category){
											echo $category->name;
											}
										?>
									</p>	
      <h1 class="page-title mb-4"><?php the_title(); ?></h1>
      
<?php if(get_field('page_intro')): ?>
        <p class="lead"><?php the_field('page_intro'); ?></p>
      <?php endif; ?>

    </div>
  </div>
</div>



</section>

<section id="single-wrapper" class="page-content">

	<div class="container" id="content" tabindex="-1">



			<main id="main">



					<?php 

          // check if the flexible content field has rows of data
          if( have_rows('posts_blocks') ):

            // loop through the rows of data
            while ( have_rows('posts_blocks') ) : the_row();



            if( get_row_layout() == 'text_block' ): ?>

            <div class="row justify-content-center">
              <div class="col-md-8">

                <?php  the_sub_field('text_block'); ?>

              </div>
            </div>

          <?php  endif;


            endwhile;

          endif;

          ?>
<div class="row justify-content-center">
              <div class="col-md-8">
          <?php the_content(); ?>
 </div>
            </div>




			</main><!-- #main -->




</div><!-- Container end -->

</section><!-- Wrapper end -->

<?php
           // the query
           $the_query = new WP_Query( array(
             'category__in' => wp_get_post_categories( $post->ID ), 
              'posts_per_page' => 3,
              'post__not_in' => array( $post->ID ) 
           ));
        ?>

			<?php if ( $the_query->have_posts() ) : ?>

<section class="related-posts space--lg">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h4>Related posts</h4>
      </div>
    </div>
    <div class="row justify-content-center">
    
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-sm-4">
						

							<article class="blog-tile">
							<a href="<?php the_permalink(); ?>" class="blog-tile__link"></a>
								<div class="blog-tile__thumb">
									<?php
									$workImage = get_field('background_image_background_image');

									if( !empty($workImage) ):

										// vars
										$url = $workImage['url'];
										$alt = $workImage['alt'];

										$size = '600x400';
										$thumb = $workImage['sizes'][ $size ];
										$width = $workImage['sizes'][ $size . '-width' ];
										$height = $workImage['sizes'][ $size . '-height' ];

										?>
										<div class="background-image-holder ">
											<img class="rounded" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
										</div>
									<?php endif; ?>
								</div>
								<div class="blog-tile__content">
									<h5><?php the_title(); ?></h5>
									<span class="blog-tile__category">
									<?php 
										foreach((get_the_category()) as $category){
											echo $category->name;
											}
										?>
									</span>	
								</div>
							</article>


										</div>

			<?php endwhile;

          // reset post data
          wp_reset_postdata();

      ?>
  </div>

</div>
</section>


    <?php endif; ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
