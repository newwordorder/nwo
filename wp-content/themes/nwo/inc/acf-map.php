<?php 

/**
 * Google map API for ACF
 */

function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyDQTDMHIJpc1k4FvjpktUCnUNSOSbO7xPQ');
}

add_action('acf/init', 'my_acf_init');