<?php

/**
 * Template part for displaying footer layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constimes
 */
 
$footer_bg_img = get_theme_mod('constimes_footer_bg');
$constimes_footer_bg_url_from_page = function_exists('get_field') ? get_field('constimes_footer_bg') : '';
$constimes_footer_bg_color_from_page = function_exists('get_field') ? get_field('constimes_footer_bg_color') : '';

// bg image
$bg_img = !empty($constimes_footer_bg_url_from_page['url']) ? $constimes_footer_bg_url_from_page['url'] : $footer_bg_img;
?>

<!-- footer area start -->
<footer>
    <?php if (is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4')) : ?>
        <div class="info-footer v2" data-background="<?php print esc_attr($bg_img); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-3 order-1">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 order-3">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 order-2">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-3 order-5">
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="footer-main v2">
        <div class="container">
            <?php if (has_nav_menu('footer-menu')):?>
                <div class="footer-content">
                    <p><?php print constimes_copyright_text(); ?></p>
                    <?php constimes_footer_menu(); ?>
                </div>
            <?php else :?>
                <div class="footer-content justify-content-center">
                    <p><?php print constimes_copyright_text(); ?></p>
                </div>
            <?php  endif ?>
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