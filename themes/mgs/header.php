<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my_girl_shop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mgs' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			if ( ! empty(get_custom_logo() ) ) {
				the_custom_logo();
			} else {
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$mgs_description = get_bloginfo( 'description', 'display' );
				if ( $mgs_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $mgs_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php 
				endif; 
			}
				?>
			
			
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'mgs' ); ?></button> -->
			<?php
			if( has_nav_menu('menu-primary')){
				wp_nav_menu(
					array(
						'theme_location' => 'menu-primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
					)
				);
			}

			// if( has_nav_menu('menu-social')){
			// 	wp_nav_menu(
			// 		array(
			// 			'theme_location' => 'menu-social',
			// 		)
			// 	);
			// }

			mgs_social_media_menu()
			?>
			
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
