<?php
/**
 * Modified WC functions
 */
// function oh_template_price()
// {
//     global $product;
//     pvd($product->is_type('variable'));
// }

add_action( 'woocommerce_checkout_before_customer_details', 'oh_select_collection_date', 20 );
add_action( 'woocommerce_checkout_update_order_meta', 'oh_select_collection_date_order_meta' );

/**
 * Create product image carousel
 */
function wc_oh_product_image_carousel()
{
    global $post, $product;

    $image_ids[]    = get_post_thumbnail_id($post->ID);

    $attachment_ids = $product->get_gallery_image_ids(); 

    $image_ids = array_merge( $image_ids, $attachment_ids );

    ?>
    <div class="">
        <?php
            foreach( $image_ids as $image_id )
            {
                $attachment = wp_get_single_post($image_id);
                ?>
                <div class="slide--wrapper">
                    <div class="slide">
                        <div class="slide--image">
                            <img src="<?php echo $attachment->guid; ?>" />
                        </div>
                        <div class="slide--name">
                            <h3><?php echo $attachment->post_title; ?></h3>
                        </div>
                    </div>
                </div>
                <?php
            }

        ?>

    </div>
    <?php
  
}


function render_slideshow()
{
    global $post, $product;

    $image_ids[]    = get_post_thumbnail_id($post->ID);

    $attachment_ids = $product->get_gallery_image_ids(); 

    $image_ids = array_merge( $image_ids, $attachment_ids );

    return slideshow($image_ids);
}

/**
 * Select the collection date for the order
 */
function oh_select_collection_date()
{
    $availableDates = get_available_collection_dates();
    
    // ob_start(); ?>
    <p>Select Collection Date</p>
    <ul class="collection_dates--list">
        <?php    
            $month = '';
            foreach( $availableDates as $date => $location )
            { 
                if( ($newMonth  = date( 'F', strtotime($date) ) )  != $month )
                {
                    $month      = $newMonth;
                    ?>
                    <li>&nbsp;</li>
                    <li><?php echo $month; ?></li>
                    <?php
                }
                ?>
                <?php
                    if( !empty($location) ): ?>
                        <li>
                            <input type="radio" name="selectedDate" value="<?php echo $date; ?>" /><?php echo $date; ?> - <?php echo $location['place']; ?>
                        </li>
                    <?php endif; ?>                    
                <?php
            }
    ?></ul><?php
    // return ob_get_clean();
}

function oh_select_collection_date_order_meta($order_id)
{
    if (!empty($_POST['selectedDate'])) {update_post_meta($order_id, 'selectedDate',sanitize_text_field($_POST['selectedDate']));}
}

function get_available_collection_dates()
{
    $dates = getDatesForPeriod(date('Y-m-d'), '60' );
    $availableDates = [];
    
    // Start with Shop Hours
    $display_shop_hours = get_option( 'display_shop_hours' );

    foreach( $dates as $date )
    {   
        $available  = empty($display_shop_hours["'c'"][date('w', strtotime($date))-1]) ? '' : 'In Store';
        $availableDates[$date]  = $available;
        if( !empty($available) )
        {
            $availableDates[$date]  = [
                'place'     => $available,
                'address'   => '97-2710 Barnet Hwy, Coquitlam BC'
            ];
        }
    }
    
    // Now work through all Market dates

    $args = [
        'post_type'         => 'market',
        'posts_per_page'    => -1
    ];

    $query = new WP_Query( $args );
    
    if( $query->have_posts()): while($query->have_posts()): $query->the_post();
        $market_title   = get_the_title(); 
        $market_address = get_post_meta( $query->post->ID, 'address', TRUE );
        $market_date_time   = get_post_meta( $query->post->ID, 'market_date_time', TRUE ); //pvd($market_date_time);
        if( !empty($market_date_time ) )
        {
            $market_date_time   = explode( "\n", $market_date_time ); 
            foreach( $market_date_time as $m ): 
                $m = explode( '|', $m );
                if( $m[0]  < time() ) continue;
                $market_date = date('Y-m-d', $m[0]); 
                if( array_key_exists($market_date, $availableDates ))
                {
                    $availableDates[$market_date]   = [
                        'place'     => $market_title,
                        'address'   => $market_address
                    ];
                }
            endforeach;
        }

    endwhile; endif; wp_reset_postdata();

    return $availableDates;
}

function get_location_by_collection_date($date)
{
    $availableDates = get_available_collection_dates(); 
    return $availableDates[$date];
}

/** 
 * Get all Dates from Start Date for specified period
 */

function getDatesForPeriod($startDate, $period) 
{
    $dates = [];
    $currentDate = new DateTime($startDate . "+3 days" ); 
    $endDate = new DateTime($startDate . "+" . $period . "days"); 

    while ($currentDate <= $endDate) {
        $dates[] = $currentDate->format('Y-m-d');
        $currentDate->modify('+1 day');
    }

    return $dates;
}



// // Example usage:
// $startDate = '2025-07-01';
// $endDate = '2025-07-05';
// $allDays = getDatesBetween($startDate, $endDate);

// print_r($allDays);
