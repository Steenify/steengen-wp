<?php
// Register Custom Post Type
function create_post_type($type, $display_name, $slug, $icon) {

	$labels = array(
		'name'                  => _x( $display_name, 'Post Type General Name', 'aeon' ),
		'singular_name'         => _x( $type, 'Post Type Singular Name', 'aeon' ),
		'menu_name'             => __( $display_name, 'aeon' ),
		'name_admin_bar'        => __( $type, 'aeon' ),
		'archives'              => __( $type.' Archives', 'aeon' ),
		'parent_item_colon'     => __( 'Parent '.$type, 'aeon' ),
		'all_items'             => __( 'Tất cả '.$display_name, 'aeon' ),
		'add_new_item'          => __( 'Thểm mới '.$display_name, 'aeon' ),
		'add_new'               => __( 'Thêm '.$display_name, 'aeon' ),
		'new_item'              => __( $display_name.' mới', 'aeon' ),
		'edit_item'             => __( 'Sửa '.$display_name, 'aeon' ),
		'update_item'           => __( 'Cập nhật '.$display_name, 'aeon' ),
		'view_item'             => __( 'Xem '.$display_name, 'aeon' ),
		'search_items'          => __( 'Tìm kiếm '.$display_name, 'aeon' ),
		'not_found'             => __( 'Không tìm thấy', 'aeon' ),
		'not_found_in_trash'    => __( 'Không tìm thấy trong Thùng rác', 'aeon' ),
		'featured_image'        => __( 'Ảnh đại diện', 'aeon' ),
		'set_featured_image'    => __( 'Set featured image', 'aeon' ),
		'remove_featured_image' => __( 'Remove featured image', 'aeon' ),
		'use_featured_image'    => __( 'Use as featured image', 'aeon' ),
		'insert_into_item'      => __( 'Insert into Product', 'aeon' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Product', 'aeon' ),
		'items_list'            => __( 'Danh sách '.$display_name, 'aeon' ),
		'items_list_navigation' => __( 'Menu danh sách '.$display_name, 'aeon' ),
		'filter_items_list'     => __( 'Lọc '.$display_name, 'aeon' ),
	);
	$args = array(
		'label'                 => __( $display_name, 'aeon' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes'),
		'taxonomies' 			=> array('post_tag'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 25,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'map_meta_cap'       		=> true,
		'show_in_rest'       		=> true,
		'rest_base'          		=> $slug,
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'capability_type'       => 'page',
		'menu_icon'           => $icon ? $icon : 'dashicons-pressthis',
		'rewrite' => array('with_front' => false, 'slug' => $slug),
	);

	register_post_type( strtolower($type) , $args );

}
// Register Custom Taxonomy
function create_my_taxonomy($taxonomy, $type, $display_name, $slug) {

	$labels = array(
		'name'                       => _x( 'Danh mục '.$display_name, 'Taxonomy General Name', 'aeon' ),
		'singular_name'              => _x( 'Danh mục '.$display_name, 'Taxonomy Singular Name', 'aeon' ),
		'menu_name'                  => __( 'Danh mục '.$display_name, 'aeon' ),
		'all_items'                  => __( 'Tất cả', 'aeon' ),
		'parent_item'                => __( 'Danh mục cha', 'aeon' ),
		'parent_item_colon'          => __( 'Danh mục cha:', 'aeon' ),
		'new_item_name'              => __( 'Danh mục '.$display_name.' mới', 'aeon' ),
		'add_new_item'               => __( 'Thêm mới', 'aeon' ),
		'edit_item'                  => __( 'Sửa Danh mục '.$display_name, 'aeon' ),
		'update_item'                => __( 'Cập nhật Danh mục '.$display_name, 'aeon' ),
		'view_item'                  => __( 'Xem Danh mục '.$display_name, 'aeon' ),
		'separate_items_with_commas' => __( 'Separate Danh mục '.$display_name.' with commas', 'aeon' ),
		'add_or_remove_items'        => __( 'Add or remove Danh mục '.$display_name, 'aeon' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'aeon' ),
		'popular_items'              => __( 'Popular Danh mục '.$display_name, 'aeon' ),
		'search_items'               => __( 'Tìm kiếm Danh mục '.$display_name, 'aeon' ),
		'not_found'                  => __( 'Không tìm thấy', 'aeon' ),
		'no_terms'                   => __( 'không có Danh mục '.$display_name, 'aeon' ),
		'items_list'                 => __( 'Danh sách danh mục '.$display_name, 'aeon' ),
		'items_list_navigation'      => __( 'Menu danh sách danh mục '.$display_name, 'aeon' ),
	);
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $slug ),
	);
	register_taxonomy( $taxonomy, array( strtolower($type) ), $args );

}

function register_my_post_type( $args ) {

	$type 				= $args['type'];
	$taxonomy 				= $args['taxonomy'];
	$display_name = $args['display_name'];
	$slug = $args['slug'];
	$icon = $args['icon'];

	add_action( 'init', function() use ($type, $display_name, $slug, $icon) {
		create_post_type($type, $display_name, $slug, $icon);
	}, 0 );

	add_action( 'init', function() use ($taxonomy, $type, $display_name, $slug) {
		create_my_taxonomy($taxonomy, $type, $display_name, $slug);
	}, 0 );

	register_rest_field( strtolower($type), 'metadata', array(
		'get_callback' => function ( $data ) {
				return get_fields($data['id']);
		}, ));

}


// function mpe_add_product_page_attributes(){
// 	add_post_type_support( 'Product', 'page-attributes' );
// }
// add_action('admin_init', 'mpe_add_product_page_attributes');

// function add_new_product_column($post_columns) {
//   $post_columns['menu_order'] = "Order";
//   return $post_columns;
// }
// add_action('manage_edit-product_columns', 'add_new_product_column');

// function show_order_column($name){
//   global $post;
 
//   switch ($name) {
//     case 'menu_order':
//       $order = $post->menu_order;
//       echo $order;
//       break;
//    default:
//       break;
//    }
// }
// add_action('manage_product_posts_custom_column','show_order_column');


// register_my_post_type(array(
// 	'type' => 'Color-Category',
// 	'display_name' => 'Thư viện màu sắc',
// 	'slug' => 'thu-vien',
// 	'taxonomy' => 'color_cat_category',
// 	'icon' => 'dashicons-tickets-alt'
// ));


?>