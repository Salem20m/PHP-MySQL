<?php
/**
 * Plugin Name: Custom Login
 * Description: A plugin to customise the login page
 * Version: 1.0.0
 */

	/** First Way:-
	 *
	 */
	//function add_custom_style() {
	//	wp_enqueue_style('custom-login-style', plugin_dir_url(__FILE__) . 'custom-login-style.css');
	//}
	
	function add_custom_style() {
		?>
		<style>
		    .login #login h1 a {
		        background-image: url("<?=plugin_dir_url(__FILE__) . 'city.png'?>");
		        width: 180px;
		        height: 180px;
		        background-size: 180px 180px;
		        border-radius: 50%;
		    }
		</style>
		<?php

	}
	
	add_action('login_enqueue_scripts', 'add_custom_style');