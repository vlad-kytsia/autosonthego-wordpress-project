<?php
/**
 * AutosOnTheGo2025 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AutosOnTheGo2025
 */

if ( ! defined( '_S_VERSION' ) ) {
    define( '_S_VERSION', '1.0.0' );
}

function autosonthego2025_setup() {

    load_theme_textdomain( 'autosonthego2025', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'menus' );

    // Register navigation menus (includes the new footer menus)
    register_nav_menus( array(
        'main-menu'           => esc_html__( 'Primary', 'autosonthego2025' ),
        'header-small-menu-for-mobile' => esc_html__( 'Header Small Menu for Mobile', 'autosonthego2025' ),
        'footer-menu-column-1' => esc_html__( 'Footer Menu Column 1', 'autosonthego2025' ),
        'footer-menu-column-2' => esc_html__( 'Footer Menu Column 2', 'autosonthego2025' ),
        'footer-menu-column-3' => esc_html__( 'Footer Menu Column 3', 'autosonthego2025' ),
    ) );


    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action( 'after_setup_theme', 'autosonthego2025_setup' );

function autosonthego2025_post_thumbnail() {
    if ( has_post_thumbnail() ) {
        the_post_thumbnail('full');
    }
}

function autosonthego2025_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'autosonthego2025_content_width', 640 );
}
add_action( 'after_setup_theme', 'autosonthego2025_content_width', 0 );

function autosonthego2025_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'autosonthego2025' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'autosonthego2025' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'autosonthego2025_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function autosonthego2025_scripts() {
    wp_enqueue_style( 'autosonthego2025-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'autosonthego2025-style', 'rtl', 'replace' );
    wp_enqueue_style( 'autosonthego2025-style-main', get_template_directory_uri() . '/assets/css/app.min.css', array() );

    wp_enqueue_script( 'autosonthego2025-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'autosonthego2025-main', get_template_directory_uri() . '/assets/js/app.min.js', array(), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'autosonthego2025_scripts' );


if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}




/**
 * Add SVG to the list of allowed files
 * Adds SVG to the list of permitted files.
 */
add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

/**
 * Fix MIME type for SVG files.
 */
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ) {

    // WP 5.1+
    if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
        $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
    }
    else {
        $dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
    }

    if( $dosvg ){

        // allow
        if( current_user_can('manage_options') ){
            $data['ext'] = 'svg';
            $data['type'] = 'image/svg+xml';
        }
        // disable
        else {
            $data['ext'] = false;
            $data['type'] = false;
        }

    }

    return $data;
}



// Register Gutenberg block style variations
require get_template_directory() . '/inc/block-styles.php';

// Add Gutenberg editor styles (backend)
function autos_editor_styles() {
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'autos_editor_styles' );



// Register Gutenberg block (Images PC/Mobile)
function autos_register_custom_blocks() {
    register_block_type( get_template_directory() . '/blocks/dual-image' );
}
add_action( 'init', 'autos_register_custom_blocks' );

