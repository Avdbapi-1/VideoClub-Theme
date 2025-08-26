<?php
/**
 * VideoClub Metabox Functions
 * 
 * @package videoclub
 */

// Add metabox to posts
function videoclub_add_metabox() {
    add_meta_box(
        'videoclub_metabox', 
        'Video Options', 
        'videoclub_metabox_callback', 
        'post', 
        'normal', 
        'high'
    );
}
add_action('add_meta_boxes', 'videoclub_add_metabox');

// Metabox callback function
function videoclub_metabox_callback($post) {
    // Add nonce for security
    wp_nonce_field('videoclub_metabox_nonce', 'videoclub_metabox_nonce');
    
    // Get current values
    $duration = get_post_meta($post->ID, 'videoclub_duration', true);
    $video_embed = get_post_meta($post->ID, 'videoclub_video_embed', true);
    $original_name = get_post_meta($post->ID, 'videoclub_original_name', true);
    $description = get_post_meta($post->ID, 'videoclub_description', true);
    $download_link = get_post_meta($post->ID, 'videoclub_download_link', true);
    $movie_code_1 = get_post_meta($post->ID, 'videoclub_movie_code_1', true);
    $movie_code_2 = get_post_meta($post->ID, 'videoclub_movie_code_2', true);
    $movie_code_3 = get_post_meta($post->ID, 'videoclub_movie_code_3', true);
    $video_trailer = get_post_meta($post->ID, 'videoclub_video_trailer', true);
    $pornstars = get_post_meta($post->ID, 'videoclub_pornstars', true);
    $image_url = get_post_meta($post->ID, 'videoclub_image_url', true);
    ?>
    
    <table class="form-table videoclub-video-meta">
        <tbody>
            <tr>
                <td class="first">
                    <span class="dashicons dashicons-clock wp-ui-text-highlight"></span>
                    <label for="videoclub_duration"><?php _e('Duration', 'videoclub'); ?></label>
                </td>
                <td>
                    <input name="videoclub_duration" type="text" id="videoclub_duration" 
                           value="<?php echo esc_attr($duration); ?>" class="regular-text">
                    <p class="description"><?php _e('Enter video duration (e.g., 1:30:45)', 'videoclub'); ?></p>
                </td>
            </tr>
            
            <tr>
                <td class="first">
                    <span class="dashicons dashicons-video-alt2 wp-ui-text-highlight"></span>
                    <label for="videoclub_video_embed"><?php _e('Video Embed', 'videoclub'); ?></label>
                </td>
                <td>
                    <textarea name="videoclub_video_embed" id="videoclub_video_embed" rows="5" cols="50"><?php echo esc_textarea($video_embed); ?></textarea>
                    <p class="description"><?php _e('Paste your video embed code here (iframe)', 'videoclub'); ?></p>
                </td>
            </tr>
            
            <tr>
                <td class="first">
                    <span class="dashicons dashicons-video-alt2 wp-ui-text-highlight"></span>
                    <label for="videoclub_original_name"><?php _e('Original Name', 'videoclub'); ?></label>
                </td>
                <td>
                    <textarea name="videoclub_original_name" id="videoclub_original_name" rows="3" cols="50"><?php echo esc_textarea($original_name); ?></textarea>
                    <p class="description"><?php _e('Enter the original title or name of the video', 'videoclub'); ?></p>
                </td>
            </tr>
            
            <tr>
                <td class="first">
                    <span class="dashicons dashicons-format-aside wp-ui-text-highlight"></span>
                    <label for="videoclub_description"><?php _e('Description', 'videoclub'); ?></label>
                </td>
                <td>
                    <textarea name="videoclub_description" id="videoclub_description" rows="10" cols="50"><?php echo esc_textarea($description); ?></textarea>
                    <p class="description"><?php _e('Enter detailed description of the video', 'videoclub'); ?></p>
                </td>
            </tr>
            
            <tr>
                <td class="first">
                    <span class="dashicons dashicons-download wp-ui-text-highlight"></span>
                    <label for="videoclub_download_link"><?php _e('Download Link', 'videoclub'); ?></label>
                </td>
                <td>
                    <input name="videoclub_download_link" type="url" id="videoclub_download_link" 
                           value="<?php echo esc_url($download_link); ?>" class="regular-text">
                    <p class="description"><?php _e('Enter download link for the video', 'videoclub'); ?></p>
                </td>
            </tr>
            
            <tr>
                <td class="first">
                    <span class="dashicons dashicons-download wp-ui-text-highlight"></span>
                    <label for="videoclub_movie_code_1"><?php _e('Movie Code 1', 'videoclub'); ?></label>
                </td>
                <td>
                    <input name="videoclub_movie_code_1" type="text" id="videoclub_movie_code_1" 
                           value="<?php echo esc_attr($movie_code_1); ?>" class="regular-text">
                    <p class="description"><?php _e('Enter movie code or identifier', 'videoclub'); ?></p>
                </td>
            </tr>
            
            <tr>
                <td class="first">
                    <span class="dashicons dashicons-download wp-ui-text-highlight"></span>
                    <label for="videoclub_movie_code_2"><?php _e('Movie Code 2', 'videoclub'); ?></label>
                </td>
                <td>
                    <input name="videoclub_movie_code_2" type="text" id="videoclub_movie_code_2" 
                           value="<?php echo esc_attr($movie_code_2); ?>" class="regular-text">
                    <p class="description"><?php _e('Enter additional movie code or identifier', 'videoclub'); ?></p>
                </td>
            </tr>
            
            <tr>
                <td class="first">
                    <span class="dashicons dashicons-download wp-ui-text-highlight"></span>
                    <label for="videoclub_movie_code_3"><?php _e('Movie Code 3', 'videoclub'); ?></label>
                </td>
                <td>
                    <input name="videoclub_movie_code_3" type="text" id="videoclub_movie_code_3" 
                           value="<?php echo esc_attr($movie_code_3); ?>" class="regular-text">
                    <p class="description"><?php _e('Enter additional movie code or identifier', 'videoclub'); ?></p>
                </td>
            </tr>
            
            <tr>
                <td class="first">
                    <span class="dashicons dashicons-video-alt2 wp-ui-text-highlight"></span>
                    <label for="videoclub_video_trailer"><?php _e('Video Trailer', 'videoclub'); ?></label>
                </td>
                <td>
                    <input name="videoclub_video_trailer" type="url" id="videoclub_video_trailer" 
                           value="<?php echo esc_url($video_trailer); ?>" class="regular-text">
                    <p class="description"><?php _e('Enter trailer video URL', 'videoclub'); ?></p>
                </td>
            </tr>
            
            <tr>
                <td class="first">
                    <span class="dashicons dashicons-admin-users wp-ui-text-highlight"></span>
                    <label for="videoclub_pornstars"><?php _e('Pornstars', 'videoclub'); ?></label>
                </td>
                <td>
                    <input name="videoclub_pornstars" type="text" id="videoclub_pornstars" 
                           value="<?php echo esc_attr($pornstars); ?>" class="regular-text">
                    <p class="description"><?php _e('Enter pornstar names separated by commas', 'videoclub'); ?></p>
                </td>
            </tr>
            
            <tr>
                <td class="first">
                    <span class="dashicons dashicons-format-image wp-ui-text-highlight"></span>
                    <label for="videoclub_image_url"><?php _e('Image URL', 'videoclub'); ?></label>
                </td>
                <td>
                    <input name="videoclub_image_url" type="url" id="videoclub_image_url" 
                           value="<?php echo esc_url($image_url); ?>" class="regular-text">
                    <p class="description"><?php _e('Enter custom image URL for the video', 'videoclub'); ?></p>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

// Save metabox data
function videoclub_save_metabox($post_id, $post, $update) {
    // Check if nonce is valid
    if (!isset($_POST['videoclub_metabox_nonce']) || !wp_verify_nonce($_POST['videoclub_metabox_nonce'], 'videoclub_metabox_nonce')) {
        return $post_id;
    }
    
    // Check if user has permissions
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    
    // Check if not an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    
    // Save metabox fields
    $fields = array(
        'videoclub_duration',
        'videoclub_video_embed',
        'videoclub_original_name',
        'videoclub_description',
        'videoclub_download_link',
        'videoclub_movie_code_1',
        'videoclub_movie_code_2',
        'videoclub_movie_code_3',
        'videoclub_video_trailer',
        'videoclub_pornstars',
        'videoclub_image_url'
    );
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $value = sanitize_text_field($_POST[$field]);
            if ($field === 'videoclub_video_embed' || $field === 'videoclub_original_name' || $field === 'videoclub_description') {
                $value = wp_kses_post($_POST[$field]);
            }
            update_post_meta($post_id, $field, $value);
        }
    }
}
add_action('save_post', 'videoclub_save_metabox', 10, 3);

