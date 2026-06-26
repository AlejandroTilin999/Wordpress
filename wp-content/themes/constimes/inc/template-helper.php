<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package constimes
 */

/** 
 *
 * constimes header
 */

function constimes_check_header() {
    $constimes_header_style = function_exists( 'get_field' ) ? get_field( 'header_style' ) : NULL;
    $constimes_default_header_style = get_theme_mod( 'choose_default_header', 'header-style-1' );
    
    if ( $constimes_header_style == 'header-style-1' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-1' );
    } 
    elseif ( $constimes_header_style == 'header-style-2' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-2' );
    }
    elseif ( $constimes_header_style == 'header-style-3' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-3' );
    }
    else {

        /** default header style **/
        if ( $constimes_default_header_style == 'header-style-3' ) {
            get_template_part( 'template-parts/header/header-3' );
        }
        elseif ( $constimes_default_header_style == 'header-style-2' ) {
            get_template_part( 'template-parts/header/header-2' );
        }
        else {
            get_template_part( 'template-parts/header/header-1' );
        }
    }

}
add_action( 'constimes_header_style', 'constimes_check_header', 10 );


// header logo
function constimes_header_logo() { ?>
    <?php
    
    $constimes_static_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
    $constimes_site_logo_from_customizer = get_theme_mod( 'logo', $constimes_static_logo );
    $constimes_site_logo_url_from_page = function_exists('get_field') ? get_field('constimes_header_logo') : '';

    $constimes_site_logo = !empty($constimes_site_logo_url_from_page['url']) ? $constimes_site_logo_url_from_page['url'] : $constimes_site_logo_from_customizer;
    
    if ( !empty( $constimes_site_logo ) ): ?>
        <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img src="<?php print esc_url( $constimes_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'constimes' );?>" />
        </a>
    <?php endif;
}

// header sticky logo
function constimes_header_sticky_logo() {?>
    <?php
        $constimes_logo_black = get_template_directory_uri() . '/assets/img/logo/logo-black.png';
        $constimes_secondary_logo = get_theme_mod( 'seconday_logo', $constimes_logo_black );
    ?>
      <a class="sticky-logo" href="<?php print esc_url( home_url( '/' ) );?>">
          <img src="<?php print esc_url( $constimes_secondary_logo );?>" alt="<?php print esc_attr__( 'logo', 'constimes' );?>" />
      </a>
    <?php
}

function constimes_mobile_logo() {
    // side info
    $constimes_mobile_logo_hide = get_theme_mod( 'constimes_mobile_logo_hide', false );

    $constimes_site_logo = get_theme_mod( 'logo', get_template_directory_uri() . '/assets/img/logo/logo.svg' );

    ?>

    <?php if ( !empty( $constimes_mobile_logo_hide ) ): ?>
    <div class="side__logo mb-25">
        <a class="sideinfo-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img src="<?php print esc_url( $constimes_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'constimes' );?>" />
        </a>
    </div>
    <?php endif;?>

<?php }

// favicon logo
function constimes_favicon_logo_func() {
    $constimes_static_favicon = get_template_directory_uri() . '/assets/img/logo/favicon.svg';
    $constimes_favicon_url_from_customizer = get_theme_mod( 'favicon_url', $constimes_static_favicon );
    $constimes_favicon_url_from_page = function_exists('get_field') ? get_field('constimes_custom_favicon') : '';

    $constimes_favicon = !empty($constimes_favicon_url_from_page['url']) ? $constimes_favicon_url_from_page['url'] : $constimes_favicon_url_from_customizer;
    
    
    // $favicon = rwmb_meta( 'favicon', array( 'size' => 'thumbnail' ) );
//   $favicon = $favicon ? $constimes_favicon_url_from_page['url'] : get_site_icon_url();

//   echo "<link rel='shortcut icon' href='$constimes_favicon' sizes='32x32' type='image/x-icon'>";
   
?>

<link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $constimes_favicon );?>">

