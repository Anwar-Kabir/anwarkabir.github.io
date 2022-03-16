<?php
/**
 * Shopay Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shopay
 * @subpackage Shopay Store
 * @since 1.0.0
 */

/**
 * Set the theme version, based on theme stylesheet.
 *
 * @global string $shopay_store_version
 */
function shopay_store_theme_version_info() {
    $shopay_store_theme_info = wp_get_theme();
    $GLOBALS['shopay_store_version'] = $shopay_store_theme_info->get( 'Version' );
}
add_action( 'after_setup_theme', 'shopay_store_theme_version_info' );

/*--------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 */

function shopay_store_scripts() {
    global $shopay_store_version;
    wp_dequeue_style( 'shopay-style' );
    wp_dequeue_style( 'shopay-responsive-style' );
    wp_enqueue_style( 'shopay-store-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $shopay_store_version ) );

    wp_enqueue_style( 'shopay-store-parent-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), esc_attr( $shopay_store_version ) );
    wp_enqueue_style( 'shopay-store-fonts', shopay_store_fonts_url(), array(), null );
    wp_enqueue_style( 'shopay-store-style', get_stylesheet_uri(), array(), esc_attr( $shopay_store_version ) );
}

add_action( 'wp_enqueue_scripts', 'shopay_store_scripts', 99 );

if ( ! function_exists( 'shopay_store_fonts_url' ) ) :
    
    /**
     * Register Google fonts for Shopay Store.
     *
     * @return string Google fonts URL for the theme.
     * @since 1.0.0
     */

    function shopay_store_fonts_url() {
        $fonts_url = '';
        $font_families = array();

        /**
         * Translators: If there are characters in your language that are not supported
         * by Muli font, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Khula font: on or off', 'shopay-store' ) ) {
            $font_families[] = 'Khula:400,700';
        }

        /**
         * Translators: If there are characters in your language that are not supported
         * by Roboto font, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'shopay-store' ) ) {
            $font_families[] = 'Roboto:400,500,700';
        }

        if ( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }
        return $fonts_url;
    }

endif;

/**
 * Require dynamic style file
 *
 */
require get_stylesheet_directory() . '/inc/mt-theme-settings.php';
require get_stylesheet_directory() . '/inc/dynamic-styles.php';
require get_stylesheet_directory() . '/inc/customizer.php';
require get_stylesheet_directory() . '/inc/widgets/widgets-functions.php';