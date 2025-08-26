<div id="site-bottom" class="clear">

	<?php 
		if ( has_nav_menu( 'footer' ) ) {
			wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-nav' ) );
		}
	?>	

	<div class="site-info">

		<?php
			$videoclub_theme = wp_get_theme();
		?>

		&copy;<?php echo esc_html( date("o") ); ?> <?php echo esc_html( get_bloginfo('name') ); ?> <a target="_blank" href="<?php echo esc_url( $videoclub_theme->get( 'ThemeURI' ) ); ?>"> <?php esc_html_e('WordPress Video Theme', 'videoclub'); ?></a> <?php esc_html_e('by', 'videoclub'); ?> <a target="_blank" href="<?php echo esc_url( $videoclub_theme->get( 'AuthorURI' ) ); ?>"><?php esc_html_e('WPEnjoy', 'videoclub'); ?></a>

	</div><!-- .site-info -->

</div><!-- #site-bottom -->		