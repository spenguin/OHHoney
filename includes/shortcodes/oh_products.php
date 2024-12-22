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
    $terms = wp_get_object_terms( $posts_in_post_type, 'product_cat', array( 'ids' ) ); //die(var_dump($terms));

    $products = get_products(); ?>

    <div id="ProductPage"></div>


    <script>
        // var showId          = '<?php //echo $showId; ?>'; 
        var terms       = <?php echo json_encode($terms); ?>;
        var products    = <?php echo json_encode(array_values($products)); ?>;
        //console.log('products', products); //console.log('terms', terms);
    </script>
    <script type="text/javascript" src="<?php echo CORE_DIST; ?>productpage.js"></script>

    <?php
}