<?php 
	get_header();
?>
<a href="http://local.taskmanager.com/wp-json/api-bearer-auth/v1/tokens/refresh">click me</a>
<article class="post">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>	
	<h4><?php echo get_field('description'); ?></h4>	
	<h4>Dead Line: <?php echo get_field('deadline'); ?></h4>	
</article>
<?php
	get_footer();
?>