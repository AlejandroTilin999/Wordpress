<?php

/**
 * Template part for displaying footer layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constimes
 */

$footer_bg_img = get_theme_mod('constimes_footer_bg');
$constimes_footer_logo = get_theme_mod('constimes_footer_logo');
$constimes_copyright_center = $constimes_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
$constimes_footer_bg_url_from_page = function_exists('get_field') ? get_field('constimes_footer_bg') : '';
$constimes_footer_bg_color_from_page = function_exists('get_field') ? get_field('constimes_footer_bg_color') : '';
$footer_copyright_switch = get_theme_mod('footer_copyright_switch', false);

// bg image
$bg_img = !empty($constimes_footer_bg_url_from_page['url']) ? $constimes_footer_bg_url_from_page['url'] : $footer_bg_img;

$footer_columns = 0;
$footer_widgets = get_theme_mod('footer_widget_number', 4);

for ($num = 1; $num <= $footer_widgets; $num++) {
    if (is_active_sidebar('footer-' . $num)) {
        $footer_columns++;
    }
}

switch ($footer_columns) {
    case '1':
        $footer_class[1] = 'col-lg-12';
        break;
    case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
    case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;
    case '4':
        $footer_class[1] = 'col-md-6 col-lg-4 col-xl-3 order-1';
        $footer_class[2] = 'col-md-6 col-lg-4 col-xl-3 order-2';
        $footer_class[3] = 'col-md-6 col-lg-4 col-xl-3 order-2';
        $footer_class[4] = 'col-md-6 col-lg-12 col-xl-3 order-5';
        break;
    default:
        $footer_class = 'col-xl-3 col-lg-3 col-md-6';
        break;
}

?>

<!-- footer area start -->
<footer>
    <?php if ( is_active_sidebar('footer-3-1') OR is_active_sidebar('footer-3-2') OR is_active_sidebar('footer-3-3') OR is_active_sidebar('footer-3-4') ): ?>
    <div class="info-footer v3">
        <div class="shap" data-background="<?php print esc_attr($bg_img); ?>"></div>
        <div class="container">
            <div class="row">
            <?php
                if ( $footer_columns < 4 ) {
                print '<div class="col-md-6 col-xl-3">';
                dynamic_sidebar( 'footer-2-1' );
                print '</div>';

                print '<div class="col-md-6 col-xl-3">';
                dynamic_sidebar( 'footer-2-2' );
                print '</div>';

                print '<div class="col-md-6 col-xl-3">';
                dynamic_sidebar( 'footer-2-3' );
                print '</div>';

                print '<div class="col-md-6 col-xl-3">';
                dynamic_sidebar( 'footer-2-4' );
                print '</div>';
                } else {
                    for ( $num = 1; $num <= $footer_columns; $num++ ) {
                        if ( !is_active_sidebar( 'footer-3-' . $num ) ) {
                            continue;
                        }
                        print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                        dynamic_sidebar( 'footer-3-' . $num );
                        print '</div>';
                    }
                }
            ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="footer-main v3">
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