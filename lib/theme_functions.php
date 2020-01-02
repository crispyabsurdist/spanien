<?php 
/*==============================================================================

  # Add img sizes
  # Clean up the admin menu
  # Sanitize uploaded file name
  # Move Yoast meta to bottom
  # Change excerpt
  # Wrap string with phone- or mail-link

==============================================================================*/

show_admin_bar( false );

/*==============================================================================
  # Add img sizes
==============================================================================*/

add_action( 'init', 'custom_img_sizes' );
function custom_img_sizes(){
  
  add_image_size( 'acf_display',  250, 200);

}
add_filter('jpeg_quality', function($arg){ return 100; });

/*==============================================================================
  # SVG support
==============================================================================*/

function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


/*==============================================================================
  # Clean up the admin menu
==============================================================================*/

//Remove these pages from the menu so that the user has a easier time finding whats important
add_action( 'admin_menu', 'custom_menu_page_removing' );
function custom_menu_page_removing() { 
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'edit.php' );                   //Posts
}

add_action( 'admin_menu', 'adjust_the_wp_menu', 999 );
function adjust_the_wp_menu() {
  remove_submenu_page( 'themes.php', 'theme-editor.php' );
  remove_submenu_page( 'themes.php', 'widgets.php' );
  //remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
  remove_submenu_page( 'options-general.php', 'options-discussion.php' );
}


/*==============================================================================
  # Sanitize uploaded file name
==============================================================================*/

function safe_file_name( $filename ) {
  if( $filename ){
    $filename = esc_attr( $filename );
    $filename = str_replace([' ','/',','],'-',strtolower( $filename ));
    $filename = str_replace(['ö'],'o', $filename);
    $filename = str_replace(['å','ä'],'a', $filename);
    $filename = preg_replace( '/-{2,}/', '-', $filename );
    return $filename;
  }else{
    return false;
  }
}
add_filter( 'sanitize_file_name', 'safe_file_name', 10 );


/*==============================================================================
  # Move Yoast meta to bottom
==============================================================================*/

function yoasttobottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');


/*==============================================================================
  # Change excerpt
==============================================================================*/

/**
 * apply_custom_excerpt()
 * 
 * Makes it possible to make any text into an excerpt with a custom link
 *
 * @param $content full text that will become the excerpt
 * @param $link if set adds a link at the end of the excerpt
 * @param $target  if added the link gets target="_blank"
 * 
 * @return returns the excerpt
 *
 * @version 1.0
 */ 

global $excerpt_link;
global $excerpt_link_target;

function new_excerpt_more( $more ) {
  global $post;
  global $excerpt_link;
  global $excerpt_link_target;
  
  $more_tag  = '... ';
  
  if( $excerpt_link !== false ){
    $target = '';
    $read_more = __( 'Läs mer' );
    if( $excerpt_link_target !== false ){
      $target = 'target="_blank"';
    }
    $read_more = '<a class="text-link" href="'.$excerpt_link.'" '.$target.'>'.$read_more.'</a>';
    $more_tag .= $read_more;
  }

  return $more_tag;
}
function new_excerpt_length( $length ) {
    return 25;
}
function rw_trim_excerpt( $text='' )
{
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $excerpt_length = apply_filters('excerpt_length', 'new_excerpt_more' );
    $excerpt_more = apply_filters('excerpt_more', 'new_excerpt_more' );
    return wp_trim_words( $text, $excerpt_length, $excerpt_more );
}

add_filter( 'excerpt_more', 'new_excerpt_more' );
add_filter( 'excerpt_length', 'new_excerpt_length' );
add_filter( 'wp_trim_excerpt', 'rw_trim_excerpt' );

function apply_custom_excerpt( $content, $link = false, $target = false ){
  global $excerpt_link;
  global $excerpt_link_target;
  $excerpt_link = $link;
  $excerpt_link_target = $target;
  return apply_filters( 'get_the_excerpt', $content ); 
}



function wpb_remove_version()
{
    return '';
}
add_filter('the_generator', 'wpb_remove_version');


// function wpb_custom_logo()
// {
//     echo '
// <style type="text/css">
// #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
// background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/custom-logo.png) !important;
// background-position: 0 0;
// color:rgba(0, 0, 0, 0);
// }
// #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
// background-position: 0 0;
// }
// </style>
// ';
// }
// //hook into the administrative header output
// add_action('wp_before_admin_bar_render', 'wpb_custom_logo');


function remove_footer_admin()
{

    echo 'Hedenborn rules!';

}

add_filter('admin_footer_text', 'remove_footer_admin');
