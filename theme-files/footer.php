			<footer data-fls-footer="" class="footer">
				<picture>
					
					<?php
					if ( function_exists( 'get_field' ) ) :
						$footer_image_url = get_field( 'background_mobile', 'option' );
						if ( $footer_image_url ) :
							?>
							<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $footer_image_url ); ?>">
							<?php
						endif;
					endif;
					?>
					
					<?php
					if ( function_exists( 'get_field' ) ) :
						$footer_image_url = get_field( 'background_pc', 'option' );
						if ( $footer_image_url ) :
							?>
							<img src="<?php echo esc_url( $footer_image_url ); ?>" class="bg-image" alt="background" >
							<?php
						endif;
					endif;
					?>
				</picture>


				<div class="footer__container">
					<div class="footer-top">
						<div class="footer__aside">
							<div class="footer__logo">
								<?php
								if ( function_exists( 'get_field' ) ) :
									$footer_logo_url = get_field( 'logo', 'option' );
									if ( $footer_logo_url ) :
										?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<img src="<?php echo esc_url( $footer_logo_url ); ?>" alt="logo">
										</a>
										<?php
									endif;
								endif;
								?>
							</div>
							<?php
							if ( function_exists( 'get_field' ) ) :
								$field = get_field( 'text_after_logo', 'option' );
								if ( $field ) :
									?>
									<?php echo wp_kses_post( $field ); ?>
									<?php
								endif;
							endif;
							?>
							<div class="footer__logos">
								<?php
								if ( function_exists( 'get_field' ) ) :
									$social_links = get_field( 'social_links', 'option' );
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
						<div class="footer__content">
							<div class="footer__col footer__col--1">
								<div class="footer__title">
									<h3>Services</h3>
								</div>
								<div class="footer__text">
									<?php
									wp_nav_menu( array(
										'theme_location' => 'footer-menu-column-1',
										'container'      => false, 
										'menu_class'     => 'footer-menu-col-1-list', // Клас для <ul>
										'depth'          => 1, 
										'fallback_cb'    => false, 
									) );
									?>
								</div>
							</div>
							<div class="footer__col footer__col--2">
								<div class="footer__title"></div>
								<div class="footer__text">
									<?php
									wp_nav_menu( array(
										'theme_location' => 'footer-menu-column-2',
										'container'      => false, 
										'menu_class'     => 'footer-menu-col-2-list', // Клас для <ul>
										'depth'          => 1, 
										'fallback_cb'    => false, 
									) );
									?>
								</div>
							</div>
							<div class="footer__col footer__col--3">
								<div class="footer__title">
									<h3>Customer</h3>
								</div>
								<div class="footer-menu">
									<div class="footer-menu__pages">
										<?php
										wp_nav_menu( array(
											'theme_location' => 'footer-menu-column-3',
											'container'      => false, 
											'menu_class'     => 'footer-menu-col-3-list', // Клас для <ul>
											'depth'          => 1, 
											'fallback_cb'    => false, 
										) );
										?>
									</div>
								</div>
								<div class="text-after-menu">
									<?php
									if ( function_exists( 'get_field' ) ) :
										$field = get_field( 'text_after_menu', 'option' );
										if ( $field ) :
											?>
											<?php echo wp_kses_post( $field ); ?>
											<?php
										endif;
									endif;
									?>

									<?php
									if ( function_exists( 'get_field' ) ) :
										$field = get_field( 'last_logo', 'option' );
										if ( $field ) :
											?>
											<img src="<?php echo esc_url($field); ?>" alt="logo">
											<?php
										endif;
									endif;
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="footer__bottom">
						<span class="copyright">
							<?php
							if ( function_exists( 'get_field' ) ) :
								$field = get_field( 'copyright', 'option' );
								if ( $field ) :
									?>
									<?php echo esc_html( $field ); ?>
									<?php
								endif;
							endif;
							?>
						</span>
						<span class="door-to-door">
							<?php
							if ( function_exists( 'get_field' ) ) :
								$field = get_field( 'slogan', 'option' );
								if ( $field ) :
									?>
									<?php 
										echo $field;
									?>
									<?php
								endif;
							endif;
							?>
						</span>
					</div>
				</div>
			</footer>
			<div class="footer-bg-wrapper">
				<div class="footer-bg <?php echo is_front_page() ? esc_attr( ' home-page' ) : ''; ?>"></div>
			</div>


		</div>
		<?php wp_footer(); ?>

