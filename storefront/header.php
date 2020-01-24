<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class('home-page boxed is-dropdn-click'); ?>>

<?php do_action( 'storefront_before_site' ); ?>

<div>
	<?php do_action( 'storefront_before_header' ); ?>
	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
<div class="hdr-topline">
				<div class="container">
					<div class="row">
						<div class="col-auto hdr-topline-left">
							<div class="custom-text">
								<svg aria-hidden="true" width="20px" focusable="false" data-prefix="fas" data-icon="phone-square-alt" class="svg-inline--fa fa-phone-square-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h352a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48zm-16.39 307.37l-15 65A15 15 0 0 1 354 416C194 416 64 286.29 64 126a15.7 15.7 0 0 1 11.63-14.61l65-15A18.23 18.23 0 0 1 144 96a16.27 16.27 0 0 1 13.79 9.09l30 70A17.9 17.9 0 0 1 189 181a17 17 0 0 1-5.5 11.61l-37.89 31a231.91 231.91 0 0 0 110.78 110.78l31-37.89A17 17 0 0 1 299 291a17.85 17.85 0 0 1 5.91 1.21l70 30A16.25 16.25 0 0 1 384 336a17.41 17.41 0 0 1-.39 3.37z"></path></svg>
								<b>1-844-466-2976 </b>
							</div>
						</div>
						<div class="col hdr-topline-center">
							<div class="custom-text"><span>FREE</span> SHIPPING ON ORDERS $49+ </div>
						</div>
						<div class="col-auto hdr-topline-right links-holder">
							<div class="hdr-line-separate">
								<ul class="social-list">
									<li>
										<a href="#" class="icon icon-facebook"></a>
									</li>
									<li>
										<a href="#" class="icon icon-twitter"></a>
									</li>
									<li>
										<a href="#" class="icon icon-google"></a>
									</li>
									<li>
										<a href="#" class="icon icon-instagram"></a>
									</li>
									<li>
										<a href="#" class="icon icon-youtube"></a>
									</li>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>
		<?php
		/**
		 * Functions hooked into storefront_header action
		 *
		 * @hooked storefront_header_container                 - 0
		 * @hooked storefront_skip_links                       - 5
		 * @hooked storefront_social_icons                     - 10
		 * @hooked storefront_site_branding                    - 20
		 * @hooked storefront_secondary_navigation             - 30
		 * @hooked storefront_product_search                   - 40
		 * @hooked storefront_header_container_close           - 41
		 * @hooked storefront_primary_navigation_wrapper       - 42
		 * @hooked storefront_primary_navigation               - 50
		 * @hooked storefront_header_cart                      - 60
		 * @hooked storefront_primary_navigation_wrapper_close - 68
		 */
		do_action( 'storefront_header' );
		?>

	</header>

	<!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">
	
				<div class="container">

		<?php
		do_action( 'storefront_content_top' );
