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
<header id="sub-header" class="project__header pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h6 class="project-client"><?php the_field('client'); ?></h6>
                <h1 class="page-title"><?php the_title(); ?></h1>
                <p class="lead"><?php the_field('one_liner'); ?></p>
                <hr class="project-hr" />
            </div>
</header>
<?php if (!empty($image)) :
    // vars
    $url = $image['url'];
    $alt = $image['alt'];
    ?>
<img class="project__feature-image" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
<?php endif; ?>
<main class="project__content">
    <?php get_template_part('page-templates/blocks'); ?>
    <section class="pb-0">
        <div class="row d-flex align-items-center pb-3">
            <div class="col-md-12">
                <h6 style="text-align:center">More work</h6>
            </div>
        </div>
        <div class="row">
            <?php
            $next_post = get_next_post();
            $prev_post = get_previous_post();

            if (!empty($next_post)) : ?>
            <div class=" <?php if ($prev_post) : echo 'col-md-6';
                            else : echo ' col-md-12 ';
                            endif; ?> project-thumb  hover-element">
                <a href="<?php echo esc_url(get_permalink($next_post->ID));  ?>">
                    <div class="hover-element__initial">
                        <?php
                        $workImage = get_field('tile_image', $next_post->ID);
                        if (!empty($workImage)) :
                            // vars
                            $url = $workImage['url'];
                            $alt = $workImage['alt'];
                            ?>
                        <div class="background-image-holder">
                            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="project-thumb__title">
                        <?php if (get_field('client')) : ?>
                        <h6><?php the_field('client'); ?></h6>
                        <?php endif; ?>
                        <h4 class="mb-0"><?php echo esc_attr($next_post->post_title); ?></h4>
                    </div>
                    <div class="hover-element__reveal" data-overlay="9">
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <?php
            if (!empty($prev_post)) : ?>
            <div class="<?php if ($next_post) : echo 'col-md-6';
                        else : echo 'col-md-12';
                        endif; ?> project-thumb  hover-element">
                <a href="<?php echo esc_url(get_permalink($prev_post->ID));  ?>">
                    <div class="hover-element__initial">
                        <?php
                        $workImage = get_field('tile_image', $prev_post->ID);

                        if (!empty($workImage)) :
                            // vars
                            $url = $workImage['url'];
                            $alt = $workImage['alt'];
                            ?>
                        <div class="background-image-holder">
                            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="project-thumb__title">
                        <?php if (get_field('client', $prev_post->ID)) : ?>
                        <h6><?php the_field('client', $prev_post->ID); ?></h6>
                        <?php endif; ?>
                        <h4 class="mb-0"><?php echo esc_attr($prev_post->post_title); ?></h4>
                    </div>
                    <div class="hover-element__reveal" data-overlay="9">
                    </div>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer();