// Helper function to get metabox value
function videoclub_get_meta($post_id, $key, $single = true) {
    return get_post_meta($post_id, $key, $single);
}

// Helper function to format duration
function videoclub_format_duration($seconds) {
    if (empty($seconds)) return '';
    
    // If already formatted, return as is
    if (strpos($seconds, ':') !== false) {
        return $seconds;
    }
    
    // Convert seconds to time format
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    $secs = $seconds % 60;
    
    if ($hours > 0) {
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $secs);
    } else {
        return sprintf('%02d:%02d', $minutes, $secs);
    }
}

/**
 * Generate structured data for pornstars (SEO)
 */
function videoclub_generate_pornstar_schema($post_id) {
    $pornstars = videoclub_get_meta($post_id, 'videoclub_pornstars');
    if (empty($pornstars)) return '';
    
    $pornstar_list = explode(',', $pornstars);
    $actors = array();
    
    foreach($pornstar_list as $pornstar) {
        $pornstar = trim($pornstar);
        if (!empty($pornstar)) {
            $actors[] = array(
                '@type' => 'Person',
                'name' => $pornstar
            );
        }
    }
    
    if (!empty($actors)) {
        return json_encode(array(
            '@context' => 'https://schema.org',
            '@type' => 'VideoObject',
            'actor' => $actors
        ));
    }
    
    return '';
}

