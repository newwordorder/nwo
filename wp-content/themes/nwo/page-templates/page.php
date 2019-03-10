<?php
/**
* Template Name: Page
*
*
* @package understrap
*/

get_header();

$headerType = get_field('image_or_video');

$image = get_field('background_image');
$imageOverlay = get_field('image_overlay');

$backgroundImage = get_field('background_image');

$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];
$invertColours = $backgroundImage['invert_colours'];

$video = get_field('youtube_code');
$fallbackImage = get_field('fallback_image');
?>

<header id="sub-header"

class="page-header page-header--page bg-effect--<?php echo $backgroundEffect ?> imagebg videobg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
data-overlay="<?php echo $imageOverlay ?>"
>

<?php if( $headerType == 'image' ): ?>

  <?php if( !empty($image) ):

    // vars
    $url = $image['url'];
    $alt = $image['alt'];

  ?>
    <div class="background-image-holder">
      <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
    </div>
  <?php endif; ?>
<?php endif; ?>
<?php if( $headerType == 'video' ): ?>

  <div class="youtube-background" data-video-url="<?php echo $video ?>"></div>

  <?php if( !empty($fallbackImage) ):

    // vars
    $url = $fallbackImage['url'];
    $alt = $fallbackImage['alt'];

  ?>
    <div class="background-image-holder">
      <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
    </div>
  <?php endif; ?>
<?php endif; ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <?php if ( $post->post_parent ) { ?>
             <p><a class="back-to" href="<?php echo get_permalink( $post->post_parent ); ?>" >
               <i class="fal fa-arrow-circle-left"></i> Back to <?php echo get_the_title( $post->post_parent ); ?>
             </a></p>
          <?php } ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
      <?php if(get_field('page_intro')): ?>
        <p class="lead"><?php the_field('page_intro'); ?></p>
      <?php endif; ?>

    </div>
  </div>
</div>



</header>
<main class="page-content">

  <?php get_template_part( 'page-templates/blocks' ); ?>

</main>


<?php get_footer();
