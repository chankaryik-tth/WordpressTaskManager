			
			<footer class="footer">
				<p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>
				<nav class="navbar-footer">
					<?php $args = array('theme_location' => 'footer', );?>
					<?php wp_nav_menu($args);?>
				</nav>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>

