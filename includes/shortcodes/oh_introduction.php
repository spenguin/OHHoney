<?php
/**
 * Render Introduction for Home Page
 */

function oh_introduction( $atts = [], $content = null, $tag = '' )
{ 
    $introduction   = get_post_by_title('Meet Nicole', NULL);
    $img            = get_the_post_thumbnail( $introduction->ID ); 
    ob_start(); ?>
        <section class="introduction">
            <div class="introduction--wrapper max-wrapper__narrow">
                <h3><?php echo $introduction->post_title; ?></h3>
                <div class="introduction--image">
                    <?php echo $img; ?>
                </div>
                <div class="introduction--text">
                    <?php echo $introduction->post_content; ?>
                </div>
            </div>
        </section>
    <?php 
    return ob_get_clean();
}