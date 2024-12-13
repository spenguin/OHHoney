<?php
/**
 * Render Products on Shop page
 */

function oh_products( $atts = [], $content = null, $tag = '' )
{ 
    // First generate the product menu/filter
    $posts_in_post_type = get_posts( [
        'fields' => 'ids',
        'post_type' => 'product',
        'posts_per_page' => -1,
    ] );
    $terms = wp_get_object_terms( $posts_in_post_type, 'product_cat', array( 'ids' ) ); 
    
    ob_start(); ?>
        <div class="shop--filter">
            <div class="shop--filter__menu">
                
            </div>
            <div class="shop--filter__wrapper">
                <?php
                    foreach( $terms as $term ): ?>
                        <div class="shop--filter__category">
                            <!-- <div class="shop--filter__category-image">
                                <?php
                                    $thumb_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                                    $term_img = wp_get_attachment_url(  $thumb_id );
                                ?>
                                <img src="<?php echo $term_img; ?>" />
                            </div> -->
                            <div class="shop--filter__category-name">
                                <h3><?php echo $term->name; ?></h3>
                            </div>
                        </div>

                <?php endforeach; ?>
            </div>
        </div>
        <?php
    return ob_get_clean();
}