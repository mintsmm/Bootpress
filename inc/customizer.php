<?php
/**
 * Bootpress Theme Customizer
 *
 * @package Bootpress
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bootpress_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'bootpress_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'bootpress_customize_partial_blogdescription',
        ));
    }

    // Create our panels

    $wp_customize->add_panel('bootpress_layout_panel', array(
        'title'          => __('Layouts', 'bootpress'),
    ));

    // Create our sections

    $wp_customize->add_section('bootpress_footer_section', array(
        'title'             => __('Footer', 'bootpress'),
        'panel'             => 'bootpress_layout_panel',
    ));

    // Create our settings

    $wp_customize->add_setting('bootpress_footer_text', array(
        'default'       => 'proudly_powered_by_wordpress_theme_bootpress_by_tristan_elliott',
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('bootpress_footer_text_control', array(
        'label'      => __('Footer Copyright', 'bootpress'),
        'section'    => 'bootpress_footer_section',
        'settings'   => 'bootpress_footer_text',
        'type'       => 'textarea',
    ));
}
add_action('customize_register', 'bootpress_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bootpress_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bootpress_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bootpress_customize_preview_js()
{
    wp_enqueue_script('bootpress-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true);
}
add_action('customize_preview_init', 'bootpress_customize_preview_js');
