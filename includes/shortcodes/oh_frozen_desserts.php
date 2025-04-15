<?php
/**
 * Render Frozen Dessert section on Home Page
 */

function oh_frozen_desserts( $atts = [], $content = null, $tag = '' )
{ 
    extract(shortcode_atts(array(
        'background' => '',
    ), $atts));

    $content        = html_entity_decode($content);

    ob_start(); ?>
    
    <section class="frozen-desserts" style="background-image:url(<?php echo $background; ?>);">
        <div class="frozen-desserts-wrapper max-wrapper__narrow">
            <h2>Frozen Desserts</h2>
            <h4>Pints - Sandwiches - Pops</h4>
            <p><?php echo $content; ?></p>
            <div class="cta--wrapper">
                <a href="<?php echo site_url(); ?>/product-category/frozen-desserts/" class="button button-link">Frozen Desserts</a>
            </div>
        </div>
    </section>
    <?php return ob_get_clean(); 

}
  