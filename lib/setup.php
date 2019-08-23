<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
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
  wp_enqueue_script('slick', get_template_directory_uri() . '/assets/scripts/lazyload.min.js', ['jquery'], null, true);
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

remove_role( 'subscriber' );
remove_role( 'editor' );
remove_role( 'author' );


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
//  */

// $labels = array(
//   'name'                => 'Nyheter', 
//   'menu_name'           => 'Nyheter',
//   'singular_name'       => 'Nyhet',
//   'all_items'           => 'Alla Nyheter',
//   'edit_item'           => 'Ändra Nyheter',
//   'update_item'         => 'Uppdatera Nyhet',
//   'add_new_item'        => 'Skapa ny Nyhet',
//   'new_item'            => 'Skapa ny Nyhet',
//   'view_item'           => 'Se Nyhet',
// );

// $args = array(
//   'labels'              => $labels,
//   'public'              => true,
//   'show_in_nav_menus'   => true,
//   'rewrite'             => array( 'slug' => 'news', 'with_front' => true ),
//   'menu_icon'           => 'dashicons-carrot',
//   'has_archive'         => false,
//   'supports'            => array('title','page-attributes')
//   );
// register_post_type( 'news', $args );