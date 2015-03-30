<?php

add_action( 'init', 'gently_post_change' );
function gently_post_change() {
    $args = array (
      'rewrite' =>  array( 'slug' => 'blog')
    );
    register_post_type( 'post', $args );
}

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
    flush_rewrite_rules();
}

add_action( 'init', 'gently_portfolio_taxomomies_register', 0 );

function gently_portfolio_taxomomies_register() {
    $labels = array(
        'name'              => _x( 'Types', 'taxonomy general name' ),
        'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Types' ),
        'all_items'         => __( 'All Types' ),
        'parent_item'       => __( 'Parent Type' ),
        'parent_item_colon' => __( 'Parent Type:' ),
        'edit_item'         => __( 'Edit Type' ),
        'update_item'       => __( 'Update Type' ),
        'add_new_item'      => __( 'Add New Type' ),
        'new_item_name'     => __( 'New Type Name' ),
        'menu_name'         => __( 'Type' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'type' ),
    );

    register_taxonomy( 'type', array( 'project' ), $args );

    $labels = array(
        'name'                       => _x( 'Skills', 'taxonomy general name' ),
        'singular_name'              => _x( 'Skill', 'taxonomy singular name' ),
        'search_items'               => __( 'Search Skills' ),
        'popular_items'              => __( 'Popular Skills' ),
        'all_items'                  => __( 'All Skills' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit skill' ),
        'update_item'                => __( 'Update skill' ),
        'add_new_item'               => __( 'Add New skill' ),
        'new_item_name'              => __( 'New skill Name' ),
        'separate_items_with_commas' => __( 'Separate skill with commas' ),
        'add_or_remove_items'        => __( 'Add or remove skills' ),
        'choose_from_most_used'      => __( 'Choose from the most used skills' ),
        'not_found'                  => __( 'No skills found.' ),
        'menu_name'                  => __( 'Skills' ),
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

add_action("admin_init", "gently_portfolio_custome_post_fields");

function gently_portfolio_custome_post_fields(){
  add_meta_box("year_completed-meta", "Year Completed", "gently_portfolio_year_completed", "project", "side", "low");
  add_meta_box("credits_meta", "Design &amp; Build Credits", "gently_portfolio_credits_meta", "project", "normal", "low");
}

function gently_portfolio_year_completed(){
  global $post;
  $custom = get_post_custom($post->ID);
  $year_completed = $custom["year_completed"][0];
  echo '
    <label>Year:</label>
    <input name="year_completed" value="'.$year_completed.'" />
  ';
}

function gently_portfolio_credits_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $designers = $custom["designers"][0];
  $developers = $custom["developers"][0];
  $producers = $custom["producers"][0];
  echo '
    <p><label>Designed By:</label><br />
    <input name="designers" value="'.$designers.'" /></p>
    <p><label>Built By:</label><br />
    <input name="developers" value="'.$developers.'" /></p>
    <p><label>Produced By:</label><br />
    <input name="producers" value="'.$producers.'" /></p>
  ';
}

add_action('save_post', 'gently_portfolio_save_details');

function gently_portfolio_save_details(){
  global $post;

  update_post_meta($post->ID, "year_completed", $_POST["year_completed"]);
  update_post_meta($post->ID, "designers", $_POST["designers"]);
  update_post_meta($post->ID, "developers", $_POST["developers"]);
  update_post_meta($post->ID, "producers", $_POST["producers"]);
}

add_action("manage_posts_custom_column",  "gently_portfolio_custom_columns");
add_filter("manage_edit-portfolio_columns", "gently_portfolio_edit_columns");

function gently_portfolio_edit_columns($columns){
  $columns = array(
    "cb" => "<input type='checkbox' />",
    "title" => "Portfolio Title",
    "description" => "Description",
    "year" => "Year Completed",
    "skills" => "Skills",
  );

  return $columns;
}

function gently_portfolio_custom_columns($column){
  global $post;

  switch ($column) {
    case "description":
      the_excerpt();
      break;
    case "year":
      $custom = get_post_custom();
      echo $custom["year_completed"][0];
      break;
    case "skills":
      echo get_the_term_list($post->ID, 'Skills', '', ', ','');
      break;
  }
}

?>