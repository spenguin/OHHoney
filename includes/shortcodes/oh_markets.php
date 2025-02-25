<?php
/**
 * Render Markets dates on Home Page
 */

function oh_markets( $atts = [], $content = null, $tag = '' )
{ 
    $args = [
        'post_type'         => 'market',
        'posts_per_page'    => -1
    ];

    $query = new WP_Query( $args );

    ob_start();
    if( $query->have_posts()) : 
        $market_date_time = get_post_meta( $query->post->ID, 'market_date_time', TRUE );
        $url                = get_post_meta( $query->post->ID, 'url', TRUE );
        $address            = get_post_meta( $query->post->ID, 'address', TRUE );
    ?>
        <section class="markets">
            <?php if( $query->count_posts() > 1 ): ?>
                <h2>Find us at these Farmers Markets</h2>
            <?php else: ?>
                <h2>Find us at this Farmers Market</h2>
            <?php endif; ?>
            <?php while($query->have_posts()): $query->the_post(); ?>
                <div class="markets_market">
                    <?php the_title( '<h3>', '</h3>' ); ?>
                    <p><?php echo $address; ?></p>
                    <div class="markets_market--dates">
                        <?php 
                            foreach( $market_date_time as $m ): 
                                if( empty($m["'date'"] ) ) break;
                                ?>
                                <p><?php echo $m["'date'"]; ?><br><?php echo $m["'start'"] . ' - ' . $m["'end'"]; ?></p>
                            <?php endforeach; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </section>
    <?php endif; wp_reset_postdata();
    return ob_get_clean();
}