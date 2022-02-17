<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my_girl_shop
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-footer-extra">
			<div class="quick-link">
				<p>Quick Link</p>
				<ul>
					<li>Home</li>
					<li>About</li>
					<li>Shop</li>
					<li>Blog</li>
					<li>Contact</li>
				</ul>
			</div>
			<div class="subscribe">
				<h3>Subscribe to our newsletter!</h3>
				<input type="text">
				<button type="button">Subscribe</button>

			</div>
			<div class="contac-link">
					<p>Contact</p>
					<ul>
						<li>2000 Simcoe St N, </li>
						<li>Oshawa, ON L1G 0C5</li>
						<li>info@mygirl.com</li>
						<li>(666)777-9999</li>
					</ul>
				</div>
		</div>

		<div class="site-info">
			<?php
				/* translators: 1: Copyright, 2: Site. */
				printf( esc_html__( 'Copyright %1$s by %2$s.', 'mgs' ), '2022', '<a href="'. home_url() .'">My Gril</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
