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

<section

class="page-header page-header--work"
>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 text-center">

      <h1 class=""><?php the_title(); ?></h1>
      <p class="lead"><?php the_field('page_intro'); ?></p>

    </div>
  </div>
</div>



</section>



<section class="work-tiles" >

            <div class="col-12 justify-content-center text-center filters">
              <!-- Get a list of all categories in the database, excluding those not assigned to posts -->

              <?php
              $categories = get_terms( array(
                'posttype' => 'projects',
                'taxonomy' => 'category',
                'hide_empty' => true,
              ) );
              ?>
                <fieldset data-filter-group>
                    <!-- Iterate through each category -->
                    <a class="filter-button" data-filter="all">All</a>

                    <!-- Output control button markup, setting the data-filter attribute as the category "slug" -->
                    <?php foreach($categories as $category): ?>
                      <a  class="filter-button" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
                    <?php endforeach; ?>
                  </select>
                </fieldset>
            </div>

  <?php if( have_rows('work_tiles') ):

  

?>

<div class="container space-below--<?php echo $spaceBelow ?>">
  <div class="row">

<?php while ( have_rows('work_tiles') ) : the_row();?>

<?php $posts = get_sub_field('project'); $tileSize = get_sub_field('tile_size'); if( $posts ): ?>

<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

<?php setup_postdata($post); ?>

<?php
        $categories = get_the_category();
        $slugs = wp_list_pluck($categories, 'slug');
        $class_names = join(' ', $slugs);
        ?>

    <div class="mix<?php if ($class_names) { echo ' ' . $class_names;} ?> <?php echo $service_class_array; ?> <?php if( $tileSize == '66' ): echo 'col-md-8'; endif; ?><?php if( $tileSize == '33' ): echo 'col-md-4'; endif; ?><?php if( $tileSize == '50' ): echo 'col-md-6'; endif; ?><?php if( $tileSize == '100' ): echo 'col-md-12'; endif; ?>">

  <div class="project-thumb hover-element" data-aos="fade-up" data-aos-delay="300">
    <a href="<?php the_permalink(); ?>">
      <div class="hover-element__initial">
        <?php
        $workImage = get_field('feature_image');

        if( !empty($workImage) ):

          // vars
          $url = $workImage['url'];
          $alt = $workImage['alt'];

          ?>
          <div class="background-image-holder">
            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
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
 

<?php  endwhile;?>

 </div>
</div>

<?php  else :?>


<?php endif; ?>




    </section>

    

    <?php get_footer();
