<?php
// Code to allow configuration of navigation
function register_nav()
{
  register_nav_menus(
    array(
      'header' => 'Header'
    )
  );
  register_nav_menus(
    array(
      'footer' => 'Footer'
    )
  );
  register_nav_menus(
    array(
      '404' => '404'
    )
  );
}

// Run functions
// If the setup function does not already exist, run the setup function.
if (!function_exists('setup')) :
  function setup()
  {
    register_nav();
    // For post thumbnail on the team page
    add_theme_support('post-thumbnails');
    add_image_size('team', 475, 457, array('center', 'center'));
  }
endif;

// Code to load a custom CSS file in the header
function scripts_header()
{
  wp_enqueue_style('init', get_stylesheet_uri());
}

// Code to use these functions in wordpress
add_action('after_setup_theme', 'setup');
add_action('wp_enqueue_scripts', 'scripts_header');
// add_action('where I want to hook, Function name that I want to call, priority, how many parameter)


// For reading short code files
require_once('shortcodes/practice-areas.php');
require_once('shortcodes/team.php');
// The require_once keyword is used to embed PHP code from another file