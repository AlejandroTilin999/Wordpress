<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package constimes
 */

get_header();
?>

<section class="theme-single-page page-404">
   <div class="container">
      <?php 
            $constimes_404_bg = get_theme_mod('constimes_404_bg',get_template_directory_uri() . '/assets/img/error/error.png');
            $constimes_error_title = get_theme_mod('constimes_error_title', __('Page not found', 'constimes'));
            $constimes_error_link_text = get_theme_mod('constimes_error_link_text', __('Back To Home', 'constimes'));
            $constimes_error_desc = get_theme_mod('constimes_error_desc', __('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'constimes'));
        ?>
        <div class="error-item">
           <div class="error-thumb">
              <img src="<?php echo esc_url($constimes_404_bg); ?>" alt="<?php print esc_attr__('Error 404','constimes'); ?>">
           </div>
           <div class="error-content">
             <h2 class="error-title"><?php print esc_html($constimes_error_title);?></h2>
             <p><?php print esc_html($constimes_error_desc);?></p>
             <a href="<?php print esc_url(home_url('/'));?>" class="link-anime v2"><?php print esc_html($constimes_error_link_text);?></a>
           </div>
        </div>
   </div>
</section>

<?php
get_footer();
