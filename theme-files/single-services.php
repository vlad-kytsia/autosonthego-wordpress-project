<?php
/**
 * The Template for displaying Services single posts.
 */

get_header();
?>


<main id="primary" class="site-main page page--services">	
	<section class="hero contact-hero rounded">
		<picture>
            <?php
            $hero_mobile = get_field('hero_image_mobile');
            if ( $hero_mobile ) :
            ?>
                <source media="(max-width: 1024px)" srcset="<?php echo esc_url( $hero_mobile ); ?>">
            <?php endif; ?>

            <?php
            $hero_desktop = get_field('hero_image_desktop');
            if ( $hero_desktop ) :
            ?>
                <img src="<?php echo esc_url( $hero_desktop ); ?>" class="bg-image" alt="<?php the_title_attribute(); ?>">
            <?php endif; ?>
        </picture>


		<div class="hero__container">
			<div class="hero__label">
				<div class="circle">
                    <?php 
                    $archive_url = get_post_type_archive_link('services'); 
                    ?>
                    <a href="<?php echo esc_url($archive_url); ?>" class="services-back-link">
                        <svg width="25" height="6" viewBox="0 0 25 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 2.88672L5 -3.26633e-05V5.77347L0 2.88672ZM25 2.88672V3.38672H4.5V2.88672V2.38672H25V2.88672Z" fill="#FFFD74" />
                        </svg> 
                        Services
                    </a>
				</div> 
			</div>

            <h1>
                <?php
                the_title();
                ?>
            </h1>
		</div>
	</section>

    <section class="post-content">
        <div class="post-content__container">

            <!-- Content -->
            <div class="post-content__content">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) :
                        the_post();
                        
                        the_content();

                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile;
                } 
                ?>

                <?php
					$block_id = 9608; // ID reusable_video_block

					$text_before_the_social_links = get_field('text_before_the_social_links', $block_id);
                    $social_link = get_field('social_link', $block_id);
                    $first_text_in_the_yellow_block = get_field('first_text_in_the_yellow_block', $block_id);
                    $second_text_in_the_yellow_block = get_field('second_text_in_the_yellow_block', $block_id);
                    $phone_link = get_field('phone_link', $block_id);
                ?>

                <div class="service-bottom-block">
                    <div class="service-bottom-block__social">
                        <div class="service-bottom-block__social-text">
                            <?php
                            if ($text_before_the_social_links) {
                                echo esc_html($text_before_the_social_links);
                            }
                            ?>
                        </div>
                        <span>:</span>
                        <div class="service-bottom-block__social-links">
                            <?php
                            if ( ! empty( $social_link ) && is_array( $social_link ) ) {
	                            foreach ( $social_link as $link ) {
                                ?>
                                <a href="<?php echo esc_url($link['url']); ?>">
                                    <img src="<?php echo esc_url($link['icon']); ?>" alt="icon">
                                </a>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

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
            </div>

            <!-- Sidebar -->
            <div class="post-content__sidebar">
                <div class="sticky-block">
                    <?php
					$video_block_id = 9279; // ID reusable_video_block

					$video_block = get_field('reusable_video_block', $video_block_id);
					
					$title      = $video_block['title'] ?? '';
					$iframe     = $video_block['video_code'] ?? '';
					$text       = $video_block['text_and_link'] ?? '';
					$after_text = $video_block['text_after_button'] ?? '';

					// Allowed HTML for iframe
					$allowed_html = array(
						'iframe' => array(
							'width'           => array(),
							'height'          => array(),
							'src'             => array(),
							'frameborder'     => array(),
							'allow'           => array(),
							'allowfullscreen' => array(),
							'title'           => array(),
							'referrerpolicy'  => array(),
						),
					);
					?>

					<div class="video-block">

						<div class="video-block__title grey-circle animation_1"
							data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
							<?php if ( $title ) echo wp_kses_post( $title ); ?>
						</div>

						<div class="video-block__video">
							<?php if ( $iframe ) echo wp_kses( $iframe, $allowed_html ); ?>
						</div>

						<div class="video-block__text">
							<?php if ( $text ) echo wp_kses_post( $text ); ?>
						</div>

					</div>

					<a href="#scrolltarget" class="request-button">
						<span>Request Quote Now</span>
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/icons/arrow-form--right-black.svg" alt="arrow">
					</a>
                </div>
            </div>
        </div>
    
    </section>



    <section class="hero service-bottom-section rounded">
        <picture>
            <source media="(max-width: 1024px)" srcset="http://localhost:8888/autosonthego.com/wp-content/uploads/2025/12/service-bottom-mobile.webp">
            <img src="http://localhost:8888/autosonthego.com/wp-content/uploads/2025/12/service-bottom-pc.webp" class="bg-image" alt="background">
        </picture>

        <div id="request" class="hero-contact-block-wrapper">
            <div id="scrolltarget">
            </div>
            <div class="hero-contact-block-wrapper__container">
                <div class="hero-contact-block">
                    <div class="request-quote" bis_skin_checked="1">
						<div><span>Request Quote</span> <span>Now or Call</span></div>
                        <p><a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a></p>
					</div>
                    <div class="gf-container">
                        <?php echo do_shortcode('[gravityform id="4" title="false"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

	
    <div class="contact-form-mobile">
        <div class="gf-container">
            <?php echo do_shortcode('[gravityform id="6" title="false"]'); ?>
        </div>
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



    <section class="testimonials services-slider">
		<div class="testimonials__container">
			<div class="testimonials__header">
				<div class="testimonials__label white-circle animation_2" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
					route
				</div>
				<div class="testimonials__title animation_1" data-fls-watcher-threshold="0.25" data-fls-watcher-once data-fls-watcher>
					More Routes
                    & Services
				</div>
			</div>
			<div class="testimonials__body services">
				<div data-fls-slider="" class="testimonials__slider swiper">
					<div class="testimonials__wrapper swiper-wrapper">


                        <?php
                        $args = array(
                            'post_type'      => 'services',
                            'posts_per_page' => -1,
                            'order'          => 'DESC',
                        );

                        $query = new WP_Query($args);
                        $counter = 1;

                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                                $mobile_image  = get_field('featured_image_mobile');
                                $desktop_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                ?>

                            <!-- Slide -->
							<div class="testimonials__slide swiper-slide">
                                <a href="<?php the_permalink(); ?>" class="services__item services-item">
                                    <div class="service">
                                        <div class="service-top-line">
                                            <div class="service-text-wrapper">
                                                <div class="service__digit">
                                                    <?php echo sprintf('%02d', $counter); ?>
                                                </div>
                                                <div class="service__text">
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

                                            <div class="service__text--mobile">
                                                <?php the_title(); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="services-item__excerpt">
                                        <?php echo esc_html( get_the_excerpt() ); ?>
                                    </div>

                                    <div class="services-item__bottom-row">
                                        <span>more info</span>
                                        <svg width="25" height="6" viewBox="0 0 25 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M25 2.88672L20 -3.26633e-05V5.77347L25 2.88672ZM0 2.88672V3.38672H20.5V2.88672V2.38672H0V2.88672Z" fill="#FFFD74" />
                                        </svg>
                                    </div>
                                </a>
							</div><!-- Slide -->

                            <?php
                            $counter++;
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
						
					</div>
					<div class="swiper-buttons">
						<button type="button" class="swiper-button-prev">
							<div class="swiper-button-icon">
								<svg width="25" height="6" viewbox="0 0 25 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M0 2.88672L5 -3.25959e-05V5.77347L0 2.88672ZM25 2.88672V3.38672H4.5V2.88672V2.38672H25V2.88672Z" fill="white"></path>
								</svg>
							</div>
						</button>
						<button type="button" class="swiper-button-next">
							<div class="swiper-button-icon">
								<svg width="25" height="6" viewbox="0 0 25 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M0 2.88672L5 -3.25959e-05V5.77347L0 2.88672ZM25 2.88672V3.38672H4.5V2.88672V2.38672H25V2.88672Z" fill="white"></path>
								</svg>
							</div>
						</button>
					</div>
					<div id="faqs" style="height:0; border:initial; opacity:0; position:relative;">
					</div>
				</div>
			</div>
		</div>
	</section>




</main>


<script>
	document.addEventListener('DOMContentLoaded', function () {
		const container = document.querySelector('.post-content');
		if (!container) return;

		const elements = container.querySelectorAll('p, h1, h2, h3, h4, h5, h6, li');

		elements.forEach(el => {
			el.classList.add('animation_1');
			el.setAttribute('data-fls-watcher-threshold', '0.25');
			el.setAttribute('data-fls-watcher-once', '');
			el.setAttribute('data-fls-watcher', '');
		});
	});

</script>

<?php get_footer();?>


