<?php 

	/**
	 * Template part for displaying header layout two
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package constimes
	*/

	// info
    $constimes_topbar_switch = get_theme_mod( 'constimes_topbar_switch', false );
    $constimes_phone_num = get_theme_mod( 'constimes_phone_num', __( '629-5550129', 'constimes' ) );
    $constimes_mail_id = get_theme_mod( 'constimes_mail_id', __( 'info@educal.com', 'constimes' ) );
    $constimes_address = get_theme_mod( 'constimes_address', __( 'Moon ave, New York, 2020 NY US', 'constimes' ) );
    $constimes_address_url = get_theme_mod( 'constimes_address_url', __( 'https://goo.gl/maps/qzqY2PAcQwUz1BYN9', 'constimes' ) );

   // social link
   $constimes_topbar_fb_url = get_theme_mod( 'constimes_topbar_fb_url', __( 'https://facebook.com', 'constimes' ) );
   $constimes_topbar_instagram_url = get_theme_mod( 'constimes_topbar_instagram_url', __( 'https://instagram.com', 'constimes' ) );
   $constimes_topbar_twitter_url = get_theme_mod( 'constimes_topbar_twitter_url', __( 'https://twitter.com', 'constimes' ) );
   $constimes_topbar_linkedin_url = get_theme_mod( 'constimes_topbar_linkedin_url', __( 'https://linkedin.com', 'constimes' ) );

    // header right phone
    $constimes_header_right_phone_num = get_theme_mod( 'constimes_header_right_phone_num', __( '629-5550129', 'constimes' ) );

    // header right
    $constimes_search = get_theme_mod( 'constimes_search', false );
    $constimes_header_right = get_theme_mod( 'constimes_header_right', false );
    $constimes_menu_col = $constimes_header_right ? 'col-xxl-7 col-xl-7 col-lg-8 d-none d-lg-block' : 'col-xxl-10 col-xl-10 col-lg-9 d-none d-lg-block text-end';

?>

<header>
   <!-- Top Bar Start -->
   <?php if ( !empty( $constimes_topbar_switch ) ): ?>
   <div class="top-bar v3">
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
         </div>
      </div>
   </div>
   <?php endif; ?>
   <!-- Top Bar End -->
   <!-- Menu Bar Start -->
   <div class="menu-bar v3">
      <div class="container">
         <div class="menu-bar-content">
            <div class="menu-logo">
            <?php constimes_header_logo(); ?>
            </div>
            <nav class="main-menu">
            <?php constimes_header_menu();?>
            </nav>
            <?php if ( !empty( $constimes_header_right_phone_num ) ): ?>
            <div class="right-contact">
               <div class="my-icon icon-call">
               </div>
               <div class="text-content">
                  <p><?php echo esc_html__( 'Need help?', 'constimes' );?></p>
                  <h4><a href="tel:<?php echo esc_attr(str_replace(' ', '-', $constimes_header_right_phone_num)); ?>"><?php echo constimes_kses($constimes_header_right_phone_num); ?></a></h4>
               </div>
            </div>
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
