<?php

/**
 * constimes_scripts description
 * @return [type] [description]
 */
function constimes_scripts() {

    
    // google fonts
    wp_enqueue_style('googlFonts', 'https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Rubik:wght@400;500;600;700&display=swap', array(), null);

    // all css
    wp_enqueue_style( 'font-awesome', CONSTIMES_THEME_CSS_DIR.'font-awesome.css', array() );
    wp_enqueue_style( 'constimes-fonts', constimes_fonts_url(), array(), time() );
    wp_enqueue_style( 'bootstrap', CONSTIMES_THEME_CSS_DIR.'bootstrap.min.css', array() );
    wp_enqueue_style( 'constimes-myicon', CONSTIMES_THEME_CSS_DIR . 'constimes-customicon.css', [], time() );
    wp_enqueue_style( 'constimes-plugins', CONSTIMES_THEME_CSS_DIR . 'plugins.css', [], time() );
    wp_enqueue_style( 'constimes-core', CONSTIMES_THEME_CSS_DIR . 'constimes-core.css', [], time() );
    wp_enqueue_style( 'constimes-home-3', CONSTIMES_THEME_CSS_DIR . 'constimes-home-3.css', [], time() );
    wp_enqueue_style( 'constimes-responsive', CONSTIMES_THEME_CSS_DIR . 'constimes-responsive.css', [], time() );
    wp_enqueue_style( 'constimes-style', get_stylesheet_uri() );

    // all js
    wp_enqueue_script( 'bootstrap', CONSTIMES_THEME_JS_DIR . 'bootstrap.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'plugin', CONSTIMES_THEME_JS_DIR . 'plugins.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'constimes-main', CONSTIMES_THEME_JS_DIR . 'constimes-main.js', [ 'jquery' ], time(), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'constimes_scripts' );

/*
Register Fonts
 */
function constimes_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'constimes' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap';
    }
    return $font_url;
}