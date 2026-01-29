<?php
/* Template Name: Contact Us Page Template. Post Type: page */
get_header();
?>

<?php 
$fields = get_fields(); 
?>


<main id="primary" class="site-main page page--about">	
	<section class="hero contact-hero rounded">
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


	<div class="section-2">
		<div class="section-2__container">
			<div class="section-2__title animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
				<?php 
				if ( ! empty( $fields['section_2']['title'] ) ) {
					echo wp_kses_post( $fields['section_2']['title'] );
				}
				?>
			</div>
			<div class="section-2__description animation_3" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
				<?php 
				if ( ! empty( $fields['section_2']['description'] ) ) {
					echo wp_kses_post( $fields['section_2']['description'] );
				}
				?>
			</div>

			<div class="section-2__row">
				<div class="section-2__col">
					<div class="card-1">
						<picture>
							<?php
							$image_url = $fields['section_2']['card_1']['background_picture_mobile'];
							if ( $image_url ) :
							?>
								<source media="(max-width: 1024px)" srcset="<?php echo esc_url($image_url); ?>">
							<?php endif; ?>

							<?php
							$image_url = $fields['section_2']['card_1']['background_picture_pc'];
							if ( $image_url ) :
							?>
								<img src="<?php echo esc_url($image_url); ?>" class="bg-image" alt="background">
							<?php endif; ?>
						</picture>
						<div class="card-1__icon">
							<?php
							$image_url = $fields['section_2']['card_1']['icon'];
							if ( $image_url ) :
							?>
								<img src="<?php echo esc_url($image_url); ?>" alt="icon">
							<?php endif; ?>
						</div>
						<div class="card-1__content">
							<div class="card-1__row">
								<div class="card-1__col">
									<?php 
									if ( ! empty( $fields['section_2']['card_1']['title_1'] ) ) {
										echo esc_html( $fields['section_2']['card_1']['title_1'] );
									}
									?>
								</div>
								<div class="card-1__col">
									<?php
										$link = $fields['section_2']['card_1']['phone'];
										$link_url    = ! empty( $link['url'] ) ? $link['url'] : '#';
										$link_title  = ! empty( $link['title'] ) ? $link['title'] : '';
										$link_target = ! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '';
									?>
									<a href="<?php echo esc_url( $link_url ); ?>" <?php echo $link_target; ?> rel="noopener"><?php echo esc_html( $link_title ); ?></a>
								</div>
							</div>
							<div class="card-1__row">
								<div class="card-1__col">
									<?php 
									if ( ! empty( $fields['section_2']['card_1']['title_2'] ) ) {
										echo esc_html( $fields['section_2']['card_1']['title_2'] );
									}
									?>
								</div>
								<div class="card-1__col">
									<?php
										$link = $fields['section_2']['card_1']['email'];
										$link_url    = ! empty( $link['url'] ) ? $link['url'] : '#';
										$link_title  = ! empty( $link['title'] ) ? $link['title'] : '';
										$link_target = ! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '';
									?>
									<a href="<?php echo esc_url( $link_url ); ?>" <?php echo $link_target; ?>><?php echo esc_html( $link_title ); ?></a>
								</div>
							</div>
							<div class="card-1__row">
								<div class="card-1__col">
									<?php 
									if ( ! empty( $fields['section_2']['card_1']['title_3'] ) ) {
										echo esc_html( $fields['section_2']['card_1']['title_3'] );
									}
									?>
								</div>
								<div class="card-1__col">
									<?php
										$link = $fields['section_2']['card_1']['social_link_1'];
										$link_url    = ! empty( $link['url'] ) ? $link['url'] : '#';
										$link_title  = ! empty( $link['title'] ) ? $link['title'] : '';
										$link_target = ! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '';
										if ($link) {
											?>
											<a href="<?php echo esc_url( $link_url ); ?>" <?php echo $link_target; ?>  rel="noopener"> 
												<?php
												$image_url = $fields['section_2']['card_1']['social_icon_1'];
												if ( $image_url ) :
												?>
													<img src="<?php echo esc_url($image_url); ?>" alt="icon">
												<?php endif; ?>
											</a>
											<?php
										}
									?>

									<?php
										$link = $fields['section_2']['card_1']['social_link_2'];
										$link_url    = ! empty( $link['url'] ) ? $link['url'] : '#';
										$link_title  = ! empty( $link['title'] ) ? $link['title'] : '';
										$link_target = ! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '';
										if ($link) {
											?>
											<a href="<?php echo esc_url( $link_url ); ?>" <?php echo $link_target; ?>  rel="noopener"> 
												<?php
												$image_url = $fields['section_2']['card_1']['social_icon_2'];
												if ( $image_url ) :
												?>
													<img src="<?php echo esc_url($image_url); ?>" alt="icon">
												<?php endif; ?>
											</a>
											<?php
										}
									?>
								</div>
							</div>
						</div>
					</div>

					<div class="card-2">
						<div class="card-2__icon">
							<img src="http://localhost:8888/autosonthego.com/wp-content/uploads/2025/12/contact-icon-1.svg" alt="icon">
						</div>
						<div class="card-2__content">
							<div class="card-2__label">
								<?php 
								if ( ! empty( $fields['section_2']['card_2']['label'] ) ) {
									echo esc_html( $fields['section_2']['card_2']['label'] );
								}
								?>
							</div>
							<div class="card-2__text animation_3" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
								<?php 
								if ( ! empty( $fields['section_2']['card_2']['text'] ) ) {
									echo wp_kses_post( $fields['section_2']['card_2']['text'] );
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="section-2__col">
					FORM
				</div>
			</div>
		</div>
	</div>


	<section class="slogan-contact">
		<div class="slogan-contact__container">
			<div class="first-slogan animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
				<?php 
				if ( ! empty( $fields['section_3']['tagline_1'] ) ) {
					echo wp_kses_post( $fields['section_3']['tagline_1'] );
				}
				?>
			</div>
			<div class="shipping__images">
				<div class="shipping__image animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
					<?php
					$image_url = $fields['section_3']['image_1'];
					if ( $image_url ) :
					?>
						<img src="<?php echo esc_url($image_url); ?>" alt="delivery">
					<?php endif; ?>
				</div>
				<div class="shipping__image-wide animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
					<?php
					$image_url = $fields['section_3']['image_2'];
					if ( $image_url ) :
					?>
						<img src="<?php echo esc_url($image_url); ?>" alt="delivery">
					<?php endif; ?>
				</div>
				<div class="shipping__image animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
					<?php
					$image_url = $fields['section_3']['image_3'];
					if ( $image_url ) :
					?>
						<img src="<?php echo esc_url($image_url); ?>" alt="delivery">
					<?php endif; ?>
				</div>
			</div>
			<div class="second-slogan animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
				<picture>
					<?php
					$image_url = $fields['section_3']['second_tagline_mobile'];
					if ( $image_url ) :
					?>
						<source media="(max-width: 1024px)" srcset="<?php echo esc_url($image_url); ?>">
					<?php endif; ?>

					<?php
					$image_url = $fields['section_3']['second_tagline_ipc'];
					if ( $image_url ) :
					?>
						<img src="<?php echo esc_url($image_url); ?>" alt="background">
					<?php endif; ?>
				</picture>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
?>