/**
 * Add VideoClub meta description and keywords to head for SEO
 */
function videoclub_add_meta_seo() {
    if (is_single()) {
        global $post;
        
        // Add meta description from VideoClub description
        $description = videoclub_get_meta($post->ID, 'videoclub_description');
        if (!empty($description)) {
            // Clean description and limit to 160 characters
            $clean_description = wp_strip_all_tags($description);
            $clean_description = str_replace(array("\r", "\n", "\t"), ' ', $clean_description);
            $clean_description = preg_replace('/\s+/', ' ', trim($clean_description));
            
            // Limit to 160 characters for SEO
            if (strlen($clean_description) > 160) {
                $clean_description = substr($clean_description, 0, 157) . '...';
            }
            
            // Check if Yoast SEO is not already handling this
            $yoast_description = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
            if (empty($yoast_description)) {
                echo '<meta name="description" content="' . esc_attr($clean_description) . '">' . "\n";
            }
        }
        
        // Add meta keywords from pornstars
        $pornstars = videoclub_get_meta($post->ID, 'videoclub_pornstars');
        if (!empty($pornstars)) {
            // Get existing keywords from Yoast or other SEO plugins
            $keywords = get_post_meta($post->ID, '_yoast_wpseo_focuskw', true);
            
            // Add pornstars to keywords
            $pornstar_list = explode(',', $pornstars);
            $pornstar_keywords = array();
            foreach($pornstar_list as $pornstar) {
                $pornstar = trim($pornstar);
                if (!empty($pornstar)) {
                    $pornstar_keywords[] = $pornstar;
                }
            }
            
            if (!empty($pornstar_keywords)) {
                $all_keywords = $keywords ? $keywords . ', ' . implode(', ', $pornstar_keywords) : implode(', ', $pornstar_keywords);
                echo '<meta name="keywords" content="' . esc_attr($all_keywords) . '">' . "\n";
            }
        }
        
        // Add Open Graph meta tags
        $original_name = videoclub_get_meta($post->ID, 'videoclub_original_name');
        $image_url = videoclub_get_meta($post->ID, 'videoclub_image_url');
        $duration = videoclub_get_meta($post->ID, 'videoclub_duration');
        
        // Open Graph title
        $og_title = !empty($original_name) ? $original_name : get_the_title();
        echo '<meta property="og:title" content="' . esc_attr($og_title) . '">' . "\n";
        
        // Open Graph description
        if (!empty($description)) {
            $og_description = wp_strip_all_tags($description);
            $og_description = str_replace(array("\r", "\n", "\t"), ' ', $og_description);
            $og_description = preg_replace('/\s+/', ' ', trim($og_description));
            if (strlen($og_description) > 200) {
                $og_description = substr($og_description, 0, 197) . '...';
            }
            echo '<meta property="og:description" content="' . esc_attr($og_description) . '">' . "\n";
        }
        
        // Open Graph image
        if (!empty($image_url)) {
            echo '<meta property="og:image" content="' . esc_url($image_url) . '">' . "\n";
        }
        
        // Open Graph type
        echo '<meta property="og:type" content="video.movie">' . "\n";
        echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '">' . "\n";
        
        // Video duration for rich snippets
        if (!empty($duration) && is_numeric($duration)) {
            echo '<meta property="video:duration" content="' . esc_attr($duration) . '">' . "\n";
        }
    }
}
add_action('wp_head', 'videoclub_add_meta_seo', 1); // High priority to load early

/**
 * Modify page title for better SEO
 */
function videoclub_modify_title($title) {
    if (is_single() && in_the_loop()) {
        global $post;
        
        $original_name = videoclub_get_meta($post->ID, 'videoclub_original_name');
        $pornstars = videoclub_get_meta($post->ID, 'videoclub_pornstars');
        $duration = videoclub_get_meta($post->ID, 'videoclub_duration');
        
        // Use original name if available
        if (!empty($original_name)) {
            $title = $original_name;
        }
        
        // Add duration and pornstars for SEO
        $title_additions = array();
        
        if (!empty($duration)) {
            $formatted_duration = videoclub_format_duration($duration);
            if (!empty($formatted_duration)) {
                $title_additions[] = $formatted_duration;
            }
        }
        
        if (!empty($pornstars)) {
            $pornstar_list = explode(',', $pornstars);
            if (count($pornstar_list) == 1) {
                $title_additions[] = trim($pornstar_list[0]);
            } elseif (count($pornstar_list) <= 3) {
                $title_additions[] = implode(', ', array_map('trim', $pornstar_list));
            } else {
                $title_additions[] = trim($pornstar_list[0]) . ' & others';
            }
        }
        
        if (!empty($title_additions)) {
            $title .= ' - ' . implode(' - ', $title_additions);
        }
    }
    
    return $title;
}
add_filter('single_post_title', 'videoclub_modify_title', 10, 1);


