<div class="entry-meta">

	<?php if ( is_single() ) : ?>
		<span class="entry-category"><?php videoclub_first_category(); ?></span>
		<span class="entry-author"><?php the_author_posts_link(); ?></span> 		
	<?php endif; ?>

	<?php if ( (!is_category()) && (!is_single()) ) { ?>
		<span class="entry-category"><?php videoclub_first_category(); ?></span>
	<?php } ?>

	<span class="entry-date"><?php echo get_the_date(); ?></span>
	<span class="sep">&middot;</span>
	<span class='entry-comment'><?php comments_popup_link( __('0 Comment','videoclub'), __('1 Comment','videoclub'), __('% Comments','videoclub'), 'comments-link', __('Comments off','videoclub')); ?></span>
	
</div><!-- .entry-meta -->