<?php 
	get_header();

	if(have_posts()):
		while (have_posts()): the_post();
?>
	<article class="post">

		<nav class="navbar-pc clearfix">
			<ul>
			<?php if($post->post_parent != 0){ ?>
				<li class="parent"><a href="<?php echo get_permalink(get_ancestor_id());?>"><?php echo get_the_title( get_ancestor_id());?></a></li>
				<?php } ?>				
				<?php $args = array('child_of' => get_ancestor_id(), 'title_li' => "");
				wp_list_pages( $args );?>
			</ul>
		</nav>

		<h2><?php the_title(); ?></h2>

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