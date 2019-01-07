<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

<section

class="featured-post bg--dark" >


<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 text-center">

      <h1>Neology</h1>

    </div>
  </div>
</div>



</section>

<section

class="page-header page-header--blog"
>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 text-center">

      <h1 class="">Neology</h1>

    </div>
  </div>
</div>



</section>
<div class="wrapper blog-feed" id="index-wrapper">

	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-8 text-center">

				<?php
				$categories = get_categories( array(
						'orderby' => 'name',
						'order'   => 'ASC'
				) );
				echo '<ul class="blog-categories">';
				foreach( $categories as $category ) {
						$category_link = sprintf( 
								'<a class="blog-categories__link" href="%1$s" alt="%2$s">%3$s</a>',
								esc_url( get_category_link( $category->term_id ) ),
								esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
								esc_html( $category->name )
						);

						echo '<li>' . sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) . '</li> ';
						
				} 
				echo '</ul>';
				?>

			</div>
		</div>
	</div>

	<div class="container" id="content" tabindex="-1">




				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<div id="posts_row" class="row">

					<?php while ( have_posts() ) : the_post(); ?>
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

					<?php endwhile; ?>

					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>




			<!-- The pagination component -->
			<div class="row justify-content-center mt-4 p-4">
			<?php global $wp_query; // you can remove this line if everything works for you
			
			// don't display the button if there are not enough posts
			if (  $wp_query->max_num_pages > 1 )
				echo '<div class="btn btn--outline loadmore m-auto">More posts</div>'; 
			?>
		
</div>
</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
