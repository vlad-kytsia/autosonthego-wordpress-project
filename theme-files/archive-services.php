<?php
/**
 * Template for Services Archive
 */

get_header();
?>


<?php 
$section_1 = get_field('section_1', 'option');
$section_2 = get_field('section_2', 'option');
$section_3 = get_field('section_3', 'option');
?>


<main id="primary" class="site-main page page--services">	
	<section class="hero contact-hero rounded">
		<picture>
			<?php
			$image_url = $section_1['background_picture_for_mobile'] ?? '';
			if ( $image_url ) :
			?>
				<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
			<?php endif; ?>

			<?php
			$image_url = $section_1['background_picture_for_pc'] ?? '';
			if ( $image_url ) :
			?>
				<img src="<?php echo esc_url( $image_url ); ?>" class="bg-image" alt="background">
			<?php endif; ?>
		</picture>

		<div class="hero__container">
			<div class="hero__label">
				<div class="circle">
					<?php 
					if ( ! empty( $section_1['label'] ) ) {
						echo esc_html( $section_1['label'] );
					}
					?>
				</div> 
			</div>

			<?php 
			if ( ! empty( $section_1['title'] ) ) {
				echo wp_kses_post( $section_1['title'] );
			}
			?>
		</div>
	</section>



	<div class="services-section-2">
		<div class="services-section-2__container">
			<div class="services-section-2__row">

				<div class="services-section-2__col">

					<div class="services-section-2__title animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
						<?php 
						if ( ! empty( $section_2['title'] ) ) {
							echo wp_kses_post( $section_2['title'] );
						}
						?>
					</div>

					<div class="services-section-2__images">
						<picture>
							<?php
							$image_url = $section_2['image_mobile'] ?? '';
							if ( $image_url ) :
							?>
								<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
							<?php endif; ?>

							<?php
							$image_url = $section_2['image_pc'] ?? '';
							if ( $image_url ) :
							?>
								<img src="<?php echo esc_url( $image_url ); ?>" alt="background">
							<?php endif; ?>
						</picture>
					</div>

					<div class="services-section-2__text--bottom animation_3" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
						<?php 
						if ( ! empty( $section_2['text_bottom'] ) ) {
							echo wp_kses_post( $section_2['text_bottom'] );
						}
						?>
					</div>

				</div>

				<div class="services-section-2__col">
					<div class="services-section-2__text animation_3" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
						<?php 
						if ( ! empty( $section_2['text_in_the_right_column'] ) ) {
							echo wp_kses_post( $section_2['text_in_the_right_column'] );
						}
						?>
					</div>
				</div>

			</div>
		</div>
	</div>


	<div class="services-bg-image">
		<picture>
			<?php
			$image_url = $section_2['background_image_for_mobile'] ?? '';
			if ( $image_url ) :
			?>
				<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
			<?php endif; ?>

			<?php
			$image_url = $section_2['background_image_for_pc'] ?? '';
			if ( $image_url ) :
			?>
				<img src="<?php echo esc_url( $image_url ); ?>" alt="background">
			<?php endif; ?>
		</picture>
	</div>






	<!-- LIST OF ALL CPT SERVICES -->
	<section class="services">
		<div class="services__container">

			<div class="services__header">
				<div class="services__label white-circle animation_2" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
					<?php 
					if ( ! empty( $section_3['label'] ) ) {
						echo esc_html( $section_3['label'] );
					}
					?>	
				</div>
				<div class="services__title animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
					<?php 
					if ( ! empty( $section_3['title'] ) ) {
						echo wp_kses_post( $section_3['title'] );
					}
					?>	
				</div>
			</div>

			<div class="services__body">
				<div class="services__items">

				<?php
				$args = array(
					'post_type'      => 'services',
					'posts_per_page' => 10,
					'order'          => 'DESC',
				);

				$query = new WP_Query($args);
				$counter = 1;

				if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post();

						$additional_class = ($counter == 4 || $counter == 5) ? "services__item--big" : "";

						$mobile_image  = get_field('featured_image_mobile');
						$desktop_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
						?>
						
						<a href="<?php the_permalink(); ?>" class="services__item services-item <?php echo $additional_class; ?>">
							<div class="service">

								<div class="service-top-line">
									<div class="service-text-wrapper">
										<div class="service__digit">
											<?php echo sprintf('%02d', $counter); ?>
										</div>
										<div class="service__text animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
											<?php the_title(); ?>
										</div>
									</div>
									
									<div class="service__image">
										<picture>
											<?php if (!empty($mobile_image)) : ?>
												<source media="(max-width: 1024px)" srcset="<?php echo esc_url($mobile_image['url']); ?>">
											<?php endif; ?>
											<img src="<?php echo esc_url($desktop_image); ?>" alt="<?php the_title(); ?>">
										</picture>
									</div>

									<div class="service__text--mobile animation_1" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
										<?php the_title(); ?>
									</div>
								</div>
							</div>

							<div class="services-item__excerpt animation_3" data-fls-watcher-threshold="0.15" data-fls-watcher-once data-fls-watcher>
								<?php echo esc_html( get_the_excerpt() ); ?>
							</div>

							<div class="services-item__bottom-row">
								<span>more info</span>
								<svg width="25" height="6" viewBox="0 0 25 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M25 2.88672L20 -3.26633e-05V5.77347L25 2.88672ZM0 2.88672V3.38672H20.5V2.88672V2.38672H0V2.88672Z" fill="#FFFD74" />
								</svg>
							</div>
							

						</a>

					<?php
					$counter++;
					endwhile;
					wp_reset_postdata();
				endif;
				?>

					<!-- BUTTON BLOCK  -->
					<div class="services__item services__buttons services__item--big">
						<div class="services-buttons">

							<?php
							if ( ! empty( $section_3['button_1'] ) ) :
								$link_url = $section_3['button_1'];
								?>
								<a href="<?php echo esc_url( $link_url ); ?>" class="services-button-1">
									<?php 
									if ( ! empty( $section_3['button_1_text'] ) ) {
										echo wp_kses_post( $section_3['button_1_text'] );
									}
									?>	
								</a>
							<?php endif; ?>

							<?php
							if ( ! empty( $section_3['button_2'] ) && is_array( $section_3['button_2'] ) ) :
								$link = $section_3['button_2'];
								$link_url    = ! empty( $link['url'] ) ? $link['url'] : '#';
								$link_title  = ! empty( $link['title'] ) ? $link['title'] : 'Button';
								$link_target = ! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '';
								?>
								<a href="<?php echo esc_url( $link_url ); ?>" class="services-button-2" <?php echo $link_target; ?>>
									<span><?php echo esc_html( $link_title ); ?></span>
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icons/arrow-form--right-black.svg" alt="arrow">
								</a>
							<?php endif; ?>
						</div>
						<div class="services-tagline">
							<?php 
							if ( ! empty( $section_3['tagline'] ) ) {
								echo wp_kses_post ( $section_3['tagline'] );
							}
							?>	
						</div>
					</div>

				</div>
			</div>

		</div>
	</section>


</main>

<?php
get_footer();
?>
