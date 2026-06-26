<?php
/**
 * constimes customizer
 *
 * @package constimes
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function constimes_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'constimes_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Constimes Customizer', 'constimes' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'section_header_logo', [
        'title'       => esc_html__( 'Header Setting', 'constimes' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'constimes_customizer',
    ] );

    $wp_customize->add_section( 'header_top_setting', [
        'title'       => esc_html__( 'Header Top Setting', 'constimes' ),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'constimes_customizer',
    ] );
    
    $wp_customize->add_section( 'header_social', [
        'title'       => esc_html__( 'Header Social', 'constimes' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'constimes_customizer',
    ] );

    $wp_customize->add_section( 'header_right_setting', [
        'title'       => esc_html__( 'Header Right Setting', 'constimes' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'constimes_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'constimes' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'constimes_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'constimes' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'constimes_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'constimes' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'constimes_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'constimes' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'constimes_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'constimes' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'constimes_customizer',
    ] );

    $wp_customize->add_section( 'global_setting', [
        'title'       => esc_html__( 'Global Setting', 'constimes' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'constimes_customizer',
    ] );
}

add_action( 'customize_register', 'constimes_customizer_panels_sections' );

/*
Header Settings
 */
function _constimes_header_settings_fields( $fields ) {
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Select Header Style', 'constimes' ),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__( 'Select an option...', 'constimes' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
            'header-style-3' => get_template_directory_uri() . '/inc/img/header/header-3.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'favicon_url',
        'label'       => esc_html__( 'Favicon', 'constimes' ),
        'description' => esc_html__( 'Upload Your Favicon', 'constimes' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/favicon.svg',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'constimes' ),
        'description' => esc_html__( 'Upload Your Logo.', 'constimes' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.svg',
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_constimes_header_settings_fields' );

/*
Header top
*/
function _constimes_header_top_fields( $fields ) {
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'constimes_topbar_switch',
        'label'    => esc_html__( 'Topbar Swicher', 'constimes' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];

    // phone
    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_phone_num',
        'label'    => esc_html__( 'Phone Number', 'constimes' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '234-567899', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'constimes_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    // email
    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_mail_id',
        'label'    => esc_html__( 'Mail ID', 'constimes' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'info@constimes.com', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'constimes_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];    

    // address
    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_address',
        'label'    => esc_html__( 'Address', 'constimes' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'Moon ave, New York, 2020 NY US', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'constimes_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];  
    
    // address url
    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_address_url',
        'label'    => esc_html__( 'Address URL', 'constimes' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'https://goo.gl/maps/qzqY2PAcQwUz1BYN9', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'constimes_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    return $fields;

}
add_filter( 'kirki/fields', '_constimes_header_top_fields' );

/*
Header Social
 */
function _constimes_header_social_fields( $fields ) {
        $fields[] = [
        'type'     => 'switch',
        'settings' => '$constimes_topbar_social_switch',
        'label'    => esc_html__( 'Topbar Social Swicher', 'constimes' ),
        'section'  => 'header_social',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];
    
    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_topbar_fb_url',
        'label'    => esc_html__( 'Facebook Url', 'constimes' ),
        'section'  => 'header_social',
        'default'  => esc_html__( 'https://facebook.com', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'constimes_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_topbar_twitter_url',
        'label'    => esc_html__( 'Twitter Url', 'constimes' ),
        'section'  => 'header_social',
        'default'  => esc_html__( 'https://twitter.com', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'constimes_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_topbar_instagram_url',
        'label'    => esc_html__( 'Instagram Url', 'constimes' ),
        'section'  => 'header_social',
        'default'  => esc_html__( 'https://instagram.com', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'constimes_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_topbar_linkedin_url',
        'label'    => esc_html__( 'Linkedin Url', 'constimes' ),
        'section'  => 'header_social',
        'default'  => esc_html__( 'https://linkedin.com', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'constimes_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];


    return $fields;
}
add_filter( 'kirki/fields', '_constimes_header_social_fields' );

/*
Header right
*/
function _constimes_header_right_fields( $fields ) {
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'constimes_right_contact_switch',
        'label'    => esc_html__( 'Header Right Swicher', 'constimes' ),
        'section'  => 'header_right_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];
    
    // header right phone heading
    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_right_phone_heading',
        'label'    => esc_html__( 'Header Right Phone Number Heading', 'constimes' ),
        'section'  => 'header_right_setting',
        'default'  => esc_html__( 'Need help?', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],
        ],
    ];
    
    // header right phone
    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_header_right_phone_num',
        'label'    => esc_html__( 'Header Right Phone Number', 'constimes' ),
        'section'  => 'header_right_setting',
        'default'  => esc_html__( '+234-567899', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],
        ],
    ];

    // button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_button_text',
        'label'    => esc_html__( 'Button Text', 'constimes' ),
        'section'  => 'header_right_setting',
        'default'  => esc_html__( 'Get A Quote', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-2',
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'constimes_button_link',
        'label'    => esc_html__( 'Button URL', 'constimes' ),
        'section'  => 'header_right_setting',
        'default'  => esc_html__( '#', 'constimes' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-2',
            ],
        ],
    ];

    return $fields;

}
add_filter( 'kirki/fields', '_constimes_header_right_fields' );

/*
Breadcrumb
 */
function _constimes_breadcrumb_fields( $fields ) {
    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__( 'Breadcrumb Background Image', 'constimes' ),
        'description' => esc_html__( 'Breadcrumb Background Image', 'constimes' ),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/page-title/page-title.jpg',
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_breadcrumb_bg_color',
        'label'       => __( 'Breadcrumb BG Color', 'constimes' ),
        'description' => esc_html__( 'This is a Breadcrumb bg color control.', 'constimes' ),
        'section'     => 'breadcrumb_setting',
        'default'     => '#f4f9fc',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_info_switch',
        'label'    => esc_html__( 'Breadcrumb Info switch', 'constimes' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_switch',
        'label'    => esc_html__( 'Breadcrumb Hide', 'constimes' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_constimes_breadcrumb_fields' );

/*
Blog
 */
function _constimes_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'constimes_blog_btn_switch',
        'label'    => esc_html__( 'Blog BTN On/Off', 'constimes' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'constimes_blog_cat',
        'label'    => esc_html__( 'Blog Category Meta On/Off', 'constimes' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'constimes_blog_author',
        'label'    => esc_html__( 'Blog Author Meta On/Off', 'constimes' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'constimes_blog_date',
        'label'    => esc_html__( 'Blog Date Meta On/Off', 'constimes' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'constimes_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta On/Off', 'constimes' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'constimes' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'constimes' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'constimes' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'constimes' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'constimes' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'constimes' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_constimes_blog_fields' );

/*
Footer
 */
function _constimes_footer_fields( $fields ) {
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'constimes' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'constimes' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2' => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
            'footer-style-3' => get_template_directory_uri() . '/inc/img/footer/footer-3.png',
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'constimes_footer_bg',
        'label'       => esc_html__( 'Footer Background Image.', 'constimes' ),
        'description' => esc_html__( 'Footer Background Image.', 'constimes' ),
        'section'     => 'footer_setting',
        'active_callback' => [
            [
                'setting'  => 'choose_default_footer',
                'operator' => '!=',
                'value'    => 'footer-style-2',
            ],
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_copyright',
        'label'    => esc_html__( 'Copyright', 'constimes' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Copyright &copy; 2023 Constimes. All Rights Reserved', 'constimes' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_constimes_footer_fields' );

// 404
function constimes_404_fields( $fields ) {
    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'constimes_404_bg',
        'label'       => esc_html__( '404 Image.', 'constimes' ),
        'description' => esc_html__( '404 Image.', 'constimes' ),
        'section'     => '404_page',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_error_title',
        'label'    => esc_html__( 'Not Found Title', 'constimes' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Page not found', 'constimes' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'constimes_error_desc',
        'label'    => esc_html__( '404 Description Text', 'constimes' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted', 'constimes' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'constimes_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'constimes' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'constimes' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'constimes_404_fields' );

// color
function constimes_color_fields( $fields ) {
    // primary color
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_primary_color_option',
        'label'       => __( 'Primary Color', 'constimes' ),
        'description' => esc_html__( 'This is a primary color control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#d38e25',
        'priority'    => 10,
    ];
    // primary color 2
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_primary_color_2_option',
        'label'       => __( 'Primary Color 2', 'constimes' ),
        'description' => esc_html__( 'This is a primary color 2 control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#ffba08',
        'priority'    => 10,
    ];
   
    // secondary color
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_secondary_color_option',
        'label'       => __( 'Secondary Color', 'constimes' ),
        'description' => esc_html__( 'This is a secondary color control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#616670',
        'priority'    => 10,
    ];
    // secondary color 2
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_secondary_color_2_option',
        'label'       => __( 'Secondary Color 2', 'constimes' ),
        'description' => esc_html__( 'This is a secondary color 2 control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#333f4d',
        'priority'    => 10,
    ];
    // secondary color 3
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_secondary_color_3_option',
        'label'       => __( 'Secondary Color 3', 'constimes' ),
        'description' => esc_html__( 'This is a secondary color 3 control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#0F3567',
        'priority'    => 10,
    ];
    // secondary color 4
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_secondary_color_4_option',
        'label'       => __( 'Secondary Color 4', 'constimes' ),
        'description' => esc_html__( 'This is a secondary color 4 control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#e3e3e3',
        'priority'    => 10,
    ];
     // other color
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_other_color_option',
        'label'       => __( 'Other Color', 'constimes' ),
        'description' => esc_html__( 'This is a other color control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#274975',
        'priority'    => 10,
    ];
     // other color 2
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_other_color_2_option',
        'label'       => __( 'Other Color', 'constimes' ),
        'description' => esc_html__( 'This is a other color 2 control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#0f3567',
        'priority'    => 10,
    ];
    // other color 3
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_other_color_3_option',
        'label'       => __( 'Other Color 3', 'constimes' ),
        'description' => esc_html__( 'This is a other color 3 control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#15222c',
        'priority'    => 10,
    ];
    // other color 4
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_other_color_4_option',
        'label'       => __( 'Other Color 4', 'constimes' ),
        'description' => esc_html__( 'This is a other color 4 control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#f8f8f8',
        'priority'    => 10,
    ];
    // other color 5
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_other_color_5_option',
        'label'       => __( 'Other Color 5', 'constimes' ),
        'description' => esc_html__( 'This is a other color 5 control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#2d947a',
        'priority'    => 10,
    ];
    // transparent color
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'constimes_transparent_color_option',
        'label'       => __( 'Other Color 6', 'constimes' ),
        'description' => esc_html__( 'This is a other color 6 control.', 'constimes' ),
        'section'     => 'color_setting',
        'default'     => '#transparent',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', 'constimes_color_fields' );

/**
 * Global
 */
function constimes_global_fields( $fields ) {
    // global settings
        $fields[] = [
        'type'     => 'switch',
        'settings' => 'constimes_preloader',
        'label'    => esc_html__( 'Preloader On/Off', 'constimes' ),
        'section'  => 'global_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'constimes_backtotop',
        'label'    => esc_html__( 'Back To Top On/Off', 'constimes' ),
        'section'  => 'global_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'constimes' ),
            'off' => esc_html__( 'Disable', 'constimes' ),
        ],
    ];
    
    return $fields;
}

add_filter( 'kirki/fields', 'constimes_global_fields' );

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function CONSTIMES_THEME_option( $name ) {
    $value = '';
    if ( class_exists( 'constimes' ) ) {
        $value = Kirki::get_option( constimes_get_theme(), $name );
    }

    return apply_filters( 'CONSTIMES_THEME_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function constimes_get_theme() {
    return 'constimes';
}