<?php
/**
 * Pornstar Tag Management for VideoClub Theme
 * Using WordPress built-in tags system
 *
 * @package videoclub
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add pornstar tags automatically when saving post
 */
function videoclub_auto_add_pornstar_tags($post_id, $post, $update) {
    // Check if it's an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check if user has permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Only for posts
    if ($post->post_type !== 'post') {
        return;
    }
    
    // Get pornstars from metabox
    $pornstars = get_post_meta($post_id, 'videoclub_pornstars', true);
    
    if (!empty($pornstars)) {
        // Convert pornstars to array
        $pornstar_list = explode(',', $pornstars);
        $tags_to_add = array();
        
        foreach ($pornstar_list as $pornstar) {
            $pornstar = trim($pornstar);
            if (!empty($pornstar)) {
                $tags_to_add[] = $pornstar;
            }
        }
        
        if (!empty($tags_to_add)) {
            // Add as tags (append to existing tags)
            wp_set_post_tags($post_id, $tags_to_add, true);
        }
    }
}
add_action('save_post', 'videoclub_auto_add_pornstar_tags', 20, 3);
