<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package videoclub
 */

get_header(); 
?>

	<div class="single-wrap clear">

	<div id="primary" class="content-area">

		<main id="main" class="site-main">
		
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

	</div><!-- .single-wrap -->

	<?php
		if ( is_single() ) {
	?>

	<?php
		// Get the taxonomy terms of the current page for the specified taxonomy.
		$terms = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'ids' ) );

		// Bail if the term empty.
		if ( empty( $terms ) ) {
			return;
		}

		$query = array(
			'post__not_in' => array( get_the_ID() ),
			'tax_query'    => array(
				array(
					'taxonomy' => 'category',
					'field'    => 'id',
					'terms'    => $terms,
					'operator' => 'IN'
				)
			),
			'posts_per_page' => 10, 
			'post_type'      => 'post',
		);

		// Allow dev to filter the query.
		$args = apply_filters( 'videoclub_related_posts_args', $query );

		// The post query
		$related = new WP_Query( $args );

		if ( $related->have_posts() ) : ?>

			<div class="post-bottom-related clear">

				<h3 class="related-title"><?php echo esc_html('You may be interested in:', 'videoclub'); ?></h3>

				<div class="content-loop clear">

				<?php while ( $related->have_posts() ) : $related->the_post(); ?>

					<?php get_template_part('template-parts/content', 'loop'); ?>

				<?php endwhile; ?>

				</div><!-- .related-loop -->

			</div><!-- .post-bottom-related -->

		<?php 
			endif;
			// Restore original Post Data.
			wp_reset_postdata();
		?>

	<?php		
		}
	?>

	<?php
	while ( have_posts() ) : the_post();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( ( comments_open() || get_comments_number() ) && is_singular('post') ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	<?php get_template_part( 'template-parts/site', 'bottom' ); ?>	

<?php get_footer(); ?>
