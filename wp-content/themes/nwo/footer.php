<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

?>
<footer id="footer">
		<div class="container text-center">

				<div class="row justify-content-center">

						<div class="col-sm-8">
								<h1>Brand. Campaign. Change.</h1>
						</div>
				</div>

				<div class="row">
						<div class="col-sm-12">
								<p>© Copyright New Word Order | <a href="#">Privacy Policy</a></p>
						</div>
						<div class="col-sm-3">

						</div>
						<div class="col-sm-3">

						</div>

				</div>

</footer>



</section> <!-- close #page -->


<?php wp_footer(); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTDMHIJpc1k4FvjpktUCnUNSOSbO7xPQ"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/nav.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/flickity.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/fontawesome-all.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/parallax.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/typed.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/smooth-scroll.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/ytplayer.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/aos.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/map.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>



<script>
	AOS.init({
		duration: 1000, // values from 0 to 3000, with step 50ms
	});
</script>

</body>

</html>
