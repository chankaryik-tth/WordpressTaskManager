<?php 

	function init_tools(){
		wp_enqueue_style('style', get_stylesheet_uri());
	}

	add_action('wp_enqueue_scripts', 'init_tools');

	register_nav_menus( array(
		'primary' => __('Primary Menu'),
	 	'footer' => __('Footer Menu'),
	 ));

	function get_ancestor_id(){
		global $post;

		if($post->post_parent){
			$id = array_reverse(get_post_ancestors($post->ID));
			return $id[0];
		}

		return $post->ID;
	}

?>