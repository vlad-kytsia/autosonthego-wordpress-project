<?php
/* Template Name: About Us Page Template. Post Type: page */
get_header();
?>

<?php 
$fields = get_fields(); 
?>


<main id="primary" class="site-main page page--about">	
	<section class="hero about-hero rounded">
		<picture>
			<?php
			$image_url = $fields['section_1']['background_picture_for_mobile'];
			if ( $image_url ) :
			?>
			<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
			<?php endif; ?>
			
			<?php
			$image_url = $fields['section_1']['background_picture_for_pc'];
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


	<div class="about-section-3">
		<div class="about-section-3__container">
			<div class="about-section-3__title animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
				<?php 
				if ( ! empty( $fields['section_3']['title'] ) ) {
					echo wp_kses_post( $fields['section_3']['title'] );
				}
				?>
			</div>
			<div class="about-section-3__text animation_3" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
				<?php 
				if ( ! empty( $fields['section_3']['text'] ) ) {
					echo wp_kses_post( $fields['section_3']['text'] );
				}
				?>
			</div>
		</div>
	</div>


	<section class="why why-about rounded">
		<picture>
			<?php
			$image_url = $fields['section_4']['background_image_for_mobile'];
			if ( $image_url ) :
			?>
			<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
			<?php endif; ?>
			
			<?php
			$image_url = $fields['section_4']['background_image_for_pc'];
			if ( $image_url ) :
			?>
				<img src="<?php echo esc_url( $image_url ); ?>" class="bg-image" alt="background">
			<?php endif; ?>
		</picture>

		<div class="why__container">
			<div class="why__title animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
				<?php 
				if ( ! empty( $fields['section_4']['title'] ) ) {
					echo wp_kses_post( $fields['section_4']['title'] );
				}
				?>
			</div>
			<div class="why-items">
				<div class="why-item why-item--1">
					<div class="why-item__image">
						<?php
						$image_url = $fields['section_4']['item_icon_1'];
						if ( $image_url ) :
						?>
							<img src="<?php echo esc_url( $image_url ); ?>" alt="icon">
						<?php endif; ?>
					</div>
					<div class="why-item__title animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
						<?php 
						if ( ! empty( $fields['section_4']['item_title_1'] ) ) {
							echo wp_kses_post( $fields['section_4']['item_title_1'] );
						}
						?>
					</div>
					<div class="why-item__text animation_3" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
						<?php 
						if ( ! empty( $fields['section_4']['item_text_1'] ) ) {
							echo wp_kses_post( $fields['section_4']['item_text_1'] );
						}
						?>
					</div>
				</div>
				<div class="why-item why-item--2">
					<div class="why-item__image">
						<?php
						$image_url = $fields['section_4']['item_icon_2'];
						if ( $image_url ) :
						?>
							<img src="<?php echo esc_url( $image_url ); ?>" alt="icon">
						<?php endif; ?>
					</div>
					<div class="why-item__title animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
						<?php 
						if ( ! empty( $fields['section_4']['item_title_2'] ) ) {
							echo wp_kses_post( $fields['section_4']['item_title_2'] );
						}
						?>
					</div>
					<div class="why-item__text animation_3" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
						<?php 
						if ( ! empty( $fields['section_4']['item_text_2'] ) ) {
							echo wp_kses_post( $fields['section_4']['item_text_2'] );
						}
						?>
					</div>
				</div>
				<div class="why-item why-item--3">
					<div class="why-item__image">
						<?php
						$image_url = $fields['section_4']['item_icon_3'];
						if ( $image_url ) :
						?>
							<img src="<?php echo esc_url( $image_url ); ?>" alt="icon">
						<?php endif; ?>
					</div>
					<div class="why-item__title animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
						<?php 
						if ( ! empty( $fields['section_4']['item_title_3'] ) ) {
							echo wp_kses_post( $fields['section_4']['item_title_3'] );
						}
						?>
					</div>
					<div class="why-item__text animation_3" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
						<?php 
						if ( ! empty( $fields['section_4']['item_text_3'] ) ) {
							echo wp_kses_post( $fields['section_4']['item_text_3'] );
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>


	<div class="our-clients">
		<div class="our-clients__container">
			<div class="our-clients__col--left">
				<div class="services__label white-circle animation_2" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
					<?php 
					if ( ! empty( $fields['section_5']['label'] ) ) {
						echo esc_html( $fields['section_5']['label'] );
					}
					?>
				</div>
				<div class="our-clients__title animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
					<?php 
					if ( ! empty( $fields['section_5']['title'] ) ) {
						echo wp_kses_post( $fields['section_5']['title'] );
					}
					?>
				</div>
			</div>
			<div class="our-clients__col--right">
				<div class="our-clients__items">

					<?php
					$repeater_field_name = 'cards'; // Slug поля Repeater
					$list_items = $fields['section_5'][$repeater_field_name];

					if ( ! empty( $list_items ) && is_array( $list_items ) ) {
						foreach ( $list_items as $list_item ) {
							?>
							<div class="our-clients__item our-clients-item">
								<div class="our-clients-item__col--image">
									<?php
									$image_url = $list_item['image'];
									if ( $image_url ) :
									?>
										<img src="<?php echo esc_url( $image_url ); ?>" alt="image">
									<?php endif; ?>
								</div>
								<div class="divider"></div>
								<div class="our-clients-item__col--content">
									<div class="our-clients-item__title animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
										<?php 
										if ( ! empty( $list_item['title'] ) ) {
											echo wp_kses_post( $list_item['title'] );
										}
										?>
									</div>
									<div class="our-clients-item__text animation_3" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
										<?php 
										if ( ! empty( $list_item['text'] ) ) {
											echo wp_kses_post( $list_item['text'] );
										}
										?>
									</div>
								</div>
							</div>
						<?php
						}
					}
					?>

				</div>
			</div>
		</div>
	</div>


	<div class="team">
		<div class="team__container">
			<div class="team__col team__col--title">
				<div class="team__title animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
					<?php 
					if ( ! empty( $fields['section_6']['title'] ) ) {
						echo wp_kses_post( $fields['section_6']['title'] );
					}
					?>
				</div>
				<div class="team__description animation_3" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
					<?php 
					if ( ! empty( $fields['section_6']['description'] ) ) {
						echo wp_kses_post( $fields['section_6']['description'] );
					}
					?>
				</div>
			</div>

			<?php
				$list_items = $fields['section_6']['team'];

				if ( ! empty( $list_items ) && is_array( $list_items ) ) {
					foreach ( $list_items as $list_item ) {
					?>
					<div class="team__col">
						<div class="team__photo">
							<?php
							$image_url = $list_item['image'];
							if ( $image_url ) :
							?>
								<img src="<?php echo esc_url( $image_url ); ?>" alt="member">
							<?php endif; ?>
						</div>
						<div class="team__name animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
							<?php 
							if ( ! empty( $list_item['name'] ) ) {
								echo wp_kses_post( $list_item['name'] );
							}
							?>
						</div>
						<div class="team__position animation_3" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
							<?php 
							if ( ! empty( $list_item['position'] ) ) {
								echo wp_kses_post( $list_item['position'] );
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


	<div class="slogan">
		<div class="slogan__container">
			<div class="slogan__image">
				<picture>
					<?php
					$image_url = $fields['section_7']['image_for_mobile'];
					if ( $image_url ) :
					?>
					<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
					<?php endif; ?>
					
					<?php
					$image_url = $fields['section_7']['image'];
					if ( $image_url ) :
					?>
						<img src="<?php echo esc_url( $image_url ); ?>" alt="background">
					<?php endif; ?>
				</picture>
			</div>
			<div class="slogan__text animation_3" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
				<?php 
				if ( ! empty( $fields['section_7']['text'] ) ) {
					echo wp_kses_post( $fields['section_7']['text'] );
				}
				?>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
?>
