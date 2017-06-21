<?php 
	/*Insert Script Files */
	function FantasyFusion_resources(){
		wp_enqueue_style('style',get_stylesheet_uri());
		wp_register_script('bootstrap-js',get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js',array('jquery'),'3.3.7',true);
		wp_register_script('main',get_template_directory_uri().'/assets/main.js',array('jquery'),null,false);
		wp_register_style('bootstrap-css',get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css',array(),'3.3.7',all);
		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('bootstrap-css');
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap-js');
		wp_enqueue_script('main');
	}

	add_action('wp_enqueue_scripts','FantasyFusion_resources');
	 remove_filter('the_content', 'wpautop'); 

	/* Theme Support */
	function CustomPortfolio_theme_support(){
		/* Image Sizes */
		add_image_size('mytheme_logo',500,50);
		add_image_size('small-thumbnail',180,120,true);
		add_image_size('banner-image',920,210,array('left','top'));
		add_image_size('port-post-thumbnail',300,200);

		/* Add Custom Logo */
		add_theme_support('custom-logo',array(

				'size' => 'mytheme_logo',
				'flex-height' => true,
				'flex-width' =>true,
				'header-text' =>array('site-title','site-description'),

			));

	  /* Add featured image */
	  add_theme_support('post-thumbnails');

 }

 add_action('after_setup_theme','CustomPortfolio_theme_support');
 /* Output Logo */
 function Output_custom_logo(){

 		if(function_exists('the_custom_logo'))
 		{
 			the_custom_logo();
 		}
 }

 /*Navigation Menus */
 	register_nav_menus(array(
 		
 			'primary' => __('Primary Menu'),
 			'footer' =>__('Footer Menu'),
 			'top-menu' =>__('Top Menu')

 		));

 	/* Register  widgets */
 	function CustomPortfolio_widgets_init(){

 		register_sidebar(array(

 			'name' => 'Primary Sidebar',
 			'id' => 'primary-sidebar',
 			'description' => 'main sidebar',
 			'before_widget' => '<aside id="%1$s" class="%2$s" > ',
 			'after_widget' => '</aside>',
 			'before_title' => '<h3 class="widget-title"> ',
 			'after_title' => '</h3>'

 			));

 		register_sidebar(array(

 			'name' => 'Footer Sidebar 1',
 			'id' => 'footer-sidebar-1',
 			'description' => 'Appears in the footer area',
 			'before_widget' => '<aside id="%1$s" class="%2$s" > ',
 			'after_widget' => '</aside>',
 			'before_title' => '<h3 class="widget-title"> ',
 			'after_title' => '</h3>'

 			));

 		register_sidebar(array(

 			'name' => 'Footer Sidebar 2',
 			'id' => 'footer-sidebar-2',
 			'description' => 'Appears in the footer area',
 			'before_widget' => '<aside id="%1$s" class="%2$s"> ',
 			'after_widget1' => '</aside>',
 			'before_title' => '<h3 class="widget-title"> ',
 			'after_title' => '</h3>'

 			));

 		register_sidebar(array(

 			'name' => 'Footer Sidebar 3',
 			'id' => 'footer-sidebar-3',
 			'description' => 'Appears in the footer area',
 			'before_widget' => '<aside id="%1$s" class="%2$s" >',
 			'after_widget' => '</aside>',
 			'before_title' => '<h3 class="widget-title">',
 			'after_title' => '</h3>'

 			));
 	}

 	add_action('widgets_init','CustomPortfolio_widgets_init');

 	/* Custom  Post Types */
 	function custom_post_type(){
 		/* Set UI labels for Portfolio Type */
 		$labels = array(

 			'name' => _x('Portfolio Items' , 'Post Type General Name',
 				'custom_portfolio' ),

 			'singular_name' => _x('Portfolio Item' , 'Post Type Singular_Name',
 				'custom_portfolio' ),

 			'menu_name' => __('Portfolio Items' , 'custom_portfolio'),

 			'parent_item_colon' => __('Parent Portfolio' , 'custom_portfolio'),

 			'all_items' => __('All Portfolio Items' , 'custom_portfolio'),

 			'view_item' => __('View Portfolio Item' , 'custom_portfolio'),

 			'add_new_item' => __('Add New Portfolio Item' , 'custom_portfolio'),

 			'add_new' => __('Add New' , 'custom_portfolio'),

 			'edit_item' => __('Edit Portfolio Item' , 'custom_portfolio'),

 			'update_item' => __('Update Portfolio Item' , 'custom_portfolio'),

 			'search_items' => __('Search Portfolio Items' , 'custom_portfolio'),

 			'not_found' => __('Not Found' , 'custom_portfolio'),

 			'not_found_in_trash' => __('Not Found In Trash' , 'custom_portfolio'),

 			);

 		/* Set other options for Portfolio Type */
 		$args = array(

 			'label' => __('Portfolio Items' , 'label' , 'custom_portfolio'),

 			'description' => __('Team Portfolio projects' , 'custom_portfolio'),

 			'labels' => $labels,

 			'supports' => array('title' , 'editor' , 'excerpt' , 'author' , 'thumbnail' , 
 				'comments' , 'revisions' , 'custom-fields'),

 			'hierarchical' => false,
 			'public' => true,
 			'show_ui' => true,
 			'show_in_menu' => true,
 			'show_in_nav_menus' => true,
 			'show_in_admin_bar' => false,
 			'menu_position' => 5,
 			'can_export' => true,
 			'has_archive' => true,
 			'exclude_from_search' => false,
 			'publicly_queryable' => true,
 			'capability_type' => 'post',

 			);

 		/* Registering your Portfolio Type */
 		register_post_type('Portfolio Items',$args);
 	}

 	add_action('init' , 'custom_post_type',0);

 	/* Create Portfolio Items Tags */

 	
 	function  create_portfolio_tags(){

 		/* Add New Taxonomy */

 		$labels = array(

 			'name' => _x('Portfolio Tags','taxonomy general name'),

 			'singular_name' => _x('Portfolio Tag','taxonomy singular name'),

 			'search_items' => __('Search Tags'),

 			'popular_items' => __('All Tags'),

 			'parent_item' => null,

 			'parent_item_colon' => null,

 			'edit_item' => __('Edit Tag'),

 			'update_item' => __('Update Tag'),

 			'add_new_item' => __('Add New Tag'),

 			'new_item_name' => __('New Tag Name'),

 			'seperate_items_with_commas' => __('seperate tags with commas'),

 			'add_or_remove_items' => __('add or remove tags'),

 			'choose_from_most_used' => __('Choose from the most used tags'),

 			'menu_name' => ('Portfolio Tags'),

 			);


 		register_taxonomy('tag','portfolioitems',array(

 			'hierarchical' => false,

 			'labels' => $labels,

 			'show_ui' => true,

 			'update_count_callback' => '_update_post_term_count',

 			'query_var' => true,

 			'rewrite' => array('slug' => 'tags'),

 			) );
 		
 	}

 	add_action('init','create_portfolio_tags',0);

 function create_portfolio_categories() {

 		$labels = array(

 			'name' => _x('Portfolio Categories','taxonomy general name'),
 			'singular_name' => _x('Portfolio Category','taxonomy singular name'),
 			'search_items' => __('Search Portfolio Categories'),
 			'all_items' => __('All Portfolio Categories'),
 			'parent_item' => __('Parent Portfolio Category'),
 			'parent_item_colon' => __('Parent Portfolio Category:'),
 			'edit_item' => __('edit portfolio category'),
 			'update_item' => __('update portfolio category'),
 			'add_new_item' => __('add portfolio category'),
 			'new_item_name' => __('New Portfolio Category Name'),
 			'menu_name' => __('Portfolio Categories')

 			);

 		$args = array(
 			'hierarchical' => true,
 			'labels' => $labels,
 			'show_ui' => true,
 			'show_admin_column' => true,
 			'query_var' => true,
 			'rewrite' => array('slug' => 'categories'),
 			
 			);

 		register_taxonomy('portfolio_categories',array('portfolioitems'),$args);
 	}

 	add_action('init','create_portfolio_categories',1);


/* Enable Svg Images */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



 	/* Add slug body class */

 	function add_slug_body_class($classes)
 	{
 		global $post;
 		if(isset($post) )
 		{
 			$classes[] = $post->post_type . "-" . $post->post_name;
 		}

 		return $classes;
 	}

 	add_filter('body_class','add_slug_body_class');


  show_admin_bar(false);

  /* Page Selector */

  function PageSelector(){

  	global $post;
  	$post_slug = $post->post_name;
  	switch($post_slug)
  	{
  		case "portfolio":
  			get_template_part("partials/content-portfolio");
  		break;

  		case "contact":
  			get_template_part("partials/content-contact");
  		break;

  		case "main":
  			get_template_part("partials/content");
  		break;

  		default:
  			get_template_part("partials/content-main");
  		break;
  	}

  	return $post_slug;

  }
  
    
