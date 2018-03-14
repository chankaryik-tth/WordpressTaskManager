<?php 
	get_header();
?>
<?php
	$args = array('post_type' => 'tasks');
	$wp_query = new WP_Query($args);

	if($wp_query->have_posts()):
		while ($wp_query->have_posts()): $wp_query->the_post();
?>
<article class="post">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>	
	<h4><?php echo get_field('description'); ?></h4>	
	<h4>Dead Line: <?php echo get_field('deadline'); ?></h4>	
</article>
<?php
		endwhile;
		echo paginate_links();
	endif;
?>
<?php

	get_footer();
?>