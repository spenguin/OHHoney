<?php

namespace Shortcodes;

require_once CORE_SHORTCODE . 'oh_store_front_open.php';
require_once CORE_SHORTCODE . 'oh_newsletter_signup.php';


\Shortcodes\initialize();

function initialize()
{
    add_shortcode( 'oh_store_front_open', '\oh_store_front_open' );
    add_shortcode( 'oh_newsletter_signup', '\oh_newsletter_signup' );
}