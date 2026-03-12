<?php
/**
 * Render Markets dates on Home Page
 */

function oh_markets( $atts = [], $content = null, $tag = '' )
{ 
    extract(shortcode_atts(array(
        'background' => '',
     ), $atts));
    
    $args = [
        'post_type'         => 'market',
        'posts_per_page'    => -1
    ];

    $query = new WP_Query( $args );

    ob_start();
    if( $query->have_posts()) : 

    ?>
        <section class="markets" style="background-image:url(<?php echo $background; ?>);background-size: cover;
}">
            <?php if( $query->count_posts() > 1 ): ?>
                <h2>Find us at these Farmers Markets</h2>
            <?php else: ?>
                <h2>Find us at this Farmers Market</h2>
            <?php endif; ?>
            <div class="markets__inner max-wrapper__narrow">
                <?php while($query->have_posts()): $query->the_post(); 
                    $market_date_time = get_post_meta( $query->post->ID, 'market_date_time', TRUE );
                    $url                = get_post_meta( $query->post->ID, 'url', TRUE );
                    $address            = get_post_meta( $query->post->ID, 'address', TRUE );
                ?>
                    <div class="markets_market">
                        <a href="<?php echo $url; ?>" target="_blank">
                            <h3><?php the_title(); ?><i class="fa-solid fa-up-right-from-square"></i></h3>
                        </a>
                        <p><a href="https://maps.google.com/?q=<?php echo $address; ?>" target="_blank"><?php echo $address; ?><i class="fa-solid fa-up-right-from-square"></i></a></p>
                        <div class="markets_market--dates">
                            <?php 
                                if( !empty($market_date_time) )
                                {
                                    $market_date_time = explode( "\n", $market_date_time );
                                    foreach( $market_date_time as $m )
                                    {
                                        $m  = explode( '|', $m );
                                        ?>
                                        <p><?php echo date( 'l, M d Y', (int) $m[0] ); ?><br><?php echo $m[1] . ' - ' . $m[2]; ?></p>
                                    <?php 
                                    }
                                } ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; wp_reset_postdata();
    return ob_get_clean();
}