<?php
/**
 * Plugin Name: Open Graph Meta Tags
 * Description: Adds Open Graph meta tags to your website for proper sharing on social media platforms.
 * Version: 1.0
 * Author: Naveenkumar C
 * Author URI: https://cnaveenkumar.wordpress.com
 */

function add_opengraph_tags() {
    if (is_single()) {
        global $post;

        // Get the featured image of the post
        $thumbnail_src = get_the_post_thumbnail_url($post->ID, 'full');

        // Get the title and excerpt of the post
        $post_title = get_the_title();
        $post_excerpt = get_the_excerpt();

        // Output Open Graph meta tags in the head of the page
        echo '<meta property="og:title" content="' . esc_attr($post_title) . '">';
        echo '<meta property="og:description" content="' . esc_attr($post_excerpt) . '">';
        echo '<meta property="og:image" content="' . esc_url($thumbnail_src) . '">';

        // Output Twitter Card meta tags for proper sharing on Twitter
        echo '<meta name="twitter:card" content="summary_large_image">';
        echo '<meta name="twitter:title" content="' . esc_attr($post_title) . '">';
        echo '<meta name="twitter:description" content="' . esc_attr($post_excerpt) . '">';
        echo '<meta name="twitter:image" content="' . esc_url($thumbnail_src) . '">';
    }
}
add_action('wp_head', 'add_opengraph_tags');
