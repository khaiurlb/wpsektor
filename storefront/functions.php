<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version'    => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
	$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

	require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
	require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */












//  Add Action Hook
add_action('woocommerce_before_main_content','kb_wc_output_content_wrapper',10);
add_action('woocommerce_after_main_content','kb_wc_output_content_wrapper_end',10);
add_action('woocommerce_shop_loop_item_title','kb_wc_shop_loop_item_title',10);
add_action('woocommerce_before_shop_loop_item_title','kb_wc_template_loop_product_thumbnail',10);


//Remove Hooks
 remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
 remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
 remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
 remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
 remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);


 function kb_wc_output_content_wrapper(){
 	echo '<div class="page-content">
			<div class="holder mt-0">
				<div class="container">';
 }
 function kb_wc_output_content_wrapper_end(){
 	echo '</div></div></div>';
 }

 function kb_wc_shop_loop_item_title(){
 	echo '<h2 class="prd-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
 }

function kb_wc_template_loop_product_thumbnail() {
    echo woocommerce_get_product_thumbnail();    
} 

function woocommerce_get_product_thumbnail( $size = 'shop_catalog' ) {
    global $post, $woocommerce;
    $output = '<a href="'.get_the_permalink().'" class="prd-img">';

    if ( has_post_thumbnail() ) {               
        $output .= get_the_post_thumbnail( $post->ID, $size );
    } else {
         $output .= wc_placeholder_img( $size );
         // Or alternatively setting yours width and height shop_catalog dimensions.
         // $output .= '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="300px" height="300px" />';
    }                       
    $output .= '</a>';
    return $output;
}



add_action( 'woocommerce_before_shop_loop_item_title', 'kb_wcnew_badge_shop_page', 25);
          
function kb_wcnew_badge_shop_page() {
   global $product;
   $newness_days = 30;
   $created = strtotime( $product->get_date_created() );
   if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
      echo '<div class="label-new">' . esc_html__( 'New!', 'woocommerce' ) . '</div>';
   }
}