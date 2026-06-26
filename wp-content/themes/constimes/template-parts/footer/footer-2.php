<?php 

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constimes
*/

$constimes_footer_logo = get_theme_mod( 'constimes_footer_logo' );
$constimes_copyright_center = $constimes_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
$constimes_footer_bg_url_from_page = function_exists( 'get_field' ) ? get_field( 'constimes_footer_bg' ) : '';
$constimes_footer_bg_color_from_page = function_exists( 'get_field' ) ? get_field( 'constimes_footer_bg_color' ) : '';
$footer_bg_img = get_theme_mod('constimes_footer_bg');

// bg image
$bg_img = !empty( $constimes_footer_bg_url_from_page['url'] ) ? $constimes_footer_bg_url_from_page['url'] : $footer_bg_img;


// social link
$constimes_footer_fb_url = get_theme_mod( 'constimes_footer_fb_url', __( '#', 'constimes' ) );
$constimes_footer_instagram_url = get_theme_mod( 'constimes_footer_instagram_url', __( '#', 'constimes' ) );
$constimes_footer_twitter_url = get_theme_mod( 'constimes_footer_twitter_url', __( '#', 'constimes' ) );
$constimes_footer_linkedin_url = get_theme_mod( 'constimes_footer_linkedin_url', __( '#', 'constimes' ) );
?>

<!-- footer area start -->
<footer>
    <?php if ( is_active_sidebar('footer-2-1') OR is_active_sidebar('footer-2-2') OR is_active_sidebar('footer-2-3') OR is_active_sidebar('footer-2-4') ): ?>
    <div class="info-footer v1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <?php dynamic_sidebar( 'footer-2-1' ); ?>
                </div>
                <div class="col-md-6 col-xl-3">
                    <?php dynamic_sidebar( 'footer-2-2' ); ?>
                </div>
                <div class="col-md-6 col-xl-3">
                    <?php dynamic_sidebar( 'footer-2-3' ); ?>
                </div>
                <div class="col-md-6 col-xl-3">
                    <?php dynamic_sidebar( 'footer-2-4' ); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="footer-main v1">
        <div class="container">
            <div class="footer-content">
                <p><?php print constimes_copyright_text(); ?></p>
                <?php constimes_footer_menu(); ?>
            </div>
        </div>
    </div>
    <?php
        $constimes_backtotops = get_theme_mod( 'constimes_backtotop', false );
        if ( !empty( $constimes_backtotops ) ): ?>
        <!-- back to top start -->
            <button class="scroll-bottom-Top"><span class="my-icon icon-arrow-down"></span></button>
        <!-- back to top end -->
    <?php endif;?>
</footer>
