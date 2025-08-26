<?php
/**
 * Template part for displaying video information in sidebar
 *
 * @package videoclub
 */

// Get video metadata
$duration = videoclub_get_meta(get_the_ID(), 'videoclub_duration');
$original_name = videoclub_get_meta(get_the_ID(), 'videoclub_original_name');
$download_link = videoclub_get_meta(get_the_ID(), 'videoclub_download_link');
$movie_code_1 = videoclub_get_meta(get_the_ID(), 'videoclub_movie_code_1');
$movie_code_2 = videoclub_get_meta(get_the_ID(), 'videoclub_movie_code_2');
$movie_code_3 = videoclub_get_meta(get_the_ID(), 'videoclub_movie_code_3');
$pornstars = videoclub_get_meta(get_the_ID(), 'videoclub_pornstars');

// Format duration
$formatted_duration = videoclub_format_duration($duration);

// Only show if we have metadata
if (!empty($duration) || !empty($original_name) || !empty($download_link) || !empty($movie_code_1) || !empty($movie_code_2) || !empty($movie_code_3) || !empty($pornstars)) :
?>

<div class="widget videoclub-video-info">
    <h3 class="widget-title"><?php _e('Video Information', 'videoclub'); ?></h3>
    
    <div class="video-info-content">
        
        <?php if (!empty($formatted_duration)) : ?>
            <div class="info-item">
                <span class="info-icon">⏱</span>
                <span class="info-label"><?php _e('Duration:', 'videoclub'); ?></span>
                <span class="info-value"><?php echo esc_html($formatted_duration); ?></span>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($original_name)) : ?>
            <div class="info-item">
                <span class="info-icon">📝</span>
                <span class="info-label"><?php _e('Original Name:', 'videoclub'); ?></span>
                <span class="info-value"><?php echo esc_html($original_name); ?></span>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($download_link)) : ?>
            <div class="info-item">
                <span class="info-icon">⬇</span>
                <span class="info-label"><?php _e('Download:', 'videoclub'); ?></span>
                <span class="info-value">
                    <a href="<?php echo esc_url($download_link); ?>" target="_blank" rel="noopener" class="download-link">
                        <?php _e('Download', 'videoclub'); ?>
                    </a>
                </span>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($movie_code_1) || !empty($movie_code_2) || !empty($movie_code_3)) : ?>
            <div class="info-item">
                <span class="info-icon">🎬</span>
                <span class="info-label"><?php _e('Movie Codes:', 'videoclub'); ?></span>
                <span class="info-value">
                    <?php 
                    $codes = array_filter(array($movie_code_1, $movie_code_2, $movie_code_3));
                    echo esc_html(implode(', ', $codes));
                    ?>
                </span>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($pornstars)) : ?>
            <div class="info-item">
                <span class="info-icon">⭐</span>
                <span class="info-label"><?php _e('Pornstars:', 'videoclub'); ?></span>
                <span class="info-value">
                    <?php 
                    // Split pornstars by comma and create tag links
                    $pornstar_list = explode(',', $pornstars);
                    $pornstar_links = array();
                    foreach($pornstar_list as $pornstar) {
                        $pornstar = trim($pornstar);
                        if (!empty($pornstar)) {
                            // Check if tag exists
                            $tag = get_term_by('name', $pornstar, 'post_tag');
                            if ($tag) {
                                $pornstar_url = get_tag_link($tag);
                            } else {
                                // Fallback to search
                                $pornstar_url = home_url('/?s=' . urlencode($pornstar));
                            }
                            
                            $pornstar_links[] = '<a href="' . esc_url($pornstar_url) . '" class="pornstar-link sidebar-link" title="' . esc_attr(sprintf(__('View all videos with %s', 'videoclub'), $pornstar)) . '">' . 
                                               '<span class="pornstar-tag sidebar-tag">' . esc_html($pornstar) . '</span>' . 
                                               '</a>';
                        }
                    }
                    echo implode(' ', $pornstar_links);
                    ?>
                </span>
            </div>
        <?php endif; ?>
        
    </div>
</div>

<?php endif; ?>
