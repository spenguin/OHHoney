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
	<div class="footer-wrapper max-wrapper">
		<div class="footer-wrapper__copyright">
			<p>Copyright</p>
		</div>
		<div class="footer-wrapper__instagram">
			<?php dynamic_sidebar( 'footer-middle' ); ?>
			<p>Instagram</p>
		</div>
		<div class="footer-wrapper__signup">
			<p>MailChimp</p>
		</div>
	</div>
</footer>

<!-- 
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ohhoney' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'ohhoney' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'ohhoney' ), 'ohhoney', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	<!-- </footer>#colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html> 
