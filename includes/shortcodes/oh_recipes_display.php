<?php
/**
 * Render Recipes on Home Page
 */

function oh_recipes_display( $atts = [], $content = null, $tag = '' )
{
    // extract(shortcode_atts(array(
    //     'name' => '',
    //  ), $atts));
    // if( empty($name)) return '';


    $args = [
        'post_type'         => 'recipe',
        'posts_per_page'    => -1
    ];

    $query = new WP_Query( $args );
    ob_start();
        if( $query->have_posts() ): ?>
            <section class="recipes">
                <h2>Recipes</h2>
                <h4>Healthy, Delicious Recipes</h4>
                <div class="max-wrapper__narrow recipes__wrapper">
                    <?php
                        while( $query->have_posts() ): $query->the_post(); 
                            $imgSrc = get_the_post_thumbnail_url(); 
                        ?>
                            <a href="<?php the_permalink() ?>" style="background:url(<?php echo $imgSrc; ?>);background-size:cover;background-position:center;" class="recipes__recipe">
                                <div class="recipes__recipe--name">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                            </a>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; wp_reset_postdata();
    return ob_get_clean();
}