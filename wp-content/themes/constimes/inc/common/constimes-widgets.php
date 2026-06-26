<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function constimes_widgets_init() {

    /**
     * blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'constimes' ),
        'id'            => 'blog-sidebar',
        'description'          => esc_html__( 'Set Your Blog Widget', 'constimes' ),
        'before_widget' => '<div id="%1$s" class="sidebar__widget mb-60 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="sidebar__widget-head mb-35"><h3 class="sidebar__widget-title">',
        'after_title'   => '</h3></div>',
    ] );


    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // footer default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer %1$s', 'constimes' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer column %1$s', 'constimes' ), $num ),
            'before_widget' => '<div id="%1$s" class="footer__widget footer-default-widget footer-col-'.$num.' mb-40 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="footer__widget-title">',
            'after_title'   => '</h4>',
        ] );
    }

    // footer 2
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {

        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'constimes' ), $num ),
            'id'            => 'footer-2-' . $num,
            'description'   => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'constimes' ), $num ),
            'before_widget' => '<div id="%1$s" class="footer__widget footer-default-widget footer__widget-2 footer-col-2-'.$num.' mb-40 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="footer__widget-title">',
            'after_title'   => '</h4>',
        ] );
    }
    
    // footer 3
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {

        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'constimes' ), $num ),
            'id'            => 'footer-3-' . $num,
            'description'   => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'constimes' ), $num ),
            'before_widget' => '<div id="%1$s" class="footer__widget footer-default-widget footer__widget-3 footer-col-3-'.$num.' mb-40 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="footer__widget-title">',
            'after_title'   => '</h4>',
        ] );
    }

}
add_action( 'widgets_init', 'constimes_widgets_init' );