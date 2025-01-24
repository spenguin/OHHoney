<?php

namespace Widgets;

// require_once CORE_WIDGET . 'creators-list.php';
// require_once CORE_WIDGET . 'related-creators-list.php';

/**
 * Register our sidebars and widgetized areas.
 *
 */


    function register_widget_areas() {

        register_sidebar( [
                'name'          => 'Footer area one',
                'id'            => 'footer_area_one',
                'description'   => 'First area in Footer',
                'before_widget' => '<section class="footer-area footer-area-one">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>',
            ]
        );
        register_sidebar(
            [
                'name'          => 'Footer area two',
                'id'            => 'footer_area_two',
                'description'   => 'Second area in Footer',
                'before_widget' => '<section class="footer-area footer-area-two">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>',
            ]
        );
        register_sidebar(
            [
                'name'          => 'Footer area three',
                'id'            => 'footer_area_three',
                'description'   => 'Third area in Footer',
                'before_widget' => '<section class="footer-area footer-area-three">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>',
            ]        
        );
        
    }
    
    add_action( 'widgets_init', 'Widgets\register_widget_areas' );
?>