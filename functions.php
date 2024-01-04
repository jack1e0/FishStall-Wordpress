<?php
/* enqueue script for parent theme stylesheeet */        
function homepagetheme_parent_styles() {
 
 // enqueue style
 wp_enqueue_style( 'parent', get_template_directory_uri().'/style.css' );                       
}

// function enqueue_custom_script() {
//     wp_enqueue_script('main', get_template_directory_uri() . '/main.js', array('jquery'), '1.0', true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_custom_script');

add_action( 'wp_enqueue_scripts', 'homepagetheme_parent_styles');
