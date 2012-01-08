<?php

include("plugins/pagenavi.php");

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'bio-thumb', 335 );
	add_image_size( 'trabalhos-thumb', 289 );
}

function the_slug() {
	$post_data = get_post($post->ID, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

?>