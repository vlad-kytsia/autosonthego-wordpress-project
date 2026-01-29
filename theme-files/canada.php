<?php
/* Template Name: Canada Main Template. Post Type: page */
get_header();
?>

<?php 
$fields = get_fields(); 
?>


<main id="primary" class="site-main page page--canada">	
	<section class="hero about-hero canada-hero rounded">
		<picture>
			<?php
			$image_url = $fields['section_1']['background_image_for_mobile'];
			if ( $image_url ) :
			?>
			<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
			<?php endif; ?>
			
			<?php
			$image_url = $fields['section_1']['background_image_for_pc'];
			if ( $image_url ) :
			?>
				<img src="<?php echo esc_url( $image_url ); ?>" class="bg-image" alt="background">
			<?php endif; ?>
		</picture>
		<div class="hero__container">
			<div class="hero__label">
				<div class="circle">
					<?php 
					if ( ! empty( $fields['section_1']['label'] ) ) {
						echo esc_html( $fields['section_1']['label'] );
					}
					?>
				</div> 
			</div>
			<?php 
			if ( ! empty( $fields['section_1']['title'] ) ) {
				echo wp_kses_post( $fields['section_1']['title'] );
			}
			?>

			<?php
			$image_url = $fields['section_1']['ratings'];
			if ( $image_url ) :
			?>
				<img src="<?php echo esc_url( $image_url ); ?>" class="canada-ratings" alt="ratings">
			<?php endif; ?>
		</div>
	</section>


	<!-- Sections with Articles -->
	<div class="sections-with-wrticles">
		<?php
		$list_items = $fields['sections_with_articles'];

		if ( ! empty( $list_items ) && is_array( $list_items ) ) {
			foreach ( $list_items as $list_item ) {
				?>
				<section class="canada-article">
					<div class="canada-article__container">
						<div class="canada-article__body">
							<div class="canada-article__title animation_1" data-fls-watcher-threshold="0.2" data-fls-watcher-once data-fls-watcher>
								<?php 
								if ( ! empty( $list_item['title'] ) ) {
									echo wp_kses_post( $list_item['title'] );
								}
								?>
							</div>
							<div class="canada-article__text animation_1" data-fls-watcher-threshold="0.1" data-fls-watcher-once data-fls-watcher>
								<?php 
								if ( ! empty( $list_item['title'] ) ) {
									echo wp_kses_post( $list_item['text'] );
								}
								?>
							</div>
							<div class="canada-article__button animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
								<?php 
								if ( ! empty( $list_item['button'] ) && is_array( $list_item['button'] ) ) :
									$link_url    = ! empty( $list_item['button']['url'] ) ? $list_item['button']['url'] : '#';
									$link_title  = ! empty( $list_item['button']['title'] ) ? $list_item['button']['title'] : '';
									$link_target = ! empty( $list_item['button']['target'] ) ? ' target="' . esc_attr( $list_item['button']['target'] ) . '"' : '';
								?>
								<a href="<?php echo esc_url( $link_url ); ?>" <?php echo $link_target; ?> class="request-button">
									<span><?php echo esc_html( $link_title ); ?></span>
									<svg width="25" height="6" viewBox="0 0 25 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M25 2.88672L20 -3.26633e-05V5.77347L25 2.88672ZM0 2.88672V3.38672H20.5V2.88672V2.38672H0V2.88672Z" fill="#0D233B" />
									</svg>
								</a>
								<?php
								endif
								?>
							</div>
						</div>
					</div>
					<div class="canada-article__image">
						<picture>
							<?php 
							if ( ! empty( $list_item['image_for_mobile'] ) ) : ?>
								<source media="(max-width: 768px)" srcset="<?php echo esc_url( $list_item['image_for_mobile'] ); ?>">
							<?php endif; ?>

							<?php 
							if ( ! empty( $list_item['image_for_desktop'] ) ) : ?>
								<img 
									src="<?php echo esc_url( $list_item['image_for_desktop'] ); ?>" 
									alt="<?php 
										if ( ! empty( $list_item['title'] ) ) {
											echo esc_html( wp_strip_all_tags( $list_item['title'] ) );
										}
									?>"
								>
							<?php endif; ?>
						</picture>
					</div>
				</section>
				<?php
			}
		}
		?>
	</div>

	
	<!-- Scrolling Banner Items -->
	<?php
	// ID of your Reusable Section from CPT
	$scrolling_banner_id = 9259;

	// ACF repeater field name
	$scrolling_banner_items = 'scrolling_banner_items';
	?>

	<div class="block-marquee">
		<div data-fls-marquee="" data-fls-marquee-space="70" data-fls-marquee-speed="300">

			<?php if ( have_rows( $scrolling_banner_items, $scrolling_banner_id ) ) : ?>
				
				<?php while ( have_rows( $scrolling_banner_items, $scrolling_banner_id ) ) : the_row(); ?>
					
					<?php 
					// get sub field value
					$image = get_sub_field( 'banner' ); 
					?>

					<?php if ( $image ) : ?>
						<div class="block-marquee__image-wrapper" style="color:#fff;">
							<img src="<?php echo esc_url( $image ); ?>" alt="">
						</div>
					<?php endif; ?>

				<?php endwhile; ?>
			
			<?php endif; ?>

		</div>
	</div>

</main>

<?php
get_footer();
?>
