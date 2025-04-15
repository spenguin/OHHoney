<?php

namespace Shortcodes;

require_once CORE_SHORTCODE . 'oh_store_front_open.php';
require_once CORE_SHORTCODE . 'oh_newsletter_signup.php';
require_once CORE_SHORTCODE . 'oh_products.php';
require_once CORE_SHORTCODE . 'oh_markets.php';
require_once CORE_SHORTCODE . 'oh_recipes_display.php';
require_once CORE_SHORTCODE . 'oh_introduction.php';
require_once CORE_SHORTCODE . 'oh_frozen_desserts.php';


\Shortcodes\initialize();

function initialize()
{
    add_shortcode( 'oh_store_front_open', '\oh_store_front_open' );
    add_shortcode( 'oh_newsletter_signup', '\oh_newsletter_signup' );
    add_shortcode( 'oh_products', '\oh_products' );  
    add_shortcode( 'oh_markets', '\oh_markets' ); 
    add_shortcode( 'oh_recipes_display', '\oh_recipes_display' ); 
    add_shortcode( 'oh_introduction', '\oh_introduction' );
    add_shortcode( 'oh_frozen_desserts', '\oh_frozen_desserts');
}