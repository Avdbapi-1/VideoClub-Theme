<?php
/**
 * Template part for displaying video player and metadata
 *
 * @package videoclub
 */

// Get video metadata
$video_embed = videoclub_get_meta(get_the_ID(), 'videoclub_video_embed');
$duration = videoclub_get_meta(get_the_ID(), 'videoclub_duration');
$original_name = videoclub_get_meta(get_the_ID(), 'videoclub_original_name');
$description = videoclub_get_meta(get_the_ID(), 'videoclub_description');
$download_link = videoclub_get_meta(get_the_ID(), 'videoclub_download_link');
$movie_code_1 = videoclub_get_meta(get_the_ID(), 'videoclub_movie_code_1');
$movie_code_2 = videoclub_get_meta(get_the_ID(), 'videoclub_movie_code_2');
$movie_code_3 = videoclub_get_meta(get_the_ID(), 'videoclub_movie_code_3');
$video_trailer = videoclub_get_meta(get_the_ID(), 'videoclub_video_trailer');
$pornstars = videoclub_get_meta(get_the_ID(), 'videoclub_pornstars');
$image_url = videoclub_get_meta(get_the_ID(), 'videoclub_image_url');

// Format duration
$formatted_duration = videoclub_format_duration($duration);

// Add structured data for SEO
if (!empty($pornstars) && is_single()) {
    $schema = videoclub_generate_pornstar_schema(get_the_ID());
    if (!empty($schema)) {
        echo '<script type="application/ld+json">' . $schema . '</script>';
    }
}
?>

<div class="videoclub-video-container">
    

    
    <?php if (!empty($video_embed)) : ?>
        <div class="video-player-wrapper">
            <div class="video-player">
                <?php 
                // Allow iframe and necessary attributes for video embedding
                $allowed_html = array(
                    'iframe' => array(
                        'src' => array(),
                        'width' => array(),
                        'height' => array(),
                        'frameborder' => array(),
                        'scrolling' => array(),
                        'allowfullscreen' => array(),
                        'allow' => array(),
                        'style' => array(),
                        'class' => array(),
                        'id' => array(),
                        'title' => array(),
                        'loading' => array()
                    ),
                    'div' => array(
                        'class' => array(),
                        'id' => array(),
                        'style' => array()
                    ),
                    'script' => array(
                        'src' => array(),
                        'type' => array(),
                        'async' => array(),
                        'defer' => array()
                    )
                );
                echo wp_kses($video_embed, $allowed_html);
                ?>
            </div>
        </div>
    <?php elseif (!empty($image_url)) : ?>
        <div class="video-thumbnail-wrapper">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="video-featured-image" style="max-width: 800px; width: 100%;">
        </div>
        <div class="video-player-wrapper">
            <div class="video-player no-video">
                <p><?php _e('Video player not available, displaying featured image above.', 'videoclub'); ?></p>
            </div>
        </div>
    <?php else : ?>
        <div class="video-player-wrapper">
            <div class="video-player no-video">
                <p><?php _e('No video or image available.', 'videoclub'); ?></p>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($video_trailer)) : ?>
        <div class="video-trailer-wrapper">
            <h3><?php _e('Trailer', 'videoclub'); ?></h3>
            <div class="video-trailer">
                <iframe src="<?php echo esc_url($video_trailer); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    <?php endif; ?>
    

    
    <?php if (!empty($description)) : ?>
        <div class="video-description">
            <h3><?php _e('Description', 'videoclub'); ?></h3>
            <div class="description-content"><?php echo wp_kses_post($description); ?></div>
        </div>
    <?php endif; ?>
    
</div>
