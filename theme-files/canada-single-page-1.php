<?php
/* Template Name: Canada Template 1. Post Type: page */
get_header();
?>

<?php 
$fields = get_fields(); 
?>


<main id="primary" class="site-main page single-page-canada-1">	
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
				<a href="<?php echo esc_url( home_url( '/canada-auto-transport/' ) ); ?>" class="services-back-link">
					<svg width="25" height="6" viewBox="0 0 25 6" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 2.88672L5 -3.26633e-05V5.77347L0 2.88672ZM25 2.88672V3.38672H4.5V2.88672V2.38672H25V2.88672Z" fill="#FFFD74" />
					</svg> 
					<div class="circle">
						CANADA
					</div> 
				</a>
			</div>
			
			<?php 
			if ( ! empty( $fields['section_1']['title'] ) ) {
				echo wp_kses_post( $fields['section_1']['title'] );
			}
			?>
		</div>
	</section>



	<section class="canada-section-2">
		<picture>
			<?php
			$image_url = $fields['section_2']['background_picture_mobile'];
			if ( $image_url ) :
			?>
			<source media="(max-width: 550px)" srcset="<?php echo esc_url( $image_url ); ?>">
			<?php endif; ?>
			
			<?php
			$image_url = $fields['section_2']['background_picture_pc'];
			if ( $image_url ) :
			?>
				<img src="<?php echo esc_url( $image_url ); ?>" class="bg-image" alt="background">
			<?php endif; ?>
		</picture>
		<div class="canada-section-2__container">
			<div class="canada-section-2__left-col">
				<div class="canada-section-2__title animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
					<?php 
					if ( ! empty( $fields['section_2']['title'] ) ) {
						echo wp_kses_post( $fields['section_2']['title'] );
					}
					?>
				</div>
			</div>

			<div class="canada-section-2__body">
				<div class="canada-section-2__text-1  animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
					<?php 
					if ( ! empty( $fields['section_2']['text_1'] ) ) {
						echo wp_kses_post( $fields['section_2']['text_1'] );
					}
					?>
				</div>
				<div class="canada-section-2__text-2  animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
					<?php 
					if ( ! empty( $fields['section_2']['text_2'] ) ) {
						echo wp_kses_post( $fields['section_2']['text_2'] );
					}
					?>
				</div>
				<div class="canada-section-2__button animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
					<?php 
					if ( ! empty( $fields['section_2']['button'] ) && is_array( $fields['section_2']['button'] ) ) :
						$link_url    = ! empty( $fields['section_2']['button']['url'] ) ? $fields['section_2']['button']['url'] : '#';
						$link_title  = ! empty( $fields['section_2']['button']['title'] ) ? $fields['section_2']['button']['title'] : '';
						$link_target = ! empty( $fields['section_2']['button']['target'] ) ? ' target="' . esc_attr( $list_item['section_2']['button']['target'] ) . '"' : '';
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
				if ( ! empty( $fields['section_2']['image_for_mobile'] ) ) : ?>
					<source media="(max-width: 500px)" srcset="<?php echo esc_url( $fields['section_2']['image_for_mobile'] ); ?>">
				<?php endif; ?>

				<?php 
				if ( ! empty( $fields['section_2']['image_for_pc'] ) ) : ?>
					<img 
						src="<?php echo esc_url( $fields['section_2']['image_for_pc'] ); ?>" 
						alt="<?php 
							if ( ! empty( $fields['section_2']['title'] ) ) {
								echo esc_html( wp_strip_all_tags( $fields['section_2']['title'] ) );
							}
						?>" class="bg-image"
					>
				<?php endif; ?>
			</picture>
			<div class="canada-rating">
				<div class="canada-article__container">
					<?php 
						if ( ! empty( $fields['section_2']['ratings'] ) ) : ?>
							<img src="<?php echo esc_url( $fields['section_2']['ratings'] ); ?>" alt="rating" class="ratings-image">
						<?php endif; ?>
				</div>
			</div>
		</div>
	</section>



	<section class="canada-section-3">
		<div class="canada-section-3__container">
			<div class="canada-section-3__locations">
				<?php 
				if ( (! empty( $fields['section_3']['locations'] )) && is_array( $fields['section_3']['locations'] ) ) {
					foreach ( $fields['section_3']['locations'] as $list_item ) {
						if ( ! empty( $list_item['location'] ) ) {
							?>
							<div class="canada-section-3__location animation_2" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
							<?php
							echo wp_kses_post( $list_item['location'] );
							?>
							</div>
							<?php
						}
					}
				}
				?>
			</div>

			<div class="canada-section-3__title">
				<h2>
				<?php 
				if ( ! empty( $fields['section_3']['title_yellow'] ) ) {
					?>
					<span class="title-yellow animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
					<?php
					echo wp_kses_post( $fields['section_3']['title_yellow'] );
					?>
					</span>
					<?php
				}
				?>
				<?php 
				if ( ! empty( $fields['section_3']['title_black'] ) ) {
					?>
					<span class="title-black animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
					<?php
					echo wp_kses_post( $fields['section_3']['title_black'] );
					?>
					</span>
					<?php
				}
				?>
				</h2>
			</div>

			<div class="canada-section-3__after-title">
				<div class="canada-section-3__persons">
					<picture>
						<?php 
						if ( ! empty( $fields['section_3']['persons_mobile'] ) ) : ?>
							<source media="(max-width: 768px)" srcset="<?php echo esc_url( $fields['section_3']['persons_mobile'] ); ?>">
						<?php endif; ?>

						<?php 
						if ( ! empty( $fields['section_3']['persons_pc'] ) ) : ?>
							<img 
								src="<?php echo esc_url( $fields['section_3']['persons_pc'] ); ?>" 
								alt=""
							>
						<?php endif; ?>
					</picture>
				</div>
				<div class="canada-section-3__persons-text">
					<?php 
					if ( ! empty( $fields['section_3']['text_after_image'] ) ) {
						echo wp_kses_post( $fields['section_3']['text_after_image'] );
					}
					?>
				</div>
			</div>

			<div class="canada-section-3__subtitle animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
				<?php 
				if ( ! empty( $fields['section_3']['subtitle'] ) ) {
					echo wp_kses_post( $fields['section_3']['subtitle'] );
				}
				?>
			</div>

			<div class="canada-section-3__description animation_3" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
				<?php 
				if ( ! empty( $fields['section_3']['description'] ) ) {
					echo wp_kses_post( $fields['section_3']['description'] );
				}
				?>
			</div>

			<div class="canada-section-3__cards">
				<?php
				$cards = $fields['section_3']['cards'];
				if ( (! empty( $cards )) && is_array( $cards ) ) {
					foreach ( $cards as $card) {
					?>
					<div class="canada-section-3__card">
						<div class="canada-section-3__icon-card">
							<?php 
							if ( ! empty( $card['icon'] ) ) : ?>
								<img src="<?php echo esc_url( $card['icon'] ); ?>" alt="icon">
							<?php endif; ?>
						</div>
						<div class="canada-section-3__title-card animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
							<?php 
							if ( ! empty( $card['title']  ) ) {
								echo wp_kses_post( $card['title']  );
							}
							?>
						</div>
						<div class="canada-section-3__text-card animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
							<?php 
							if ( ! empty( $card['text']  ) ) {
								echo wp_kses_post( $card['text']  );
							}
							?>
						</div>
					</div>
					<?php
					}
				}
				?>
			</div>
		</div>

		<div class="canada-article__image">
			<picture>
				<?php 
				if ( ! empty( $fields['section_3']['image_for_mobile'] ) ) : ?>
					<source media="(max-width: 768px)" srcset="<?php echo esc_url( $fields['section_3']['image_for_mobile'] ); ?>">
				<?php endif; ?>

				<?php 
				if ( ! empty( $fields['section_3']['image_for_pc'] ) ) : ?>
					<img 
						src="<?php echo esc_url( $fields['section_3']['image_for_pc'] ); ?>" 
						alt="<?php 
							if ( ! empty( $fields['section_3']['title'] ) ) {
								echo esc_html( wp_strip_all_tags( $fields['section_3']['title'] ) );
							}
						?>"
					>
				<?php endif; ?>
			</picture>
		</div>
	</section>



	
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


	<!-- Reusable Section for the Canada Singele Pages -->
	<?php
	// ID of your Reusable Section from CPT
	$canada_section_id = 9712;
	?>

	<section class="section-canada">

		<div class="hero rounded">
			<picture>
				<?php
				$image_url = get_field('main_background_picture_mobile', $canada_section_id);
				if ( $image_url ) :
				?>
				<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
				<?php endif; ?>
				
				<?php
				$image_url = get_field('main_background_picture_desktop', $canada_section_id);
				if ( $image_url ) :
				?>
					<img src="<?php echo esc_url( $image_url ); ?>" class="bg-image" alt="background">
				<?php endif; ?>
			</picture>

			<div class="section-canada__container">
				<picture>
					<?php
					$image_url = get_field('tagline_mobile', $canada_section_id);
					if ( $image_url ) :
					?>
					<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
					<?php endif; ?>
					
					<?php
					$image_url = get_field('tagline_desktop', $canada_section_id);
					if ( $image_url ) :
					?>
						<img src="<?php echo esc_url( $image_url ); ?>" alt="background">
					<?php endif; ?>
				</picture>
			</div>
		</div>

		<div class="four-cards">
			<div class="four-cards__container">
				<?php
				$card_1 = get_field('card_1', $canada_section_id);
				if ( $card_1 ) :
				?>
				<div class="four-cards__card four-cards__card--1">
					<picture>
						<?php
						$image_url = $card_1['background_picture_desktop'];
						if ( $image_url ) :
						?>
						<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
						<?php endif; ?>
						
						<?php
						$image_url = $card_1['background_picture_mobile'];
						if ( $image_url ) :
						?>
							<img src="<?php echo esc_url( $image_url ); ?>" class="bg-image" alt="background">
						<?php endif; ?>
					</picture>
					<div class="since-2008 animation_2" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
						<?php
						if ( $card_1['top_text'] ) {
							echo wp_kses_post($card_1['top_text']);
						}
						?>
					</div>
					<div class="title-card animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
						<?php
						if ( $card_1['title'] ) {
							echo wp_kses_post($card_1['title']);
						}
						?>
					</div>
					<div class="yellow-word animation_3" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
						<?php
						if ( $card_1['bottom_text'] ) {
							echo esc_html($card_1['bottom_text']);
						}
						?>
					</div>
				</div>
				<?php endif; ?>

				<?php
				$card_2 = get_field('card_2', $canada_section_id);
				if ( $card_2 ) :
				?>
				<div class="four-cards__card four-cards__card--2">
					<div class="wrapper-card">
						<div class="icon-card">
							<?php
							$image_url = $card_2['icon'];
							if ( $image_url ) :
							?>
								<img src="<?php echo esc_url( $image_url ); ?>" alt="icon">
							<?php endif; ?>
						</div>
						<div class="content-card">
							<div class="title-card animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
								<?php
								if ( $card_2['title'] ) {
									echo wp_kses_post($card_2['title']);
								}
								?>
							</div>
							<div class="text-card animation_3" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
								<?php
								if ( $card_2['text'] ) {
									echo wp_kses_post($card_2['text']);
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php
				$card_3 = get_field('card_3', $canada_section_id);
				if ( $card_3 ) :
				?>
				<div class="four-cards__card four-cards__card--3">
					<div class="wrapper-card">
						<div class="icon-card">
							<?php
							$image_url = $card_3['icon'];
							if ( $image_url ) :
							?>
								<img src="<?php echo esc_url( $image_url ); ?>" alt="icon">
							<?php endif; ?>
						</div>
						<div class="content-card">
							<div class="title-card animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
								<?php
								if ( $card_3['title'] ) {
									echo wp_kses_post($card_3['title']);
								}
								?>
							</div>
							<div class="text-card animation_3" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
								<?php
								if ( $card_3['text'] ) {
									echo wp_kses_post($card_3['text']);
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php
				$card_4 = get_field('card_4', $canada_section_id);
				if ( $card_4 ) :
				?>
				<div class="four-cards__card four-cards__card--4">
					<picture>
						<?php
						$image_url = $card_4['background_picture_desktop'];
						if ( $image_url ) :
						?>
						<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
						<?php endif; ?>
						
						<?php
						$image_url = $card_4['background_picture_mobile'];
						if ( $image_url ) :
						?>
							<img src="<?php echo esc_url( $image_url ); ?>" class="bg-image" alt="background">
						<?php endif; ?>
					</picture>
					<div class="since-2008 animation_2" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
						<?php
						if ( $card_4['top_text'] ) {
							echo wp_kses_post($card_1['top_text']);
						}
						?>
					</div>
					<div class="title-card animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
						<?php
						if ( $card_4['title'] ) {
							echo wp_kses_post($card_1['title']);
						}
						?>
					</div>
					<div class="yellow-word animation_3" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
						<?php
						if ( $card_4['bottom_text'] ) {
							echo esc_html($card_1['bottom_text']);
						}
						?>
					</div>
				</div>
				<?php endif; ?>

			</div>
		</div>
	</section>


	<section class="canada-contact">
		<picture>
			<?php
			$image_url = $fields['section_4']['background_picture_mobile'];
			if ( $image_url ) :
			?>
			<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
			<?php endif; ?>
			
			<?php
			$image_url = $fields['section_4']['background_picture_desktop'];
			if ( $image_url ) :
			?>
				<img src="<?php echo esc_url( $image_url ); ?>" class="bg-image" alt="background">
			<?php endif; ?>
		</picture>

		<div class="hero__container">
			<div class="canada-contact__top-text">
				<?php
				if ( $fields['section_4']['top_text'] ) {
					echo esc_html($fields['section_4']['top_text']);
				}
				?>
			</div>
			<div class="canada-contact__title">
				<?php
				if ( $fields['section_4']['title'] ) {
					echo wp_kses_post($fields['section_4']['title']);
				}
				?>
			</div>
		</div>

		<div id="request" class="hero-contact-block-wrapper">
			<div id="scrolltarget">
			</div>
			<div class="hero-contact-block-wrapper__container">
				<div class="hero-contact-block">
					<div class="request-quote">
						Request Quote Now to <?php
				if ( $fields['section_4']['location_in_the_bottom_form'] ) {
					echo esc_html($fields['section_4']['location_in_the_bottom_form']);
				}
				?>
					</div>
					<div class="gf-container">
						<?php echo do_shortcode('[gravityform id="4" title="false"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="contact-form-mobile" style="margin-bottom: 10px;">
		<div class="gf-container">
			<?php echo do_shortcode('[gravityform id="6" title="false"]'); ?>
		</div>
	</div>

</main>

<?php
get_footer();
?>
