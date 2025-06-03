<?php
/**
 * Social Media
 */
?>
<div class="header-icon-container">
    <a href="https://www.facebook.com/occasionallyhoney/" target="_blank">
        <i class="fab fa-facebook-square icon-color"></i>
    </a>
    <a href="https://www.instagram.com/occasionallyhoney/" target="_blank">
        <i class="fab fa-instagram icon-color"></i>
    </a>
    <a href="/cart">
        <i class="fas fa-shopping-cart icon-color"><span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></i>
    </a>
</div>