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
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
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
    wp_enqueue_script( 'script_js', get_template_directory_uri() . '/js/script.js', array('jquery', 'bootstrap_js'), '0.1', true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'gently_scripts' );

add_theme_support( 'post-thumbnails' );

function gently_add_to_author_contact( $contactmethods ) {

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

add_action( 'init', 'gently_portfolio_register' );

function gently_portfolio_register() {
    $labels = array(
        'name'               => _x( 'Projects', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Project', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Projects', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'project', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Project', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Project', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Project', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Project', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Project', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Projects', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Projects:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No projects found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No projects found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'project' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'project', $args );
}

add_action( 'init', 'gently_portfolio_taxomomies_register', 0 );

function gently_portfolio_taxomomies_register() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Catogory', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Catogory' ),
        'parent_item_colon' => __( 'Parent Catogory:' ),
        'edit_item'         => __( 'Edit Catogory' ),
        'update_item'       => __( 'Update Catogory' ),
        'add_new_item'      => __( 'Add New Catogory' ),
        'new_item_name'     => __( 'New Catogory Name' ),
        'menu_name'         => __( 'Catogory' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' ),
    );

    register_taxonomy( 'genre', array( 'project' ), $args );

    $labels = array(
        'name'                       => _x( 'Tags', 'taxonomy general name' ),
        'singular_name'              => _x( 'Tag', 'taxonomy singular name' ),
        'search_items'               => __( 'Search Tags' ),
        'popular_items'              => __( 'Popular Tags' ),
        'all_items'                  => __( 'All Tags' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Tag' ),
        'update_item'                => __( 'Update Tag' ),
        'add_new_item'               => __( 'Add New Tag' ),
        'new_item_name'              => __( 'New Tag Name' ),
        'separate_items_with_commas' => __( 'Separate tags with commas' ),
        'add_or_remove_items'        => __( 'Add or remove tags' ),
        'choose_from_most_used'      => __( 'Choose from the most used tags' ),
        'not_found'                  => __( 'No tags found.' ),
        'menu_name'                  => __( 'Tags' ),
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'tag' ),
    );

    register_taxonomy( 'writer', 'project', $args );
}

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
