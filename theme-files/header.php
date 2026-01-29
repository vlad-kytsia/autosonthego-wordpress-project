<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AutosOnTheGo2025
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<title>
			<?php 
			if ( is_post_type_archive('services') ) {
				echo 'Car Shipping Services — Autos On The Go';
			} else {
				echo wp_get_document_title();
			}
			?>
		</title>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="preload" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/fonts/FunnelDisplay-SemiBold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/fonts/FunnelDisplay-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/fonts/FunnelDisplay-Medium.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/fonts/FunnelDisplay-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/fonts/Archivo-SemiBold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/fonts/Archivo-SemiBold-Italic.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/fonts/Archivo-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/fonts/Archivo-Medium-Italic.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/fonts/Archivo-ExtraBold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/fonts/Archivo-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/fonts/Archivo-Black.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<script src="https://cdn.userway.org/widget.js" data-account="QOQHWBuMmQ"></script>
		<?php wp_head(); ?>
	</head>
	<body>
		<?php wp_body_open(); ?>
		<div class="wrapper <?php echo is_front_page() ? esc_attr( ' home-page' ) : ''; ?>">
			<header data-fls-header="" data-fls-header-scroll="5" class="header <?php echo !is_front_page() ? 'inner-page-header' : ''; ?>">
				<div class="header__container">
					<div class="site-branding">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php
							if ( function_exists( 'get_field' ) ) :
								$header_image_url = get_field( 'header_logo_1', 'option' );
								if ( $header_image_url ) :
									?>
									<img src="<?php echo esc_url( $header_image_url ); ?>" class="logo-1" alt="logo">
									<?php
								endif;
							endif;
							?>
							<?php
							if ( function_exists( 'get_field' ) ) :
								$header_image_url = get_field( 'header_logo_2', 'option' );
								if ( $header_image_url ) :
									?>
									<img src="<?php echo esc_url( $header_image_url ); ?>" class="logo-2" alt="logo">
									<?php
								endif;
							endif;
							?>
						</a>
					</div>
					<!-- .site-branding -->
					<div class="menu">
						<button type="button" data-fls-menu="" class="menu__icon icon-menu">
							<span></span>
						</button>
						<nav class="menu__body">
							<?php
							$locations = get_nav_menu_locations();

							if ( isset( $locations['main-menu'] ) ) {

								// Отримуємо об'єкт меню
								$menu_obj = wp_get_nav_menu_object( $locations['main-menu'] );

								wp_nav_menu( array(
									'theme_location'  => 'main-menu',
									'menu_class'      => 'menu__list',
									'container'       => false,
									'depth'           => 3,
									'fallback_cb'     => false, // ВАЖЛИВО: не показувати fallback
									'items_wrap'      => '<ul class="%2$s">%3$s</ul>', // структура UL
									'walker'          => new Walker_Nav_Menu(), 
								) );
							} 
							?>
							
							<div class="header-phone">
								<?php
								if ( function_exists( 'get_field' ) ) :
									$field = get_field( 'text_and_link', 'option' );
									if ( $field ) :
										echo wp_kses_post( $field );
									endif;
								endif;
								?>
							</div>
							<div class="mobile-content">
								<?php
								if ( function_exists( 'get_field' ) ) :
									$field = get_field( 'text_for_mobile_menu', 'option' );
									if ( $field ) :
										echo wp_kses_post( $field );
									endif;
								endif;
								?>
								
								<div class="mobile-content__logos">
									<?php
									if ( function_exists( 'get_field' ) ) :
										$social_links = get_field( 'header_social_links', 'option' );
										if ( $social_links ) :
											if ( ! empty( $social_links ) && is_array( $social_links ) ) {
												foreach ( $social_links as $social_link ) {
												?>
												<a href="<?php echo esc_url($social_link['url']); ?>">
													<img src="<?php echo esc_url($social_link['icon']); ?>" alt="icon">
												</a>
												<?php
												}
											}
										endif;
									endif;
									?>
								</div>
							</div>
							<div class="mobile-mini-menu">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'header-small-menu-for-mobile',
									'container'      => false, 
									'menu_class'     => 'menu__list', // Клас для <ul>
									'depth'          => 1, 
									'fallback_cb'    => false, 
								) );
								?>
							</div>
							<a href="<?php echo esc_url( home_url( '/#request' ) ); ?>" data-fls-menu class="yellow-button">
								<span>Request Quote Now</span>
								<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icons/arrow-form--right-black.svg" alt="arrow">
							</a>
						</nav>
						<!-- #site-navigation -->
					</div>
				</div>
			</header>