<?php
/**
 * Product functions
 */

/**
 * Get all Products, including product categories
 * Return as array
 */
function get_products()
{
    $args = [
        'post_type'         => 'product',
        'posts_per_page'    => -1,
        'orderby'           => 'title',
        'order'             => 'ASC'
    ];

    $query  = new WP_Query($args); //var_dump($query);

    $posts_in_post_type = get_posts( [
            'fields' => 'ids',
            'post_type' => 'product',
            'posts_per_page' => -1,
        ] );

    $o      = [];

    if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); 
        $ID     = get_the_ID();
        $terms  = organise_terms($ID);

        // A hack to get the images [FIX]
        $imageStr = get_the_post_thumbnail_url();
        $imageUrl = substr( $imageStr, 0, -4 ) . '-324x324' . substr( $imageStr, strlen($imageStr)-4 );


        $o[$ID]   = [
            'title'     => html_entity_decode(get_the_title()),
            'url'       => get_the_permalink(),
            'image'     => $imageUrl,//get_the_post_thumbnail_url(),
            'category'  => $terms
        ];

    endwhile; endif; wp_reset_postdata();

    return $o;
}

function organise_terms($ID)
{
    $terms  = get_the_terms( $ID, 'product_cat' );

    $o      = [];
    foreach( $terms as $term )
    {
        // $o[] = [
        //     'name'      => $term->name,
        //     'slug'      => $term->slug,
        //     'term_id'   => $term->term_id
        // ];
        $o[]    = $term->slug;
    }

    return $o;
}