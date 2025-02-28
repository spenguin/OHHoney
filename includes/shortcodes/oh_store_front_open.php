<?php
/**
 * Render Store Front Open on Home Page
 */

function oh_store_front_open( $atts = [], $content = null, $tag = '' )
{ 
    $content        = html_entity_decode($content);

    $store_hours    = get_post_by_title( "Store Hours", "content", "post" ); 

    ob_start(); ?>
        <section class="store-front-open">
            <div class="store-front-open__inner max-wrapper__narrow">
                <h2>Store Front Open</h2>
                <div class="store-hours">
                    <?php echo $store_hours; ?>
                </div>
                <?php echo $content; ?>
                <div class="cta--wrapper">
                    <a href="<?php echo site_url(); ?>/shop" class="button button-link">Online Store</a>
                </div>
            </div>
        </section>

    <?php
    return ob_get_clean();
} 