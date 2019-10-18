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

    $wp_customize->add_section('bootpress_navbar_section', array(
        'title'             => __('Navigation', 'bootpress'),
        'panel'             => 'bootpress_layout_panel',
    ));

    $wp_customize->add_section('bootpress_navbar_sidebar', array(
        'title'             => __('Sidebar', 'bootpress'),
        'panel'             => 'bootpress_layout_panel',
    ));

    // Create our settings

    $wp_customize->add_setting('bootpress_footer_text', array(
        'default'       => 'proudly_powered_by_wordpress_theme_bootpress_by_tristan_elliott',
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
        'priority'   => 20,
    ));
    $wp_customize->add_control('bootpress_footer_text_control', array(
        'label'      => __('Footer Copyright', 'bootpress'),
        'section'    => 'bootpress_footer_section',
        'settings'   => 'bootpress_footer_text',
        'type'       => 'textarea',
        'priority'   => 20,
    ));

    $wp_customize->add_setting('bootpress_footer_background', array(
        'default'       => 'bg-dark',
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
        'priority'   => 10,
    ));
    $wp_customize->add_control('bootpress_footer_background_control', array(
        'label'      => __('Footer Background Color', 'bootpress'),
        'section'    => 'bootpress_footer_section',
        'settings'   => 'bootpress_footer_background',
        'priority'   => 10,
        'type'       => 'select',
            'choices'    => array(
              'bg-primary' => __('Primary', 'bootpress'),
              'bg-secondary' => __('Secondary', 'bootpress'),
              'bg-success' => __('Success', 'bootpress'),
              'bg-warning' => __('Warning', 'bootpress'),
              'bg-danger' => __('Danger', 'bootpress'),
              'bg-info' => __('Info', 'bootpress'),
              'bg-dark' => __('Dark', 'bootpress'),
              'bg-light' => __('Light', 'bootpress'),
            ),
    ));

    $wp_customize->add_setting('bootpress_footer_text_color', array(
        'default'       => 'text-light',
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
        'priority'   => 10,
    ));
    $wp_customize->add_control('bootpress_footer_text_color_control', array(
        'label'      => __('Footer Text Color', 'bootpress'),
        'section'    => 'bootpress_footer_section',
        'settings'   => 'bootpress_footer_text_color',
        'priority'   => 10,
        'type'       => 'select',
            'choices'    => array(
              'text-primary' => __('Primary', 'bootpress'),
              'text-secondary' => __('Secondary', 'bootpress'),
              'text-success' => __('Success', 'bootpress'),
              'text-warning' => __('Warning', 'bootpress'),
              'text-danger' => __('Danger', 'bootpress'),
              'text-info' => __('Info', 'bootpress'),
              'text-dark' => __('Dark', 'bootpress'),
              'text-light' => __('Light', 'bootpress'),
            ),
    ));

    $wp_customize->add_setting('bootpress_navbar_background', array(
        'default'       => 'bg-dark',
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('bootpress_navbar_background_control', array(
        'label'      => __('Navbar Background Color', 'bootpress'),
        'section'    => 'bootpress_navbar_section',
        'settings'   => 'bootpress_navbar_background',
        'type'       => 'select',
            'choices'    => array(
              'bg-primary' => __('Primary', 'bootpress'),
              'bg-secondary' => __('Secondary', 'bootpress'),
              'bg-success' => __('Success', 'bootpress'),
              'bg-warning' => __('Warning', 'bootpress'),
              'bg-danger' => __('Danger', 'bootpress'),
              'bg-info' => __('Info', 'bootpress'),
              'bg-dark' => __('Dark', 'bootpress'),
              'bg-light' => __('Light', 'bootpress'),
            ),
    ));

    $wp_customize->add_setting('bootpress_navbar_text_color', array(
        'default'       => 'navbar-dark',
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('bootpress_navbar_text_color_control', array(
        'label'      => __('Navbar Background Color', 'bootpress'),
        'section'    => 'bootpress_navbar_section',
        'settings'   => 'bootpress_navbar_text_color',
        'type'       => 'select',
            'choices'    => array(
              'navbar-dark' => __('Dark', 'bootpress'),
              'navbar-light' => __('Light', 'bootpress'),
            ),
    ));

    $wp_customize->add_setting('bootpress_navbar_shadow', array(
        'default'       => 'shadow-none',
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('bootpress_navbar_shadow_control', array(
        'label'      => __('Navbar Shadow', 'bootpress'),
        'section'    => 'bootpress_navbar_section',
        'settings'   => 'bootpress_navbar_shadow',
        'type'       => 'select',
            'choices'    => array(
              'shadow-none' => __('No Shadow', 'bootpress'),
              'shadow-lg' => __('Large Shadow', 'bootpress'),
              'shadow-sm' => __('Small Shadow', 'bootpress'),
              'shadow' => __('Regular Shadow', 'bootpress'),
            ),
    ));

    $wp_customize->add_setting('bootpress_navbar_sidebar_col', array(
        'default'       => 'col-lg-3',
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('bootpress_navbar_sidebar_control', array(
        'label'      => __('Columns', 'bootpress'),
        'section'    => 'bootpress_navbar_sidebar',
        'settings'   => 'bootpress_navbar_sidebar_col',
        'type'       => 'select',
            'choices'    => array(
              'col-lg-1' => __('Column 1', 'bootpress'),
              'col-lg-2' => __('Column 2', 'bootpress'),
              'col-lg-3' => __('Column 3', 'bootpress'),
              'col-lg-4' => __('Column 4', 'bootpress'),
              'col-lg-5' => __('Column 5', 'bootpress'),
              'col-lg-6' => __('Column 6', 'bootpress'),
              'col-lg-7' => __('Column 7', 'bootpress'),
              'col-lg-8' => __('Column 8', 'bootpress'),
              'col-lg-9' => __('Column 9', 'bootpress'),
              'col-lg-10' => __('Column 10', 'bootpress'),
              'col-lg-11' => __('Column 11', 'bootpress'),
              'col-lg-12' => __('Column 12', 'bootpress'),
            ),
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
