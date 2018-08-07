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
  // new post type
  $labels = array(
    'name' => _x('services', 'post type general name'),
      'singular_name' => _x('Slide', 'post type singular name'),
      'add_new' => _x('Add New', 'Slide'),
      'add_new_item' => __('Add New Slide'),
      'edit_item' => __('Edit services'),
      'new_item' => __('New Slide'),
      'view_item' => __('View services'),
      'search_items' => __('Search staff'),
      'not_found' =>  __('No staff found'),
      'not_found_in_trash' => __('No staff found in Trash'), 
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
    register_post_type('service',$args); // name used in query
  // and here
  
  } // close custom post type