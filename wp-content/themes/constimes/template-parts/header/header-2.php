<?php 

	/**
	 * Template part for displaying header layout one
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package constimes
	*/

	// info
    $constimes_topbar_switch = get_theme_mod( 'constimes_topbar_switch', false );
    $constimes_slogan = get_theme_mod( 'constimes_slogan', __( 'Using user feedback to create a million dollar', 'constimes' ) );
    $constimes_phone_num = get_theme_mod( 'constimes_phone_num', __( '629-5550129', 'constimes' ) );
    $constimes_mail_id = get_theme_mod( 'constimes_mail_id', __( 'info@example.com', 'constimes' ) );
    $constimes_address = get_theme_mod( 'constimes_address', __( '6391 Elgin St. Celina, 10299', 'constimes' ) );
    $constimes_address_url = get_theme_mod( 'constimes_address_url', __( 'https://goo.gl/maps/qzqY2PAcQwUz1BYN9', 'constimes' ) );

   // social link
   $constimes_topbar_social_switch = get_theme_mod( '$constimes_topbar_social_switch', false );
   $constimes_topbar_fb_url = get_theme_mod( 'constimes_topbar_fb_url', __( 'https://facebook.com', 'constimes' ) );
   $constimes_topbar_instagram_url = get_theme_mod( 'constimes_topbar_instagram_url', __( 'https://instagram.com', 'constimes' ) );
   $constimes_topbar_twitter_url = get_theme_mod( 'constimes_topbar_twitter_url', __( 'https://twitter.com', 'constimes' ) );
   $constimes_topbar_linkedin_url = get_theme_mod( 'constimes_topbar_linkedin_url', __( 'https://linkedin.com', 'constimes' ) );

    // header right
    $constimes_right_contact_switch = get_theme_mod( 'constimes_right_contact_switch', false );
	$constimes_button_text = get_theme_mod( 'constimes_button_text', __( 'Get a Quote', 'constimes' ) );
    $constimes_button_link = get_theme_mod( 'constimes_button_link', __( '#', 'constimes' ) );
?>

<!-- header area start -->
<header>
<!-- Top Bar Start -->
<?php if ( !empty( $constimes_topbar_switch ) ): ?>

   <div class="top-bar v1">
      <div class="container">
         <div class="top-bar-content">
            <div class="info-link">
               <ul>
               <?php if ( !empty( $constimes_phone_num ) ): ?>
                  <li><span class="my-icon icon-call"></span>
                        <p><a href="tel:<?php echo esc_attr(str_replace(' ', '-', $constimes_phone_num)); ?>"><?php echo constimes_kses($constimes_phone_num); ?></a></p>
                  </li>
               <?php endif; ?>
               <?php if ( !empty( $constimes_mail_id ) ): ?>	
                  <li><span class="my-icon icon-envelope"></span>
                        <p><a href="mailto:<?php echo esc_attr($constimes_mail_id); ?>"><?php echo esc_html($constimes_mail_id); ?></a></p>
                  </li>
               <?php endif; ?>
               <?php if ( !empty( $constimes_address ) ): ?>
                  <li><span class="my-icon icon-location"></span>
                        <p><a href="<?php echo esc_html($constimes_address_url); ?>" target="_blank"><?php echo esc_html($constimes_address); ?></a></p>
                  </li>
               <?php endif; ?>
               </ul>
            </div>
            <?php if ( !empty( $constimes_topbar_social_switch ) ): ?>
            <div class="social-link">
            <?php if ( !empty( $constimes_topbar_fb_url ) OR !empty( $constimes_topbar_instagram_url ) OR !empty( $constimes_topbar_twitter_url ) OR !empty( $constimes_topbar_linkedin_url )): ?>
               <ul>
               <?php if ( !empty( $constimes_topbar_fb_url ) ): ?>
                  <li><a href="<?php echo esc_html($constimes_topbar_fb_url); ?>"><span class="my-icon icon-facebook"></span></a></li>
               <?php endif; ?>
               <?php if ( !empty( $constimes_topbar_instagram_url ) ): ?>
                  <li><a href="<?php echo esc_html($constimes_topbar_instagram_url); ?>"><span class="my-icon icon-instagram"></span></a></li>
               <?php endif; ?>
               <?php if ( !empty( $constimes_topbar_twitter_url ) ): ?>
                  <li><a href="<?php echo esc_html($constimes_topbar_twitter_url); ?>"><span class="my-icon icon-twitter"></span></a></li>
               <?php endif; ?>
               <?php if ( !empty( $constimes_topbar_linkedin_url ) ): ?>
                  <li><a href="<?php echo esc_html($constimes_topbar_linkedin_url); ?>"><span class="my-icon icon-linkedin"></span></a></li>
               <?php endif; ?>
               </ul>
            <?php endif; ?>
            </div>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <!-- Top Bar End -->
   <!-- Menu Bar Start -->
   <div class="menu-bar v1">
      <div class="container">
         <div class="menu-bar-content">
            <div class="menu-logo">
               <?php constimes_header_logo(); ?>
            </div>
            <nav class="main-menu">
               <?php constimes_header_menu(); ?>
            </nav>
            <?php if ( !empty( $constimes_right_contact_switch ) ): ?>
                <?php if ( !empty( $constimes_button_text ) ): ?>
                <div class="right-btn">
                   <a href="<?php echo esc_html($constimes_button_link); ?>" class="link-anime v2"><?php echo esc_html($constimes_button_text); ?></a>
                </div>
                <?php endif; ?>
            <?php endif; ?>
            <button class="mobile-menu-btn">
                  <span></span>
                  <span></span>
                  <span></span>
            </button>
         </div>
      </div>
   </div>
   <!-- Menu Bar End -->
</header>
<!-- header area end -->
