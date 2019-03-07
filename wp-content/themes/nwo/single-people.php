<?php
/**
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

<header id="sub-header" class="page-header page-header--people bg-effect--<?php echo $backgroundEffect ?> imagebg videobg <?php if ($invertColours == 'yes') : echo 'image--light';
                                                                                                                          endif; ?>" data-overlay="<?php echo $imageOverlay ?>">

    <?php if ($headerType == 'image') : ?>

    <?php if (!empty($image)) :

      // vars
      $url = $image['url'];
      $alt = $image['alt'];

      ?>
    <div class="background-image-holder">
        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <?php if ($headerType == 'video') : ?>

    <div class="youtube-background" data-video-url="<?php echo $video ?>"></div>

    <?php if (!empty($fallbackImage)) :

      // vars
      $url = $fallbackImage['url'];
      $alt = $fallbackImage['alt'];

      ?>
    <div class="background-image-holder">
        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-2">
                <?php $image = get_field('profile_photo');
                if (!empty($image)) :

                  // vars
                  $url = $image['url'];
                  $alt = $image['alt'];

                  $size = '600x600';
                  $thumb = $image['sizes'][$size];
                  $width = $image['sizes'][$size . '-width'];
                  $height = $image['sizes'][$size . '-height'];

                  ?>
                <div class="media-1 imagebg avatar">
                    <div class="background-image-holder">
                        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-7">
                <h1 class="mb-0"><?php the_title(); ?></h1>
                <?php if (get_field('title')) : ?>
                <p class="h6"><?php the_field('title'); ?></p>
                <?php endif; ?>

            </div>
            <div class="col-md-3">
                <ul class="people-contact">
                    <?php if (get_field('email_address')) : ?>
                    <li class="people-contact__item">
                        <a class="people-contact__link" href="mailto:<?php the_field('email_address'); ?>"><i class="fal fa-envelope"></i></a>
                    </li>
                    <?php endif; ?>
                    <?php if (get_field('twitter')) : ?>
                    <li class="people-contact__item">
                        <a class="people-contact__link" href="<?php the_field('twitter'); ?>"><i class="fab fa-twitter"></i></a>
                    </li>
                    <?php endif; ?>
                    <?php if (get_field('linkedin')) : ?>
                    <li class="people-contact__item">
                        <a class="people-contact__link" href="<?php the_field('linkedin'); ?>"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <?php endif; ?>
                    <?php if (get_field('instagram')) : ?>
                    <li class="people-contact__item">
                        <a class="people-contact__link" href="<?php the_field('instagram'); ?>"><i class="fab fa-instagram"></i></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</header>
<main class="page-content">
    <section class="space--lg">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-8">
                    <?php the_field('biography'); ?>
                </div>
                <div class="col-md-3">
                    <?php if (have_rows('questions')) : ?>
                    <?php while (have_rows('questions')) : the_row(); ?>
                    <h6><?php the_sub_field('question'); ?></h6>
                    <p><?php the_sub_field('answer'); ?></p>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php 

$images = get_field('gallery');

if ($images) : ?>
<section class="people-gallery">
    <div class="row">
        <?php foreach ($images as $image) : ?>
        <div class="col-6 col-md-3 ">
            <div class="media-1">
                <div class="background-image-holder">
                    <img src="<?php echo $image['sizes']['600x600']; ?>" alt="<?php echo $image['alt']; ?>" />
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<?php get_footer();
