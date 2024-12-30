<?php
/**
 * Modified WC functions
 */
function oh_template_price()
{
    global $product;
    pvd($product->is_type('variable'));
}
