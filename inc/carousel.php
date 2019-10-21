<?php

/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function bootpress_custom_carousel_post_type() {
    $labels = array(
        'name'                  => _x( 'Carousels', 'Post type general name', 'bootpress' ),
        'singular_name'         => _x( 'Carousel', 'Post type singular name', 'bootpress' ),
        'menu_name'             => _x( 'Carousels', 'Admin Menu text', 'bootpress' ),
        'name_admin_bar'        => _x( 'Carousel', 'Add New on Toolbar', 'bootpress' ),
        'add_new'               => __( 'Add New', 'bootpress' ),
        'add_new_item'          => __( 'Add New Carousel', 'bootpress' ),
        'new_item'              => __( 'New Carousel', 'bootpress' ),
        'edit_item'             => __( 'Edit Carousel', 'bootpress' ),
        'view_item'             => __( 'View Carousel', 'bootpress' ),
        'all_items'             => __( 'All Carousel', 'bootpress' ),
        'search_items'          => __( 'Search Carousel', 'bootpress' ),
        'parent_item_colon'     => __( 'Parent Carousel:', 'bootpress' ),
        'not_found'             => __( 'No Carousel found.', 'bootpress' ),
        'not_found_in_trash'    => __( 'No Carousel found in Trash.', 'bootpress' ),
        'featured_image'        => _x( 'Carousel Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'bootpress' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'bootpress' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'bootpress' ),
        'archives'              => _x( 'Carousel archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'bootpress' ),
        'insert_into_item'      => _x( 'Insert into Carousel', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'bootpress' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Carousel', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'bootpress' ),
        'filter_items_list'     => _x( 'Filter Carousel list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'bootpress' ),
        'items_list_navigation' => _x( 'Carousel list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'bootpress' ),
        'items_list'            => _x( 'Carousel list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'bootpress' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
 
    register_post_type( 'book', $args );
}
 
add_action( 'init', 'bootpress_custom_carousel_post_type' );