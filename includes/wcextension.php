<?php
/**
 * Modified WC functions
 */
// function oh_template_price()
// {
//     global $product;
//     pvd($product->is_type('variable'));
// }

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