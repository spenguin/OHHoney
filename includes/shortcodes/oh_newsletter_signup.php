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
            <!-- <div class="homepage--newsletter-signup__content">
                <?php echo $content; ?>
            </div>
            <form>
                <input type="email" placeholder="your@email.com" />
                <input type="button" value="Subscribe" />
            </form> -->
        <!-- Begin Mailchimp Signup Form -->
            <div id="mc_embed_signup">
                <form action="https://occasionallyhoney.us3.list-manage.com/subscribe/post?u=9a3d37cbbda2a179c56942997&amp;id=2017dced57"
                    method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate"
                    target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">

                        <div class="sm:flex">
                            <div class="mc-field-group w-full sm:w-2-/3 mb-1">
                                <input type="email" value="" name="EMAIL" class="required email w-full p-2 h-10"
                                    id="mce-EMAIL" placeholder="your@email.com">
                            </div>

                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text"
                                    name="b_9a3d37cbbda2a179c56942997_2017dced57"
                                    tabindex="-1"
                                    value="">
                            </div>

                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe"
                                class="w-full h-10 sm:w-1/3 md:text-xl bg-gray-200 cursor-pointer">
                        </div>

                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>
                    </div>
                </form>
            </div>            
        </section>
    <?php
    return ob_get_clean();
} 