<?php
/**
* Template Name: Work
*
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

<header id="sub-header"

class="page-header page-header--work bg-effect--<?php echo $backgroundEffect ?> imagebg videobg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
data-overlay="<?php echo $imageOverlay ?>"
>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 text-center">

      <h1 class=""><?php the_title(); ?></h1>
      <p class="lead"><?php the_field('page_intro'); ?></p>

    </div>
  </div>
</div>



</header>

<?php get_template_part( 'page-templates/blocks' ); ?>

<script>
    
  var mixer = mixitup('.work-tiles');
    
</script>

    

<?php get_footer();
