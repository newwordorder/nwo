<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>


<div class="wrapper blog-feed" id="index-wrapper">


	<div class="container" id="content" tabindex="-1">




				<?php $custom_query = new WP_Query( 
    array(
        'post_type' => 'projects', 
        'posts_per_page' => -1
    ) 
);
if ( $custom_query->have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<div id="posts_row" class="row">

					<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
						<div class="col-sm-4">
						

							<article class="blog-tile">
							<a href="<?php the_permalink(); ?>" class="blog-tile__link"></a>
								<div class="blog-tile__thumb">
									<?php
									$workImage = get_field('tile_image');

									if( !empty($workImage) ):

										// vars
										$url = $workImage['url'];
										$alt = $workImage['alt'];

										$size = '600x400';
										$thumb = $workImage['sizes'][ $size ];
										$width = $workImage['sizes'][ $size . '-width' ];
										$height = $workImage['sizes'][ $size . '-height' ];

										?>
										<div class="background-image-holder " style="background-image: url("<?php echo $thumb; ?>")">
											<img class="rounded" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
										</div>
									<?php endif; ?>
								</div>
								<div class="blog-tile__content">
                  
                  <h5><?php the_title(); ?></h5>
                    <?php if (get_field('client')) : ?>
                      <span class="blog-tile__category">
                    <?php the_field('client'); ?>
                    </span>	
                  <?php endif; ?>
									
									
									
								</div>
							</article>


										</div>

					<?php endwhile; ?>

					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>



		
</div>
</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

