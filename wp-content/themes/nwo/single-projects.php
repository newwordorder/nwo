<?php
/**
* Template Name: Single Projects
*
*
* @package understrap
*/

get_header();


$image = get_field('background_image');
$imageOverlay = get_field('image_overlay');

$backgroundImage = get_field('background_image');

$image = get_field('feature_image');

?>

<header id="sub-header" class="project__header">


  

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <h6><?php the_field('client'); ?></h6>
      <h1><?php the_title(); ?></h1>
      <p class="lead"><?php the_field('one_liner'); ?></p>

    </div>
  </div>
</div>



</header>
<?php if( !empty($image) ):

    // vars
    $url = $image['url'];
    $alt = $image['alt'];

  ?>
      <img class="project__feature-image" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
  <?php endif; ?>
<main class="project__content">

  <?php get_template_part( 'page-templates/blocks' ); ?>

</main>


<?php get_footer();
