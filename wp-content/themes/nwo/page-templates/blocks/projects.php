<?php  // FEATURE COLUMNS

if (get_row_layout() == 'projects') :

    $spaceBelow = get_sub_field('space_below');
    $includeFilters = get_sub_field('include_filters');

    ?>

<?php if (have_rows('work_tiles')) :
    ?>

<div class="work-tiles space-below--<?php echo $spaceBelow ?>">

    <?php if ($includeFilters == 'true') : ?>
    <div class="row">
        <div class="col-12 justify-content-center text-center filters">
            <!-- Get a list of all categories in the database, excluding those not assigned to posts -->

            <?php
            $categories = get_terms(array(
                'posttype' => 'projects',
                'taxonomy' => 'category',
                'hide_empty' => true,
            ));
            ?>
            <fieldset data-filter-group>
                <!-- Iterate through each category -->
                <a class="filter-button" data-filter="all">All</a>

                <!-- Output control button markup, setting the data-filter attribute as the category "slug" -->
                <?php foreach ($categories as $category) : ?>
                <a class="filter-button" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
                <?php endforeach; ?>
                </select>
            </fieldset>
        </div>
    </div>
    <?php endif; ?>

    <div class="row no-gutters">

        <?php while (have_rows('work_tiles')) : the_row(); ?>

        <?php $posts = get_sub_field('project');
        $tileSize = get_sub_field('tile_size');
        if ($posts) : ?>

        <?php foreach ($posts as $post) : ?>

        <?php setup_postdata($post); ?>

        <?php
        $categories = get_the_category();
        $slugs = wp_list_pluck($categories, 'slug');
        $class_names = join(' ', $slugs);
        ?>



        <div class="mix
        <?php if ($class_names) {
            echo ' ' . $class_names;
        } ?>
        <?php echo $service_class_array; ?>
        <?php if ($tileSize == '66') : echo 'col-md-8';
        endif; ?>
        <?php if ($tileSize == '33') : echo 'col-md-4';
        endif; ?>
        <?php if ($tileSize == '50') : echo 'col-md-6';
        endif; ?>
        <?php if ($tileSize == '100') : echo 'col-md-12';
        endif; ?>">
            <div class="project-thumb  hover-element">
                <a href="<?php the_permalink(); ?>">
                    <div class="hover-element__initial">
                        <?php
                        $workImage = get_field('tile_image');

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
                        <h3 class="mb-0"><?php the_title(); ?></h3>
                    </div>
                    <div class="hover-element__reveal" data-overlay="9"></div>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>

        <?php endif; ?>



        <?php endwhile; ?>

    </div>
</div>

<?php else : ?>

<?php endif; ?>

<script>
    var mixer = mixitup('.work-tiles', {
        animation: {
            enable: false
        }
    });
</script>
<?php endif; ?> 