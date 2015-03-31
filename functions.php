<?php
/**
 * Gently functions and definitions
 *
 * @package Gently
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'gently_setup' ) ) :

function gently_setup() {

    load_theme_textdomain( 'gently', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    /*
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'gently' ),
    ) );

    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link',
    ) );

    add_theme_support( 'custom-background', apply_filters( 'gently_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif; // gently_setup
add_action( 'after_setup_theme', 'gently_setup' );

function gently_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'gently' ),
        'id'            => 'main-sidebar',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'gently_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gently_scripts() {
    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'reset_css', get_template_directory_uri() . '/css/reset.css');
    wp_enqueue_style( 'font-awesome_css', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style( 'google_fonts_css', 'http://fonts.googleapis.com/css?family=Varela+Round');
    wp_enqueue_style( 'style_css', get_stylesheet_uri() );

    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.2', true);
    wp_enqueue_script( 'scrollReveal_js', get_template_directory_uri() . '/js/scrollReveal.min.js', array('jquery'), '2.1.0', true);
    wp_enqueue_script( 'evenZoom_js', get_template_directory_uri() . '/js/evenZoom.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'script_js', get_template_directory_uri() . '/js/script.js', array('jquery', 'bootstrap_js'), '0.1', true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'gently_scripts' );

add_theme_support( 'post-thumbnails' );

function gently_add_to_author_contact( $contactmethods ) {

    $contactmethods['gently_position'] = 'Position';
    $contactmethods['rss_url'] = 'RSS URL';
    $contactmethods['google_profile'] = 'Google Profile URL';
    $contactmethods['twitter_profile'] = 'Twitter Profile URL';
    $contactmethods['facebook_profile'] = 'Facebook Profile URL';
    $contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
    $contactmethods['dribbble_profile'] = 'Dribbble Profile URL';
    $contactmethods['behance_profile'] = 'Behance Profile URL';
    $contactmethods['codepen_profile'] = 'CodePen Profile URL';
    $contactmethods['github_profile'] = 'GitHub Profile URL';

    return $contactmethods;
}
add_filter( 'user_contactmethods', 'gently_add_to_author_contact', 10, 1);

require get_template_directory() . '/inc/cpanel.php';
/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/portfolio.php';