<?php
}
add_action( 'wp_head', 'constimes_favicon_logo_func' );


/**
 * [constimes_header_social_profiles description]
 * @return [type] [description]
 */
function constimes_header_social_profiles() {
    $constimes_topbar_fb_url = get_theme_mod( 'constimes_topbar_fb_url', __( '#', 'constimes' ) );
    $constimes_topbar_twitter_url = get_theme_mod( 'constimes_topbar_twitter_url', __( '#', 'constimes' ) );
    $constimes_topbar_instagram_url = get_theme_mod( 'constimes_topbar_instagram_url', __( '#', 'constimes' ) );
    $constimes_topbar_linkedin_url = get_theme_mod( 'constimes_topbar_linkedin_url', __( '#', 'constimes' ) );
    $constimes_topbar_youtube_url = get_theme_mod( 'constimes_topbar_youtube_url', __( '#', 'constimes' ) );
    ?>
        <ul>
        <?php if ( !empty( $constimes_topbar_fb_url ) ): ?>
          <li><a href="<?php print esc_url( $constimes_topbar_fb_url );?>"><span><i class="fab fa-facebook-f"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $constimes_topbar_twitter_url ) ): ?>
            <li><a href="<?php print esc_url( $constimes_topbar_twitter_url );?>"><span><i class="fab fa-twitter"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $constimes_topbar_instagram_url ) ): ?>
            <li><a href="<?php print esc_url( $constimes_topbar_instagram_url );?>"><span><i class="fab fa-instagram"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $constimes_topbar_linkedin_url ) ): ?>
            <li><a href="<?php print esc_url( $constimes_topbar_linkedin_url );?>"><span><i class="fab fa-linkedin"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $constimes_topbar_youtube_url ) ): ?>
            <li><a href="<?php print esc_url( $constimes_topbar_youtube_url );?>"><span><i class="fab fa-youtube"></i></span></a></li>
        <?php endif;?>
        </ul>

<?php
}

function constimes_footer_social_profiles() {
    $constimes_footer_fb_url = get_theme_mod( 'constimes_footer_fb_url', __( '#', 'constimes' ) );
    $constimes_footer_twitter_url = get_theme_mod( 'constimes_footer_twitter_url', __( '#', 'constimes' ) );
    $constimes_footer_instagram_url = get_theme_mod( 'constimes_footer_instagram_url', __( '#', 'constimes' ) );
    $constimes_footer_linkedin_url = get_theme_mod( 'constimes_footer_linkedin_url', __( '#', 'constimes' ) );
    $constimes_footer_youtube_url = get_theme_mod( 'constimes_footer_youtube_url', __( '#', 'constimes' ) );
    ?>

        <ul>
        <?php if ( !empty( $constimes_footer_fb_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $constimes_footer_fb_url );?>">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $constimes_footer_twitter_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $constimes_footer_twitter_url );?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $constimes_footer_instagram_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $constimes_footer_instagram_url );?>">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $constimes_footer_linkedin_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $constimes_footer_linkedin_url );?>">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $constimes_footer_youtube_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $constimes_footer_youtube_url );?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif;?>
        </ul>
<?php
}

/**
 * [constimes_header_menu description]
 * @return [type] [description]
 */
function constimes_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'constimes_Navwalker_Class::fallback',
            'walker'         => new constimes_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [constimes_footer_menu description]
 * @return [type] [description]
 */
function constimes_footer_menu() {
    wp_nav_menu( [
        'theme_location' => 'footer-menu',
        'menu_class'     => 'm-0',
        'container'      => '',
        'fallback_cb'    => 'constimes_Navwalker_Class::fallback',
        'walker'         => new constimes_Navwalker_Class,
    ] );
}

/**
 *
 * constimes footer
 */
add_action( 'constimes_footer_style', 'constimes_check_footer', 10 );

