<?php

namespace Shortcodes;

require_once CORE_SHORTCODE . 'oh_store_front_open.php';
require_once CORE_SHORTCODE . 'oh_newsletter_signup.php';
require_once CORE_SHORTCODE . 'oh_products.php';
require_once CORE_SHORTCODE . 'oh_markets.php';


\Shortcodes\initialize();

function initialize()
{
    add_shortcode( 'oh_store_front_open', '\oh_store_front_open' );
    add_shortcode( 'oh_newsletter_signup', '\oh_newsletter_signup' );
    add_shortcode( 'oh_products', '\oh_products' );  
    add_shortcode( 'oh_markets', '\oh_markets' );  
}