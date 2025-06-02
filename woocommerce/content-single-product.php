<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/** Make a few changes */
// add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
// remove_action( 'woocommerce_after_single_product_summary',  )
// add_action( 'woocommerce_before_single_product_summary', 'wc_oh_product_image_carousel', 7 );

?>
<div class="single-product">
	<header class="single-product--header">
		<h1><?php echo $product->name; ?></h1>
	</header>
	<div class="single-product--wrapper max-wrapper">
		<div class="single-product--images">
			<?php //do_action( 'woocommerce_before_single_product_summary' ); ?>
			<?php echo render_slideshow(); ?>
		</div>	
		<div class="single-product--content">
			<?php do_action( 'woocommerce_single_product_summary' ); ?>
		</div>
	
	</div>

</div>
<div class="max-wrapper">
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	// do_action( 'woocommerce_after_single_product_summary' ); // Related products
		// $related = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), 3, $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' ); var_dump(count($related));
	?>	
</div>