<script>
// Function to handle the checkbox change and text color update (Shared logic)
function updateLabelText(checkbox, textContent) {
    // Check for the presence of the checkbox element
    if (checkbox) {
        const parentChoice = checkbox.parentNode;

        // Check for the presence of the parent container element
        if (parentChoice) {
            // Find or create the span element with the specific class
            let openTextElement = parentChoice.querySelector('.custom-status-text');

            if (!openTextElement) {
                // If it doesn't exist, create it and insert it BEFORE the checkbox
                openTextElement = document.createElement('span');
                // Set the specific text for this item
                openTextElement.textContent = textContent; 
                // Using a more general class name to avoid conflict if 'open-text' is used elsewhere
                openTextElement.classList.add('custom-status-text'); 
                
                // Вставляємо span перед input
                parentChoice.insertBefore(openTextElement, checkbox);
            }

            // Update the color based on the checkbox state
            if (checkbox.checked) {
                // Checkbox is selected (checked) -> White text
                openTextElement.style.color = 'white';
            } else {
                // Checkbox is not selected (unchecked) -> Yellow text
                openTextElement.style.color = '#FFFD74'; 
            }
        }
    }
}

// Function to initialize the 'Open/Enclosed' checkbox (choice_4_124_1)
function initCheckboxOpenFirst() {
    const checkbox = document.getElementById('choice_4_124_1');

    // Perform check for the presence of the element before using it
    if (checkbox) {
        // Initial state update on load ('OPEN' is the desired text)
        updateLabelText(checkbox, 'OPEN');

        // Add event listener
        checkbox.addEventListener('change', function() {
            updateLabelText(this, 'OPEN');
        });
    }
}

// Function to initialize the 'Running/Not Running' checkbox (choice_4_123_1)
function initCheckboxRunningFirst() {
    const checkbox = document.getElementById('choice_4_123_1');

    // Perform check for the presence of the element before using it
    if (checkbox) {
        // Initial state update on load ('RUNNING' is the desired text)
        updateLabelText(checkbox, 'RUNNING');

        // Add event listener
        checkbox.addEventListener('change', function() {
            updateLabelText(this, 'RUNNING');
        });
    }
}

// Function to initialize the SECOND 'Open/Enclosed' checkbox (choice_6_124_1)
function initCheckboxOpenSecond() {
    const checkbox = document.getElementById('choice_6_124_1');

    // Perform check for the presence of the element before using it
    if (checkbox) {
        // Initial state update on load ('OPEN' is the desired text)
        updateLabelText(checkbox, 'OPEN');

        // Add event listener
        checkbox.addEventListener('change', function() {
            updateLabelText(this, 'OPEN');
        });
    }
}

// Function to initialize the SECOND 'Running/Not Running' checkbox (choice_6_123_1)
function initCheckboxRunningSecond() {
    const checkbox = document.getElementById('choice_6_123_1');

    // Perform check for the presence of the element before using it
    if (checkbox) {
        // Initial state update on load ('RUNNING' is the desired text)
        updateLabelText(checkbox, 'RUNNING');

        // Add event listener
        checkbox.addEventListener('change', function() {
            updateLabelText(this, 'RUNNING');
        });
    }
}


// Run the initialization functions once the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    initCheckboxOpenFirst();
    initCheckboxRunningFirst();
    initCheckboxOpenSecond();
    initCheckboxRunningSecond(); // Додано новий ініціалізатор
});
</script>

	</body>
</html>
