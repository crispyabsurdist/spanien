<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup()
{

  load_theme_textdomain('sage', get_template_directory() . '/lang');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  ///add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

function assets()
{
  /**CSS**/
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, '1.0');

  /**JAVASCRIPT**/
  wp_enqueue_script('slick', get_template_directory_uri() . '/assets/scripts/slick.min.js', ['jquery'], null, true);
  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], '1.0', true);

  /**AJAX**/
  wp_localize_script('sage/js', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);


/*==============================================================================
  # Add user roles
==============================================================================*/

// add_role('role name', __(
//   'role name'),
//   array(
//       'read'            => true, // Allows a user to read
//       'create_posts'      => false, // Allows user to create new posts
//       'edit_posts'        => false, // Allows user to edit their own posts
//       'edit_others_posts' => false, // Allows user to edit others posts too
//       'publish_posts' => false, // Allows the user to publish posts
//       'manage_categories' => false, // Allows user to manage post categories
//       )
// );


/*==============================================================================
  # Remove user roles
==============================================================================*/

remove_role('subscriber');
remove_role('editor');
remove_role('author');


/*==============================================================================
  # Register custom post_types and taxonomies
==============================================================================*/

/**
 * Register Produkter
 */

// $labels = array(
//   'name'                => 'Produkter', 
//   'menu_name'           => 'Produkter',
//   'singular_name'       => 'Produkt',
//   'all_items'           => 'Alla Produkter',
//   'edit_item'           => 'Ändra Produkter',
//   'update_item'         => 'Uppdatera Produkt',
//   'add_new_item'        => 'Skapa ny Produkt',
//   'new_item'            => 'Skapa ny produkt',
//   'view_item'           => 'Se produkt',
// );

// $args = array(
//   'labels'              => $labels,
//   'public'              => true,
//   'show_in_nav_menus'   => true,
//   'rewrite'             => array( 'slug' => 'produkter', 'with_front' => true ),
//   'menu_icon'           => 'dashicons-carrot',
//   'has_archive'         => false,
//   'supports'            => array('title','page-attributes')
//   );
// register_post_type( 'product', $args );

// $labels = array(
//   'name'                => 'Produkttyp',
//   'menu_name'           => 'Produkttyp',
//   'singular_name'       => 'Produkttyp',
//   'search_items'        => 'Sök Produkttyp',
//   'all_items'           => 'Alla Produkttyper',
//   'edit_item'           => 'Ändra Produkttyp',
//   'update_item'         => 'Uppdatera Produkttyp',
//   'add_new_item'        => 'Skapa ny Produkttyp',
//   'new_item'            => 'Skapa ny Produkttyp',
//   'view_item'           => 'Visa Produkttyp',
// );
// $args = array(
//   'public'              => true,
//   'publicly_queryable'  => true,
//   'show_ui'             => true,
//   'show_in_menu'        => true,
//   'show_in_nav_menus'   => true,
//   'show_admin_column'   => true,
//   'hierarchical'        => true,
//   'query_var'           => true,
//   'labels'              => $labels,
//   'rewrite'             => array( 'slug' => 'produkt' ),
// );
// register_taxonomy( 'product_type', array( 'product' ), $args );

// /**
//  * Register News posts
$labels = array(
  'name'                => 'Blogg',
  'menu_name'           => 'Blogg',
  'singular_name'       => 'Inlägg',
  'all_items'           => 'Visa alla inlägg',
  'edit_item'           => 'Ändra post',
  'update_item'         => 'Uppdatera',
  'add_new_item'        => 'Lägg till nytt',
  'new_item'            => 'Lägg till nytt',
  'view_item'           => 'Visa',
);

$args = array(
  'labels'              => $labels,
  'public'              => true,
  'publicly_queryable'  => true,
  'query_var'           => true,
  'show_in_nav_menus'   => true,
  'rewrite'             => array('slug' => 'bloggen', 'with_front' => true),
  'menu_icon'           => 'dashicons-book',
  'has_archive'         => false,
  'supports'            => array('title', 'author', 'thumbnail', 'excerpt'),
);
register_post_type('stories', $args);


// $labels = array(
//   'name' => _x('Kategorier', 'plural'),
//   'singular_name' => _x('Kategori', 'singular'),
//   'menu_name' => _x('Kategorier', 'admin menu'),
//   'name_admin_bar' => _x('Kategorier', 'admin bar'),
//   'add_new' => _x('Lägg till', 'add new'),
//   'add_new_item' => __('Lägg till nytt'),
//   'new_item' => __('Nytt'),
//   'edit_item' => __('Editera'),
//   'view_item' => __('Visa'),
//   'all_items' => __('Visa alla poster'),
//   'not_found' => __('No news found.'),
// );

// $args = array(
//   'public'              => true,
//   'publicly_queryable'  => true,
//   'show_ui'             => true,
//   'show_in_menu'        => true,
//   'show_in_nav_menus'   => true,
//   'show_admin_column'   => true,
//   'hierarchical'        => false,
//   'query_var'           => true,
//   'labels'              => $labels,
//   'rewrite'             => array('slug' => 'inlagg'),
// );
// register_taxonomy('blogpost', array('stories'), $args);
