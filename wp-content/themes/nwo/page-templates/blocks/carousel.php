<?php // IMAGE BLOCK

if( get_row_layout() == 'carousel' ):

  $image = get_sub_field('image');
  $width = get_sub_field('width');
  $spaceBelow = get_sub_field('space_below');

  ?>

<?php if( $width == 'full' ): ?>

  <?php

  if( !empty($image) ):

    // vars
    $url = $image['url'];
    $alt = $image['alt'];

   ?>

    <div id="slider" class="carousel"></div>
      <script>
        <?php 
          $array1 = array();
          $gallery1 = get_sub_field('gallery');
          foreach ($gallery1 as &$value) {
              array_push($array1, $value['url']);
          }

          ?>

        const images1 = <?php echo json_encode($array1); ?>;

        const newSlider1 = slider({ images:images1 });
        document.getElementById('slider').appendChild(newSlider1);
        sliderInit();
        </script>
      <?php endif; ?>

<?php else: ?>
    <div class="container space-below--<?php echo $spaceBelow ?>">
      <div class="row justify-content-center">
        <div class="col-md-<?php echo $width; ?>">
          <div id="slider" class="carousel"></div>
            <script>
              <?php 
                $array2 = array();
                $gallery2 = get_sub_field('gallery');
                foreach ($gallery2 as &$value) {
                    array_push($array2, $value['url']);
                }

                ?>

              const images2 = <?php echo json_encode($array2); ?>;

              const newSlider2 = slider({ images:images2 });
              document.getElementById('slider').appendChild(newSlider2);
              sliderInit();
            </script>
        </div>
      </div>
    </div>

<?php endif; // type ?>

<?php endif;

?>