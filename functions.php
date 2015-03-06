<?php
/**
 * CWP Theme functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package CWP Theme
 * @since 0.1.0
 */

// Useful global constants
define( 'CWP_THEME_VERSION', '0.1.0' );

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 *
 * @since 0.1.0
 */
function cwp_theme_setup() {
   /**
    * Makes CWP Theme available for translation.
    *
    * Translations can be added to the /lang directory.
    * If you're building a theme based on CWP Theme, use a find and replace
    * to change 'cwp_theme' to the name of your theme in all template files.
    */
   load_theme_textdomain( 'cwp_theme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'cwp_theme_setup' );

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since 0.1.0
 */
function cwp_theme_scripts_styles() {
   wp_deregister_style('hemingway_style' );

   $postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

   //wp_enqueue_script( 'cwp_theme', get_stylesheet_directory_uri() . "/assets/js/cwp_theme{$postfix}.js", array(), CWP_THEME_VERSION, true );

   wp_localize_script( 'cwp_theme', 'cwp_theme', array( 'adminajax' => admin_url( 'admin-ajax.php') ) );

   wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css' );

   wp_register_script( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js' );

   wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:100,400,900,400italic,700italic,900italic|Merriweather:400,700,300' );

   wp_enqueue_style( 'cwp_theme', get_stylesheet_directory_uri() . "/assets/css/cwp_theme{$postfix}.css", array(), CWP_THEME_VERSION );



}
add_action( 'wp_enqueue_scripts', 'cwp_theme_scripts_styles', 55 );



/**
 * Add humans.txt to the <head> element.
 */
function cwp_theme_header_meta() {
   $humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';

   echo apply_filters( 'cwp_theme_humans', $humans );
}
add_action( 'wp_head', 'cwp_theme_header_meta' );

/**
 * Returns the post format of a post, or if its a CPT, will return post type
 *
 * @return false|mixed|string
 */
function cwp_theme_format_or_type() {
   $post_type = get_post_type();
   if ( 'post' != $post_type ) {
      return get_post_format();
   }else{
      return $post_type;
   }

}

/**
 * Add style tag for background image
 *
 * @param int|string $id Either the ID of an image to use or a URL
 * @param bool|string $extra_styles Optional. Additional styles to add.
 *
 * @return string
 */
function cwp_theme_background_style_tag( $id, $extra_styles = false ) {
   if ( intval( $id ) ) {
      $img = wp_get_attachment_image_src( $id );
      $img = $img[0];
   }else {
      $img = $id;
   }
   $style = 'style="background-image: url( '.  esc_url( $img ).');';

   if ( $extra_styles ) {
      $style .= $extra_styles;
   }

   $style .= '"';

   return $style;

}


/**
 * Include Dependencies.
 */
add_action( 'init', function() {
   //include_once( dirname(__FILE__ ) . '/vendor/autoload.php' );
});






/**
 * Use the "plugins-page.php" page for single posts in download and free_plugin
 *
 * @uses "template_include"
 */
add_filter( 'template_include', function ( $template ) {
   $new_template = false;
   if ( cwp_theme_is_plugin_page() ) {
      $new_template = locate_template( array( 'plugins-page.php' ) );

   }elseif ( is_page() && ! is_front_page()  ) {
      $new_template = locate_template( array( 'single.php' ) );
   }

   if (  $new_template && file_exists( $new_template ) ) {

      $template = $new_template;
   }

   return $template;

}, 99 );





/**
 * Themes setup
 */
add_action( 'after_setup_theme', function() {

   // Automatic feed
   add_theme_support( 'automatic-feed-links' );

   // Custom background
   add_theme_support( 'custom-background' );

   // Post thumbnails
   add_theme_support( 'post-thumbnails' );
   add_image_size( 'post-image', 676, 9999 );

   // Post formats
   add_theme_support( 'post-formats', array( 'video', 'aside', 'quote' ) );

   // Custom header
   $args = array(
       'width'         => 1280,
       'height'        => 416,
       'default-image' => get_template_directory_uri() . '/images/header.jpg',
       'uploads'       => true,
       'header-text'  	=> false

   );
   add_theme_support( 'custom-header', $args );


   // Make the theme translation ready
   load_theme_textdomain('cwp-theme', get_template_directory() . '/languages');

   $locale = get_locale();
   $locale_file = get_template_directory() . "/languages/$locale.php";
   if ( is_readable($locale_file) ) {
      require_once($locale_file);
   }


});

/**
 * Add main widgets
 */
add_action( 'widgets_init', function () {

   register_sidebar( array(
       'name'          => __( 'Sidebar', 'cwp-theme' ),
       'id'            => 'sidebar',
       'description'   => __( 'Widgets in this area will be shown in the sidebar.', 'cwp-theme' ),
       'before_title'  => '<h3 class="widget-title">',
       'after_title'   => '</h3>',
       'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
       'after_widget'  => '</div><div class="clear"></div></div>'
   ) );
});

