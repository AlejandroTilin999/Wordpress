<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constimes
 */

$constimes_blog_btn = get_theme_mod( 'constimes_blog_btn', 'Read More' );
$constimes_blog_btn_switch = get_theme_mod( 'constimes_blog_btn_switch', true );

?>

<?php if ( !empty( $constimes_blog_btn_switch ) ): ?>
<div class="postbox__read-more">
    <a href="<?php the_permalink();?>" class="link-anime v2"><?php print esc_html( $constimes_blog_btn );?><span class="my-icon icon-arrow-right"></span></a>
</div>
<?php endif;?>