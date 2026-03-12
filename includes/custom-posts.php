<?php

namespace CustomPosts;

use WP_Query;

\CustomPosts\initialize();

function initialize()
{
    add_action('init', '\CustomPosts\custom_post_type', 0);
    // add_action('init', '\CustomPosts\custom_taxonomy_type', 0);
    add_action('admin_init', '\CustomPosts\admin_init');   
    
    add_action('save_post_market', '\CustomPosts\save_market_location' );
    add_action('save_post_market', '\CustomPosts\save_date_time' );
    add_action('save_post_recipe', '\CustomPosts\save_featured_recipe' );
}

function custom_post_type()
{

    // Set UI labels for Custom Post Type Market
    $labels = array(
        'name'                => _x('Markets', 'Post Type General Name', 'ohhoney'),
        'singular_name'       => _x('Market', 'Post Type Singular Name', 'ohhoney'),
        'menu_name'           => __('Markets', 'ohhoney'),
        'parent_item_colon'   => __('Parent Market', 'ohhoney'),
        'all_items'           => __('All Markets', 'ohhoney'),
        'view_item'           => __('View Market', 'ohhoney'),
        'add_new_item'        => __('Add New Market', 'ohhoney'),
        'add_new'             => __('Add New', 'ohhoney'),
        'edit_item'           => __('Edit Market', 'ohhoney'),
        'update_item'         => __('Update Market', 'ohhoney'),
        'search_items'        => __('Search Market', 'ohhoney'),
        'not_found'           => __('Not Found', 'ohhoney'),
        'not_found_in_trash'  => __('Not found in Trash', 'ohhoney'),
    );

    // Set other options for Custom Post Type
    $args = array(
        'label'               => __('market', 'ohhoney'),
        'description'         => __('Markets listings', 'ohhoney'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'editor'=>FALSE),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        // 'taxonomies'          => array('seasons'),
        'rewrite' => array('slug' => 'market', 'with_front' => false),
        /* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 15,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest'        => TRUE

    );

    // Registering Custom Post Type Blogs
    register_post_type('market', $args);    

    // Set UI labels for Custom Post Type Recipe
    $labels = array(
        'name'                => _x('Recipes', 'Post Type General Name', 'ohhoney'),
        'singular_name'       => _x('Recipe', 'Post Type Singular Name', 'ohhoney'),
        'menu_name'           => __('Recipes', 'ohhoney'),
        'parent_item_colon'   => __('Parent Recipe', 'ohhoney'),
        'all_items'           => __('All Recipes', 'ohhoney'),
        'view_item'           => __('View Recipe', 'ohhoney'),
        'add_new_item'        => __('Add New Recipe', 'ohhoney'),
        'add_new'             => __('Add New', 'ohhoney'),
        'edit_item'           => __('Edit Recipe', 'ohhoney'),
        'update_item'         => __('Update Recipe', 'ohhoney'),
        'search_items'        => __('Search Recipe', 'ohhoney'),
        'not_found'           => __('Not Found', 'ohhoney'),
        'not_found_in_trash'  => __('Not found in Trash', 'ohhoney'),
    );

    // Set other options for Custom Post Type
    $args = array(
        'label'               => __('recipe', 'ohhoney'),
        'description'         => __('Recipes listings', 'ohhoney'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        // 'taxonomies'          => array('seasons'),
        'rewrite' => array('slug' => 'recipe', 'with_front' => false),
        /* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 15,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest'        => TRUE

    );

    // Registering Custom Post Type Blogs
    register_post_type('recipe', $args);        
}

/**
 * Custom Fields in Posts
 */
function admin_init()
{
    add_meta_box('market_location_meta', 'Market Web Address and Street Address', '\CustomPosts\market_location', 'market');
    add_meta_box('market_date_time_meta', 'Market Dates and Times', '\CustomPosts\market_date_time', 'market' );
    add_meta_box('featured_recipe_meta', 'Feature Recipe on Home Page', '\CustomPosts\featured_recipe', 'recipe', 'side' );
}


/**
 * Market location
 */
function market_location()
{
    global $post;

    $custom = get_post_custom($post->ID);
    $url    = (isset($custom['url'][0])) ? $custom['url'][0] : '';
    $address= (isset($custom['address'][0])) ? $custom['address'][0] : '';

?>
    <label for="url" style="width:100px;display:inline-block;">Web Address:</label>
    <input type="text" name="url" value="<?php echo $url; ?>" style="width:300px"/><br /><br />
    <label for="address" style="width:100px;display:inline-block">Market Address:</label>
    <input type="text" name="address" value="<?php echo $address; ?>" style="width:300px"/>

<?php    
}

function save_market_location()
{
    global $post;
    if( empty($post->ID)) return;

    $custom = get_post_custom($post->ID);
    $url    = $_POST['url'];
    $address= $_POST['address'];
    update_post_meta($post->ID, 'url', $url );
    update_post_meta($post->ID, 'address', $address );
}


/**
 * Market Dates and Times
 */
function market_date_time()
{
    global $post;

    $custom = get_post_custom($post->ID);
    $market_date_time   = isset($custom['market_date_time'] ) ? $custom['market_date_time'][0] : '';
    $now    = time();
    ?>
    <p>Enter the Market Dates and Times as<br>2025-06-30|0900|1500, for 30th June, 2025 from 9am to 3pm</p> 
    <textarea name="market_date_time" style="height:200px;">
        <?php
            if( !empty( $market_date_time ) )
            {
                $market_date_time = explode("\n", $market_date_time );
                foreach( $market_date_time as $m )
                {
                    $m  = explode( '|', $m );
                    if( $now > $m[0] ) continue;
                    echo date( 'Y-m-d', (int) $m[0]) . '|' . $m[1] . '|' . $m[2] . "\n";
                }
            }
        ?>
    </textarea>
    <?php
}

function save_date_time()
{
    global $post;
    if (empty($post->ID)) return; 
    $market_date_time   = explode( "\n", $_POST['market_date_time'] ); 
    $o                  = [];
    foreach( $market_date_time as $m )
    {
        $m      = explode( '|', $m );
        $m[0]   = strtotime( $m[0] );
        $o[]    = join('|', $m );
    }
    $market_date_time = join( "\n", $o );
    update_post_meta($post->ID, 'market_date_time', $market_date_time );

}

function featured_recipe()
{
    global $post;

    $custom = get_post_custom($post->ID);
    $featured_recipe = isset( $custom['featured_recipe'] ) ? $custom['featured_recipe'][0] : "0";
    ?>
    <!-- <label for="featured_recipe">Featured Recipe:</label> -->
    <input type="checkbox" name="featured_recipe" value="1" <?php echo ($featured_recipe == "1" ) ? 'checked' : ''; ?> /> Featured recipe
    <?php
}

function save_featured_recipe()
{
    global $post;
    if( empty($post->ID)) return;
    $featured_recipe = $_POST['featured_recipe'];
    update_post_meta($post->ID, 'featured_recipe', $featured_recipe );
}