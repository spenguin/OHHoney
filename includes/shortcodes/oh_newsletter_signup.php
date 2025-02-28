<?php
/**
 * Render Newsletter Signup on Home Page
 */

function oh_newsletter_signup( $atts = [], $content = null, $tag = '' )
{ 
    $content        = html_entity_decode($content);

    // $store_hours    = get_post_by_title( "Store Hours", "content", "post" ); 


    ob_start(); ?>
        <section class="homepage--newsletter-signup">
            <div class="homepage--newsletter-signup__inner max-wrapper__narrow">
                <div class="homepage--newsletter-signup__content">
                    <?php echo $content; ?>
                </div>
                <form>
                    <input type="text" placeholder="Your name" />
                    <input type="email" placeholder="your@email.com" />
                    <input type="button" value="Subscribe" />
                </form>
                </div>
            </div>            
        </section>
    <?php
    return ob_get_clean();
} 