<?php // TEXT BLOCK

if( get_row_layout() == 'map' ):

  $spaceBelow = get_sub_field('space_below');

  ?>

    <?php 

    $map = get_sub_field('map');

    if( !empty($map) ):
    ?>
    <div class="acf-map space-below--<?php echo $spaceBelow ?>">
        <div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"></div>
    </div>
    <?php endif; ?>

<?php endif;

?>
