<?php
/* Template Name: Terms Template. Post Type: page */
get_header();
?>

<?php 
$fields = get_fields(); 
?>


<main id="primary" class="site-main page page-terms">	
	<section class="hero about-hero canada-hero rounded">
		<picture>
			<?php
			$image_url = $fields['section_1']['background_picture_mobile'];
			if ( $image_url ) :
			?>
			<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_url ); ?>">
			<?php endif; ?>
			
			<?php
			$image_url = $fields['section_1']['background_picture_desktop'];
			if ( $image_url ) :
			?>
				<img src="<?php echo esc_url( $image_url ); ?>" class="bg-image" alt="background">
			<?php endif; ?>
		</picture>
		<div class="hero__container">
			<div class="hero__label">
				<div class="services-back-link">
					<div class="circle">
						TERMS
					</div> 
				</div>
			</div>
			
			<?php 
			if ( ! empty( $fields['section_1']['title'] ) ) {
				echo wp_kses_post( $fields['section_1']['title'] );
			}
			?>

			<div class="terms-hero-text">
				<?php 
				if ( ! empty( $fields['section_1']['text'] ) ) {
					echo wp_kses_post( $fields['section_1']['text'] );
				}
				?>
			</div>
		</div>
	</section>



	<section class="post-content section-guttenberg-content">
		<div class="section-guttenberg-content__container">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			endif;
			?>

			<div class="service-bottom-block">

				<?php
					$block_id = 9608; // ID reusable_video_block

					$text_before_the_social_links = get_field('text_before_the_social_links', $block_id);
					$social_link = get_field('social_link', $block_id);
					$first_text_in_the_yellow_block = get_field('first_text_in_the_yellow_block', $block_id);
					$second_text_in_the_yellow_block = get_field('second_text_in_the_yellow_block', $block_id);
					$phone_link = get_field('phone_link', $block_id);
				?>

				<?php
				if ( ! empty( $phone_link ) && is_array( $phone_link ) ) :
					$link_url    = ! empty( $phone_link['url'] ) ? $phone_link['url'] : '#';
					$link_title  = ! empty( $phone_link['title'] ) ? $phone_link['title'] : '';
					$link_target = ! empty( $phone_link['target'] ) ? ' target="' . esc_attr( $phone_link['target'] ) . '"' : '';
				?>
				<a href="<?php echo esc_url( $link_url ); ?>" <?php echo $link_target; ?> class="request-button">
					<div class="first-text">
						<?php
						if ($first_text_in_the_yellow_block) {
							echo esc_html($first_text_in_the_yellow_block);
						}
						?>
					</div>
					<div class="second-text">
						<?php
						if ($second_text_in_the_yellow_block) {
							echo esc_html($second_text_in_the_yellow_block);
						}
						?>
					</div>
					<div class="phone-link">
							<div class="phone-link">
								<?php echo esc_html( $link_title ); ?>
							</div>
						<?php endif; ?>
					</div>
				</a>
			</div>

			<p class="terms-last-paraghraph">
				<span>MC# 660651</span> <span>DOT# 2243259</span> 
				<img src="http://localhost:8888/autosonthego.com/wp-content/uploads/2025/12/fmcsa.webp" alt="">
			</p>
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

</main>

<script>
	const container = document.querySelector('.post-content');
	if (container) {
		const elements = container.querySelectorAll('p, h1, h2, h3, h4, h5, h6, li');

		elements.forEach(el => {
			el.classList.add('animation_1');
			el.setAttribute('data-fls-watcher-threshold', '0.05');
			el.setAttribute('data-fls-watcher-once', '');
			el.setAttribute('data-fls-watcher', '');
		});
	}
</script>

<?php
get_footer();
?>
