<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OhHoney!
 */

?>
	<footer>
		<h1>Occasionally Honey</h1>
		<div class="footer--social-media">

			<a href="https://www.facebook.com/occasionallyhoney/" target="_blank">
				<i class="fab fa-facebook-square text-2xl mx-4 md:text-4xl text-white"></i>
			</a>

			<a href="https://www.instagram.com/occasionallyhoney/" target="_blank">
				<i class="fab fa-instagram text-2xl mx-4 md:text-4xl text-white"></i>
			</a>

			<a href="#top">
				<i class="fas fa-home text-2xl mx-4 md:text-4xl text-white"></i>
			</a>

		</div>
		<div class="footer--secondary-nav max-wrapper__narrow">
			<a href="/terms-conditions">Terms & Conditions</a>
			<a href="/privacy-policy">Privacy Policy</a>
		</div>

	</footer>

	<?php wp_footer(); ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
</body>
</html> 