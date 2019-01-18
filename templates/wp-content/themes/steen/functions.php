<?php
include_once('ajax/ajax-load.php');
include_once('functions/post-types.php');
include_once('functions/custom-functions.php');
include_once('functions/custom-fields.php');

/*------------------------------------*\
	Get asset bundle Functions
\*------------------------------------*/

function get_template_resource_path($file_name)
{

  $map = get_template_directory() . '/app/dist/manifest.json';
  static $hash = null;

  if (null === $hash) {
    $hash = file_exists($map) ? json_decode(file_get_contents($map), true) : [];
  }

  if (array_key_exists($file_name, $hash)) {
    return get_template_directory_uri() . '/app/dist/' . $hash[$file_name];
  }

  return $file_name;

}

function theme_scripts()
{
  wp_enqueue_style('style-bootstrap', THEME_URL . '/public/css/slick.css', false, '1.0.0', 'all');

  wp_register_style('script-common', get_template_resource_path('common.css'), array(), '1.0', 'all');
  wp_enqueue_style('script-common'); // Enqueue it! 



  if (is_page_template('templates/template-home.php')) {

    wp_enqueue_style('style-home', get_template_resource_path('home.css', false, '1.0.0', 'all'));
    wp_enqueue_script('script-home', get_template_resource_path('home.js', array('jquery'), '1.0.0', false));
  }

  if (is_page_template('templates/template-about.php')) {
    wp_register_style('steen-about', get_template_resource_path('about.css'), array(), '1.0', 'all');
    wp_enqueue_style('steen-about'); // Enqueue it!

    wp_enqueue_script('script-about', get_template_resource_path('about.js', array('jquery'), '1.0.0', false));
  }
  if (is_page_template('templates/template-contact.php')) {
    wp_register_style('steen-contact', get_template_resource_path('contact.css'), array(), '1.0', 'all');
    wp_enqueue_style('steen-contact'); // Enqueue it!

    wp_enqueue_script('script-contact', get_template_resource_path('contact.js', array('jquery'), '1.0.0', false));
  }
  if (is_archive()) {
    wp_register_style('steen-news', get_template_resource_path('news.css'), array(), '1.0', 'all');
    wp_enqueue_style('steen-news'); // Enqueue it!

    wp_enqueue_script('script-news', get_template_resource_path('news.js', array('jquery'), '1.0.0', false));
  }
  if (is_single() 
      && !is_singular('product') 
      && !is_singular('color-collection') 
      && !is_singular('color-category')
      && !is_search()) {

    wp_register_style('steen-article', get_template_resource_path('news.css'), array(), '1.0', 'all');
    wp_enqueue_style('steen-article'); // Enqueue it!

    wp_enqueue_script('script-article', get_template_resource_path('news.js', array('jquery'), '1.0.0', false));
  }

}
add_action('wp_enqueue_scripts', 'theme_scripts');

function shapeSpace_popular_posts($post_id)
{
  $count_key = 'popular_posts';
  $count = get_post_meta($post_id, $count_key, true);
  if ($count == '') {
    $count = 0;
    delete_post_meta($post_id, $count_key);
    add_post_meta($post_id, $count_key, '0');
  } else {
    $count++;
    update_post_meta($post_id, $count_key, $count);
  }
}
function shapeSpace_track_posts($post_id)
{
  if (!is_single()) return;
  if (empty($post_id)) {
    global $post;
    $post_id = $post->ID;
  }
  shapeSpace_popular_posts($post_id);
}
add_action('wp_head', 'shapeSpace_track_posts');
