<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides
  
  $labels = array(
	'name' => _x('staff', 'post type general name'),
    'singular_name' => _x('Staff', 'post type singular name'),
    'add_new' => _x('Add New', 'Staff'),
    'add_new_item' => __('Add New Staff'),
    'edit_item' => __('Edit Staff'),
    'new_item' => __('New Staff'),
    'view_item' => __('View Staff'),
    'search_items' => __('Search Staff'),
    'not_found' =>  __('No staff found'),
    'not_found_in_trash' => __('No staff found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'staff'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('employees',$args); // name used in query
  
  // Add more between here

  $labels = array(
    'name' => _x('customers', 'post type general name'),
      'singular_name' => _x('Customers', 'post type singular name'),
      'add_new' => _x('Add New', 'Customers'),
      'add_new_item' => __('Add New Customers'),
      'edit_item' => __('Edit Customers'),
      'new_item' => __('New Customers'),
      'view_item' => __('View Customers'),
      'search_items' => __('Search Customers'),
      'not_found' =>  __('No customers found'),
      'not_found_in_trash' => __('No customers found in Trash'), 
      'parent_item_colon' => '',
      'menu_name' => 'customers'
    );
    $args = array(
    'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true, 
      'show_in_menu' => true, 
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'has_archive' => false, 
      'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
      'menu_position' => 20,
      'supports' => array('title','editor','custom-fields','thumbnail'),
    
    ); 
    register_post_type('customers',$args); // name used in query

  // new post type
  $labels = array(
    'name' => _x('services', 'post type general name'),
      'singular_name' => _x('Service', 'post type singular name'),
      'add_new' => _x('Add New', 'Service'),
      'add_new_item' => __('Add New Service'),
      'edit_item' => __('Edit services'),
      'new_item' => __('New Service'),
      'view_item' => __('View Services'),
      'search_items' => __('Search Services'),
      'not_found' =>  __('No Services Found'),
      'not_found_in_trash' => __('No Services Found in Trash'), 
      'parent_item_colon' => '',
      'menu_name' => 'services'
    );
    $args = array(
    'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true, 
      'show_in_menu' => true, 
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'has_archive' => false, 
      'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
      'menu_position' => 20,
      'supports' => array('title','editor','custom-fields','thumbnail'),
    
    ); 
    register_post_type('services',$args); // name used in query
  // and here
  
  } // close custom post type

/*
##############################################
			Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
// cusotm tax
  register_taxonomy( 'staff_type', 'employees',
	array( 
    'hierarchical' => true, // true = acts like categories false = acts like tags
    'label' => 'Staff Type', 
    'query_var' => true, 
    'rewrite' => true ,
    'show_admin_column' => true,
    'public' => true,
    'rewrite' => array( 'slug' => 'staff-type' ),
    '_builtin' => true
  ) );
  
  register_taxonomy( 'customer_type', 'customers',
	array( 
    'hierarchical' => true, // true = acts like categories false = acts like tags
    'label' => 'Customer Type', 
    'query_var' => true, 
    'rewrite' => true ,
    'show_admin_column' => true,
    'public' => true,
    'rewrite' => array( 'slug' => 'customer-type' ),
    '_builtin' => true
  ) );
  
  register_taxonomy( 'shirt_type', array('customers', 'employees'),
	array( 
    'hierarchical' => true, // true = acts like categories false = acts like tags
    'label' => 'Shirt Type', 
    'query_var' => true, 
    'rewrite' => true ,
    'show_admin_column' => true,
    'public' => true,
    'rewrite' => array( 'slug' => 'shirt-type' ),
    '_builtin' => true
	) );
	
} // End build taxonomies