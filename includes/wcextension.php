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
    $dates = getDatesForPeriod(date('Y-m-d'), '60' );
    $availableDates = [];
    
    // Start with Shop Hours
    $display_shop_hours = get_option( 'display_shop_hours' ); 

    foreach( $dates as $date )
    {   
        $available  = empty($display_shop_hours["'c'"][date('w', strtotime($date))]) ? '' : 'In Store';
        $availableDates[$date]  = $available;
    }
    
    // Now work through all Market dates

    $args = [
        'post_type'         => 'market',
        'posts_per_page'    => -1
    ];

    $query = new WP_Query( $args );
    
    if( $query->have_posts()): while($query->have_posts()): $query->the_post();
        $market_title   = get_the_title();
        $market_date_time = get_post_meta( $query->post->ID, 'market_date_time', TRUE );
        foreach( $market_date_time as $m ): 
            if( empty($m["'date'"] ) ) continue;
            $market_date = date('Y-m-d', strtotime($m["'date'"]));
            if( array_key_exists($market_date, $availableDates ))
            {
                $availableDates[$market_date]   = $market_title;
            }
        endforeach;

    endwhile; endif; wp_reset_postdata();
    
    // ob_start(); ?>
    <ul>
        <?php    
            foreach( $availableDates as $date => $location )
            { ?>
                <li>
                    <?php
                        if( !empty($location) ): ?>
                            <input type="checkbox" name="selectedDate" value="<?php echo $date; ?>" />
                    <?php endif; ?>
                    <?php echo $date; ?>
                    <?php
                        if( !empty($location) ): ?>
                            - <?php echo $location; ?>
                    <?php endif; ?>                    
                </li>
                <?php
            }
    ?></ul><?php
    // return ob_get_clean();
}

// $dateString = '2024-07-25'; // Replace with your desired date
// $timestamp = strtotime($dateString); // Convert the date string to a Unix timestamp
// $dayOfWeekIndex = date('w', $timestamp); // Get the day of the week as an index (0 for Sunday, 6 for Saturday)

// echo "The day of the week index for " . $dateString . " is: " . $dayOfWeekIndex;

/** 
 * Get all Dates from Start Date for specified period
 */

function getDatesForPeriod($startDate, $period) 
{
    $dates = [];
    $currentDate = new DateTime($startDate); 
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
