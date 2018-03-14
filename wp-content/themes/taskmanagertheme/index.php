<?php 
	get_header();

	if(have_posts()):
		while (have_posts()): the_post();
?>
	<article class="post">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>	
		<h4><?php 
			if($post->post_excerpt){
				echo get_the_excerpt();
			}else{
				echo get_the_content();
			}?></h4>	
	</article>
<?php 			
		endwhile;
	endif;
	get_footer();
?>