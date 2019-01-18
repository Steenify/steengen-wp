<?php 
define('SITE_URL', get_site_url());
define('THEME_URL', get_template_directory_uri());
define('THEME_PATH', get_template_directory());
define('THEME_NAME', get_bloginfo('name'));

function wpdocs_theme_add_editor_styles()
{
  // add_theme_support('custom-editor-style');
  // add_editor_style('custom-editor-style.css');
}
add_action('admin_init', 'wpdocs_theme_add_editor_styles');

/*add size image*/
add_image_size("product_thumbnail", 285, 285, true);
add_image_size("tintuc_thumbnail", 285, 131, true);

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' => __("Cài đặt", "theme"),
    'menu_title' => __("Cài đặt", "theme"),
    'menu_slug' => 'theme-general-settings'
  ));
}

/* Register sidebars */
register_sidebar(array(
  'name' => esc_html__('Blog Sidebar', 'sneaker'),
  'id' => 'sidebar-blog',
  'description' => esc_html__('Sidebar on blog page', 'sneaker'),
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title"><span>',
  'after_title' => '</span></h3>',
));

/*register nav menu*/
function theme_setup()
{
  register_nav_menu('main-menu', __('Main Menu', 'theme'));
  register_nav_menu('footer', __('Footer', 'theme'));
}

add_action('after_setup_theme', 'theme_setup');


/* bao mat */
function my_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            /* background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/app/public/img/logo.svg); */
            padding-bottom: 0px;
			            padding-bottom: 0px;
            background-size: auto auto;
            width: 320px;
        }
        body.login{
            background:rgba(255, 255, 255, 1) url("<?php echo get_stylesheet_directory_uri(); ?>/screenshot.jpg") repeat scroll left top / 100% auto
        }
        #login_error{
            display:none;
        }
    </style>
<?php 
}

add_action('login_enqueue_scripts', 'my_login_logo');
add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_theme', '__return_false');
add_filter('admin_footer_text', '__return_empty_string', 11);
add_filter('update_footer', '__return_empty_string', 11);
add_filter('login_errors', create_function('$a', "return null;"));
remove_action('wp_head', 'wp_generator');


function pagination()
{
  global $wp_query;
  $big = 999999999;
  $paged = $_GET['t'];

  $pages = paginate_links(array(
    'format' => '?t=%#%',
    'prev_next' => true,
    'type' => 'array',
    'prev_text' => __('<svg width="15" height="8" action="prev" aria-hidden="true" title="Store Locator"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-icon"></use></svg>'),
    'next_text' => __('<svg width="15" height="8" action="next" aria-hidden="true" title="Store Locator"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-icon"></use></svg>'),
    'current' => max(1, $paged),
    'total' => $wp_query->max_num_pages,
  ));
  if (is_array($pages)) {
    $paged = ($paged == 0) ? 1 : $paged;
    foreach ($pages as $page) {
      $isActive = '';
      if (strpos($page, 'page-numbers current') !== false) {
        $isActive = 'active';
      }

      if (strpos($page, 'prev') !== false || strpos($page, 'next') !== false) {
        if (strpos($page, 'prev') !== false) {
          echo '<li class="steen-pagination__item steen-pagination__prev">';
        } else {
          echo '<li class="steen-pagination__item steen-pagination__next">';
        }

      } else {
        echo "<li class='steen-pagination__item $isActive'>";
      }


      if ($isActive != '') {
        echo "<a class='page-numbers' href='javascript:void(0)' >";
        echo "$page";
        echo "</a>";
      } else {
        echo "$page";
      }
      echo "</li>";
    }
  }

}

add_action('init', 'pagination');



function pagination2()
{
  global $wp_query;
  $big = 999999999;
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  $pages = paginate_links(array(
    'format' => 'paged/%#%',
    'prev_next' => true,
    'type' => 'array',
    'prev_text' => __('<svg width="15" height="8" action="prev" aria-hidden="true" title="Store Locator"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-icon"></use></svg>'),
    'next_text' => __('<svg width="15" height="8" action="next" aria-hidden="true" title="Store Locator"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-icon"></use></svg>'),
    'current' => max(1, $paged),
    'total' => $wp_query->max_num_pages,
  ));
  if (is_array($pages)) {
    $paged = ($paged == 0) ? 1 : $paged;
    foreach ($pages as $page) {
      $isActive = '';
      if (strpos($page, 'page-numbers current') !== false) {
        $isActive = 'active';
      }

      if (strpos($page, 'prev') !== false || strpos($page, 'next') !== false) {
        if (strpos($page, 'prev') !== false) {
          echo '<li class="steen-pagination__item steen-pagination__prev">';
        } else {
          echo '<li class="steen-pagination__item steen-pagination__next">';
        }

      } else {
        echo "<li class='$isActive'>";
      }


      if ($isActive != '') {
        echo "<a class='page-numbers'>";
        echo "$page";
        echo "</a>";
      } else {
        echo "$page";
      }
      echo "</li>";
    }
  }

}

add_action('init', 'pagination2');

function my_acf_init()
{

  acf_update_setting('google_api_key', 'AIzaSyBdwtJZ78s0i-9X641rAyaBtodDGRxPCr0');
}

add_action('acf/init', 'my_acf_init');


// function my_posts_where($where)
// {

//   $where = str_replace("meta_key = 'colors_$", "meta_key LIKE 'colors_%", $where);

//   return $where;
// }

// add_filter('posts_where', 'my_posts_where');


add_action('admin_menu', 'remove_admin_menu_links');
function remove_admin_menu_links(){
    $user = wp_get_current_user();
    if( $user && isset($user->user_login) && 'admin' != $user->user_login ) {
      remove_menu_page('themes.php');
      remove_menu_page('tools.php');
      remove_menu_page('options-general.php');
      remove_menu_page('plugins.php');
      remove_menu_page('users.php');
      remove_menu_page('edit-comments.php');
      remove_menu_page('page.php');
      remove_menu_page('upload.php');
      remove_menu_page( 'edit.php?post_type=page' ); 
      remove_menu_page( 'edit.php?post_type=videos' );
      remove_menu_page( 'edit.php' );
    }
}
remove_theme_support( 'genesis-admin-menu' );

function trim_text($s, $max_length) {

  if (strlen($s) > $max_length)
  {
      $offset = ($max_length - 3) - strlen($s);
      $s = substr($s, 0, strrpos($s, ' ', $offset)) . '...';
  }
  return $s;
}


?>