function constimes_check_footer() {
    $constimes_footer_style = function_exists( 'get_field' ) ? get_field( 'footer_style' ) : NULL;
    $constimes_default_footer_style = get_theme_mod( 'choose_default_footer', 'footer-style-1' );

    if ( $constimes_footer_style == 'footer-style-1' ) {
        get_template_part( 'template-parts/footer/footer-1' );
    } 
    elseif ( $constimes_footer_style == 'footer-style-2' ) {
        get_template_part( 'template-parts/footer/footer-2' );
    }
    elseif ( $constimes_footer_style == 'footer-style-3' ) {
        get_template_part( 'template-parts/footer/footer-3' );
    }
    else {

        /** default footer style **/
        if ( $constimes_default_footer_style == 'footer-style-3' ) {
            get_template_part( 'template-parts/footer/footer-3' );
        }
        elseif ( $constimes_default_footer_style == 'footer-style-2' ) {
            get_template_part( 'template-parts/footer/footer-2' );
        } 
        else {
            get_template_part( 'template-parts/footer/footer-1' );
        }

    }
}

// constimes_copyright_text
function constimes_copyright_text() {
    
    if ( !empty(get_theme_mod( 'constimes_copyright')) ) {
        print 'Copyright &copy; '.date('Y'). ' '.get_theme_mod( 'constimes_copyright');
    } else {
        print 'Copyright &copy; '.date('Y'). ' Constimes, All Rights Reserved';
    }
}


/**
 *
 * pagination
 */
if ( !function_exists( 'constimes_pagination' ) ) {

    function _constimes_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function constimes_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];
        }

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _constimes_pagi_callback( $pagi );
    }
}


// header top bg color
function constimes_breadcrumb_bg_color() {
    $color_code = get_theme_mod( 'constimes_breadcrumb_bg_color', '#222' );
    wp_enqueue_style( 'constimes-custom', CONSTIMES_THEME_CSS_DIR . 'constimes-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style( 'constimes-breadcrumb-bg', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'constimes_breadcrumb_bg_color' );



// constimes_kses_intermediate
function constimes_kses_intermediate( $string = '' ) {
    return wp_kses( $string, constimes_get_allowed_html_tags( 'intermediate' ) );
}

function constimes_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function constimes_kses($raw){

   $allowed_tags = array(
      'a'                         => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'                      => array(
         'title' => array(),
      ),
      'b'                         => array(),
      'blockquote'                => array(
         'cite' => array(),
      ),
      'cite'                      => array(
         'title' => array(),
      ),
      'code'                      => array(),
      'del'                    => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'                     => array(),
      'div'                    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'                     => array(),
      'dt'                     => array(),
      'em'                     => array(),
      'h1'                     => array(),
      'h2'                     => array(),
      'h3'                     => array(),
      'h4'                     => array(),
      'h5'                     => array(),
      'h6'                     => array(),
      'i'                         => array(
         'class' => array(),
      ),
      'img'                    => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'                     => array(
         'class' => array(),
      ),
      'ol'                     => array(
         'class' => array(),
      ),
      'p'                         => array(
         'class' => array(),
      ),
      'q'                         => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'                      => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'                 => array(
         'width'         => array(),
         'height'     => array(),
         'scrolling'     => array(),
         'frameborder'   => array(),
         'allow'         => array(),
         'src'        => array(),
      ),
      'strike'                 => array(),
      'br'                     => array(),
      'strong'                 => array(),
      'data-wow-duration'            => array(),
      'data-wow-delay'            => array(),
      'data-wallpaper-options'       => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'                     => array(
         'class' => array(),
      ),
      'svg' => array(
           'class' => true,
           'aria-hidden' => true,
           'aria-labelledby' => true,
           'role' => true,
           'xmlns' => true,
           'width' => true,
           'height' => true,
           'viewbox' => true, // <= Must be lower case!
       ),
       'g'     => array( 'fill' => true ),
       'title' => array( 'title' => true ),
       'path'  => array( 'd' => true, 'fill' => true,  ),
      );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}