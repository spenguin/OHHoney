<?php
/**
 * Render Store Front Open on Home Page
 */

function oh_store_front_open( $atts = [], $content = null, $tag = '' )
{ 
    $content        = html_entity_decode($content);

    // $store_hours    = get_post_by_title( "Store Hours", "content", "post" ); 
    $days   = ["Mon", "Tues", "Wed", "Thurs", "Fri", "Sat", "Sun"];
    $display_shop_hours = get_option( 'display_shop_hours' ); 

    ob_start(); ?>
        <section class="store-front-open">
            <div class="store-front-open__inner max-wrapper__narrow">
                <h2>Store Front Open</h2>
                <div class="store-hours">
                    <ul class="store-hours__days">
                        <?php
                            for( $i = 0; $i < count($days); $i++ )
                            {
                                if( empty( $display_shop_hours["'o'"][$i] ) ) continue;
                                ?>
                                <li>
                                    <?php echo $days[$i]; ?>: <?php echo $display_shop_hours["'o'"][$i]; ?> - <?php echo $display_shop_hours["'c'"][$i]; ?>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
                <p><?php echo $content; ?></p>
                <div class="cta--wrapper">
                    <a href="<?php echo site_url(); ?>/online-shop" class="button button-link">Online Store</a>
                </div>
            </div>
        </section>

    <?php
    return ob_get_clean();
} 