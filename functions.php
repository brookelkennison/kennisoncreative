<?php
wp_enqueue_style('lilac_pig_main_styles', get_theme_file_uri('/build/index.css'));
add_theme_support('custom-logo');

function register_my_menus()
{
    register_nav_menus(
        array(
            'nav-menu-left' => __('Navigation Menu Left'),
            'nav-menu-right' => __('Navigation Menu Right')
        )
    );
}
add_action('init', 'register_my_menus');

function wordpress_customizer($wp_customize)
{
    $wp_customize->add_setting('diwp_logo', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));

    $wp_customize->add_section('brand_logo', array(
        'title'      => __('Brand Logo', 'mytheme'),
        'priority' => 30,
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'diwp_logo_control', array(
        'label' => 'Upload Logo',
        'priority' => 20,
        'section' => 'brand_logo',
        'settings' => 'diwp_logo',
        'button_labels' => array( // All These labels are optional
            'select' => 'Select Logo',
            'remove' => 'Remove Logo',
            'change' => 'Change Logo',
        )
    )));
}

add_action('customize_register', 'wordpress_customizer');
