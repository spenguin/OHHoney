<?php
/**
 * Let's see if I can create a product page
 */
$_product           = wc_get_product($post->ID);
$_product_details   = $_product->get_data(); //var_dump($_product_details);
$_children          = $_product->get_children(); var_dump($_children);
?>
<div class="single-product">
    <div class="single-product__image-wrapper">
        <?php echo get_the_post_thumbnail($post->ID); ?>
    </div>
    <div class="single-product__prices">
        <p><?php echo $_product->get_price_html(); ?>
    </div>
    <div class="single-product__description">
        <?php echo apply_filters('the_content', $_product_details['short_description']); ?>
    </div>
    <div class="single-product__variations">
        <?php
            // $variations = $_product->get_available_variations(); var_dump($variations);
            $attributes = $_product->get_attributes(); 
            // $prices     = $_product->get_prices(); var_dump($prices);
            
	        foreach( $attributes as $key => $a )
            { 
                ?>
                    <label for="<?php echo $key; ?>"><?php echo $a['name']; ?></label>
                    <select name="<?php echo $key; ?>">
                        <?php
                            foreach( $a['options'] as $oKey => $o )
                            {
                                ?>
                                    <option value="<?php echo $oKey; ?>"><?php echo $o; ?></option>
                                <?php
                            }
                        ?>
                    </select>

                <?php
            }

        ?>
    </div>

</div>
<?php

// $_product = wc_get_product( $_product_id );

// Then from the object you can run any of WooCommerce's product methods.

// $_product->get_regular_price();
// $_product->get_sale_price();
// $_product->get_price();
