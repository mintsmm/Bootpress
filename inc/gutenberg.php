<?php

/**
 * Enqueue scripts and styles of your Gutenberg blocks
 * @package Bootpress
 */

 add_action('init', 'gutenberg_enqueue');
 function gutenberg_enqueue()
 {
     wp_register_script('gutenberg-bootpress', get_template_directory_uri() . '/assets/dist/js/gutenberg.js', array( 'wp-blocks', 'wp-element', 'wp-editor' ));

     register_block_type('gutenberg-bootpress/bootpress-cta', array(
        'editor_script' => 'gutenberg-bootpress', // Load script in the editor
    ));
 }

/**
 * Enqueue scripts and styles of your Gutenberg blocks in the editor
 * @package Bootpress
 */

 add_action('enqueue_block_assets', 'gutenberg_assets');
 function gutenberg_assets()
 {
     wp_enqueue_style('gutenberg-bootpress-cta', get_template_directory_uri() . '/assets/dist/css/gutenberg.css', null);
 }
