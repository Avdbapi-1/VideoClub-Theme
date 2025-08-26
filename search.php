<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package videoclub
 */

get_header(); ?>

	<div id="primary" class="content-area full-width clear">

		<main id="main" class="site-main clear">

		<div class="breadcrumbs clear">			
			<h1>
				<?php printf( esc_html( 'Search Results for %s', 'videoclub' ), '"' . get_search_query() . '"' ); ?>			
			</h1>	
		</div><!-- .breadcrumbs -->

		<div id="recent-content" class="content-loop">

			<?php

			if ( have_posts() ) :	
						
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'loop' );

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				?>

			<?php endif; ?>

		</div>

		<?php get_template_part( 'template-parts/pagination', '' ); ?>		

		</main><!-- .site-main -->

	</div><!-- #primary -->

	<?php get_template_part( 'template-parts/site', 'bottom' ); ?>	

<?php get_footer(); ?>

