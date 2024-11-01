<?php 

add_action( 'wp_ajax_swp_get_title_from_id', 'swp_get_title_from_id' );
add_action( 'wp_ajax_nopriv_swp_get_title_from_id', 'swp_get_title_from_id' );

function swp_get_title_from_id() {
	$id = (int)$_POST['swp_post_id'];
	$response['title'] = get_the_title($id);
	echo(json_encode($response));
	exit();
}