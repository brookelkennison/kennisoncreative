<?php
if (!is_admin()) {
    wp_enqueue_style('lilac_pig_main_styles', get_theme_file_uri('/build/index.css'));
}
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');

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
    $wp_customize->add_section(
        'main_section_options',
        array(
            'title' => __('Main Section', 'main_section')
        )
    );

    $wp_customize->add_setting(
        'main_section_image',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'transport'  => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'main_call_to_action_header',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'transport'  => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'main_image',
            array(
                'label' => __('Main Image', 'main_section'),
                'settings' => 'main_section_image',
                'section' => 'main_section_options'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'main_text_header',
            array(
                'label'    => __('Call to Action Header', 'main_section'),
                'section'  => 'main_section_options',
                'settings' => 'main_call_to_action_header',
                'type'     => 'text'
            )
        )
    );

    $wp_customize->add_setting(
        'main_call_to_action_text',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'transport'  => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'main_text_body',
            array(
                'label'    => __('Call to Action Text', 'main_section'),
                'section'  => 'main_section_options',
                'settings' => 'main_call_to_action_text',
                'type'     => 'text'
            )
        )
    );
}

add_action('customize_register', 'wordpress_customizer');
