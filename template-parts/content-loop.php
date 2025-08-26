<div id="post-<?php the_ID(); ?>" <?php post_class( 'ht_grid_1_5' ); ?>>	

	<?php 
	// Get VideoClub image URL
	$videoclub_image_url = videoclub_get_meta(get_the_ID(), 'videoclub_image_url');
	$has_videoclub_image = !empty($videoclub_image_url);
	$has_embed = videoclub_has_embed_code() || videoclub_has_embed();
	$has_videoclub_embed = !empty(videoclub_get_meta(get_the_ID(), 'videoclub_video_embed'));
	
	if ( has_post_thumbnail() || $has_videoclub_image ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('videoclub_post_thumb');
				} elseif ( $has_videoclub_image ) {
					echo '<img src="' . esc_url($videoclub_image_url) . '" alt="' . esc_attr(get_the_title()) . '" class="videoclub-thumbnail">';
				}
				?>
			</div><!-- .thumbnail-wrap -->
			<?php if( $has_embed || $has_videoclub_embed ) { ?>
				<div class="icon-play"><i class="genericon genericon-play"></i></div>
			<?php } ?>
		</a>
	<?php } ?>	

	<div class="entry-header">

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
		<?php if (!is_category()) : ?>
			<div class="entry-category"><?php videoclub_first_category(); ?></div>
		<?php endif; ?>

	</div><!-- .entry-header -->

</div><!-- #post-<?php the_ID(); ?> -->