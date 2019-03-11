<?php
/**
* Template Name: Home
*
*
* @package understrap
*/

get_header();


?>

<section class="home-header">

    <!--<div class="home-header__left imagebg bg-effect--ken-burns">
    <a class="home-header__link" href="#"></a>
    <div class="background-image-holder home-header__image">
      <img src="<?php bloginfo('template_directory'); ?>/img/strategy.jpg"/>
    </div>
    
    <span class="home-header__title">Think</span>
  </div>
  <div class="home-header__right imagebg bg-effect--ken-burns">
    <a class="home-header__link" href="#"></a>
    <div class="background-image-holder home-header__image">
      <img src="<?php bloginfo('template_directory'); ?>/img/do.jpg"/>
    </div>

    <span class="home-header__title">Do</span>
  </div>-->

    <!--<div class="home-header__column left imagebg bg-effect--ken-burns">
    <a class="home-header__link" href="#"></a>
    <div class="background-image-holder home-header__image">
      <img src="<?php bloginfo('template_directory'); ?>/img/strategy.jpg"/>
    </div>
    
    <span class="home-header__title">Think</span>
  </div>

  <div class="home-header__column center imagebg bg-effect--ken-burns">
    <a class="home-header__link" href="#"></a>
    <div class="background-image-holder home-header__image">
      <img src="<?php bloginfo('template_directory'); ?>/img/do.jpg"/>
    </div>

    <span class="home-header__title">Feel</span>
  </div>

  <div class="home-header__column right imagebg bg-effect--ken-burns">
    <a class="home-header__link" href="#"></a>
    <div class="background-image-holder home-header__image">
      <img src="<?php bloginfo('template_directory'); ?>/img/do.jpg"/>
    </div>

    <span class="home-header__title">Do</span>
  </div>-->


</section>


<section id="sub-header" class="page-header--home p-0">


    <?php $slides = get_field('texts'); ?>
    <div class='slider'>
        <div class="slide__container">
            <?php while (have_rows('texts')) : the_row();
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
            <?php $posts = get_field('featured_post');
            if ($posts) : ?>

            <?php foreach ($posts as $post) : ?>

            <?php setup_postdata($post); ?>
            <div class="project-thumb hover-element">
                <a href="<?php the_permalink(); ?>">
                    <div class="hover-element__initial">
                        <?php if (get_field('tile_image')) :

                          $workImage2 = get_field('tile_image');

                        endif;

                        if (!empty($workImage2)) :

                          // vars
                          $url2 = $workImage2['url'];
                          $alt2 = $workImage2['alt'];
                          ?>
                        <div class="background-image-holder">
                            <img src="<?php echo $url2; ?>" alt="<?php echo $alt2; ?>" />
                        </div>
                </a>
            </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="tile tile--2">
            <?php $posts = get_field('featured_project');
            if ($posts) : ?>

            <?php foreach ($posts as $post) : ?>

            <?php setup_postdata($post); ?>


            <div class="project-thumb  hover-element">
                <a href="<?php the_permalink(); ?>">
                    <div class="hover-element__initial">
                        <?php if (get_field('tile_image')) :
                          $workImage3 =  get_field('tile_image');
                        endif;

                        if (!empty($workImage3)) :

                          // vars
                          $url3 = $workImage3['url'];
                          $alt3 = $workImage3['alt'];
                          ?>

                        <div class="background-image-holder">
                            <img src="<?php echo $url3; ?>" alt="<?php echo $alt3; ?>" />
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="project-thumb__title">
                        <?php if (get_field('client')) : ?>
                        <h6><?php the_field('client'); ?></h6>
                        <?php endif; ?>
                        <h4><?php the_title(); ?></h4>
                        <?php if (get_field('one_liner')) : ?>
                        <p class="lead"><?php the_field('one_liner'); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="hover-element__reveal" data-overlay="9">

                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>


    </div>



</section>

<?php get_template_part('page-templates/blocks'); ?>

<script>

</script>

<?php get_footer();
