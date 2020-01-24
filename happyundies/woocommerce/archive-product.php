<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<!-- Filter Row -->
								<div class="filter-row invisible">
									<div class="row row-1 d-lg-none align-items-center">
										<div class="col">
											<h1 class="category-title">Sex Toy's</h1>
										</div>
										<div class="col-auto ml-auto">
											<div class="view-in-row d-md-none"><span data-view="data-to-show-sm-1"><i class="icon icon-view-1"></i></span> <span data-view="data-to-show-sm-2"><i class="icon icon-view-2"></i></span></div>
											<div class="view-in-row d-none d-md-inline"><span data-view="data-to-show-md-2"><i class="icon icon-view-2"></i></span> <span data-view="data-to-show-md-3"><i class="icon icon-view-3"></i></span></div>
										</div>
									</div>
									<div class="row row-2">
										<div class="col-left d-flex align-items-center">
											<div class="sort-by-holder">
												<div class="select-label d-none d-lg-inline">Sort by:</div>
												<div class="select-wrapper-sm d-none d-lg-inline-block">
													<select class="form-control input-sm">
														<option value="Best Seller">Best Seller</option>
														<option value="New Arrivals">New Arrivals</option>
														<option value="Price:-Low-to-High">Price: Low to High</option>
														<option value="Price:-High-to-Low">Price: High to Low</option>
														<option value="featured">Featured</option>
													</select>
												</div>
												<div class="select-directions d-none d-lg-inline"><span><i class="icon icon-arrow-down"></i></span> <span><i class="icon icon-arrow-up"></i></span></div>
												<div class="dropdown d-flex d-lg-none align-items-center justify-content-center"><span class="select-label">Sort By</span>
													<div class="select-wrapper-sm">
														<select class="form-control input-sm">
															<option value="Best Seller">Best Seller</option>
															<option value="New Arrivals">New Arrivals</option>
															<option value="Price:-Low-to-High">Price: Low to High</option>
															<option value="Price:-High-to-Low">Price: High to Low</option>
															<option value="featured">Featured</option>
														</select>
													</div>
												</div>
											</div>
											<div class="filter-button d-lg-none"><a href="#" class="fixed-col-toggle">FILTER</a></div>
										</div>
										<div class="col col-center d-none d-lg-flex align-items-center justify-content-center">
											<div class="view-label">View:</div>
											<div class="view-in-row"><span data-view="data-to-show-3"><i class="icon icon-view-3"></i></span> <span data-view="data-to-show-4"><i class="icon icon-view-4"></i></span></div>
										</div>
										<div class="col-right ml-auto d-none d-lg-flex align-items-center">
											<div class="items-count">35 item(s)</div>
											<div class="show-count-holder">
												<div class="select-label">Show:</div>
												<div class="select-wrapper-sm"><select class="form-control input-sm">
														<option value="featured">12</option>
														<option value="rating">36</option>
														<option value="price">100</option>
													</select></div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Filter Row -->
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
