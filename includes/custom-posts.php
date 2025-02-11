<?php

namespace CustomPosts;

use WP_Query;

\CustomPosts\initialize();

function initialize()
{
    add_action('init', '\CustomPosts\custom_post_type', 0);
    // add_action('init', '\CustomPosts\custom_taxonomy_type', 0);
    add_action('admin_init', '\CustomPosts\admin_init');    
}

function custom_post_type()
{

    // Set UI labels for Custom Post Type Performances
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
}

/**
 * Custom Fields in Posts
 */
function admin_init()
{
    add_meta_box('market_location_meta', 'Market Web Address and Street Address', '\CustomPosts\market_location', 'market');
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
    <label for="url">Web Address:</label>
    <input type="text" name="url" value="<?php echo $url; ?>" />
    <label for="address">Market Address:</label>
    <input type="text" name="address" value="<?php echo $address; ?>" />

<?php    
}