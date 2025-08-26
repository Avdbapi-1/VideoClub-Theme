<?php get_header(); ?>
	
	<div id="primary" class="content-area full-width clear">

		<main id="main" class="site-main clear">

			<div id="recent-content" class="content-loop clear">

				<?php

				if ( have_posts() ) :	
				
					if ( is_paged() ) {
						get_template_part( 'template-parts/pagination', '' );
					}
						
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part('template-parts/content', 'loop');

					endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; 

				?>

			</div><!-- #recent-content -->
			
			<?php get_template_part( 'template-parts/pagination', '' ); ?>


		</main><!-- .site-main -->

	</div><!-- #primary -->

	<?php get_template_part( 'template-parts/site', 'bottom' ); ?>

<?php get_footer(); ?>
