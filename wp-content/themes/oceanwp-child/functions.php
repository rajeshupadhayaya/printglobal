<?php

add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style');
function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet
	wp_register_style('child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	wp_enqueue_style('child-style');
	
}
// Update CSS within in Admin
add_action('admin_enqueue_scripts', 'admin_style');
function admin_style() {
	wp_register_style('admin-styles', get_stylesheet_directory_uri() . '/admin.css');
  	wp_enqueue_style('admin-styles');
}


//custom method for custom.js
add_action('wp_enqueue_scripts', 'my_scripts_method');

function my_scripts_method() {
// register your script location, dependencies and version
   wp_register_script('custom_script',get_stylesheet_directory_uri() . '/assets/js/custom.js',array('jquery') );
   wp_localize_script( 'custom_script', 'custom_script',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
 // enqueue the script
  wp_enqueue_script('custom_script');
  }

 //custom upload file
add_action( 'wp_ajax_upload_file','upload_file' );
add_action( 'wp_ajax_nopriv_upload_file','upload_file' );

/** Custom Menu to see above uploaded files */
add_action( 'admin_menu', 'custom_plugin_menu' );

function custom_plugin_menu() {
	add_options_page( 'Files Uploaded Group', 'Files Uploaded', 'manage_options', 'file_uploaded_by_customer', 'custom_plugin_options' );
}

function custom_plugin_options() {
	global $wpdb;

	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	$result = $wpdb->get_results("SELECT email,message,file_url FROM {$wpdb->prefix}custom_file_uploads
		ORDER BY timestamp LIMIT 25", OBJECT);
	echo '<div class="upload-result">';
	echo '<table class="upload-table">';
	echo '<tr><th>Email</th><th>Message</th><th>File</th></tr>';

	foreach ($result as $value) {
		echo '<tr><td>'.$value->email.'</td>'.'<td>'.$value->message.'</td>'.'<td><a href="'.$value->file_url.'" target="_blank">'.$value->file_url.'</a></td></tr>';
	}
	echo '</table>';
	echo '</div>';
}

/** file upload method */
function upload_file(){
   	global $wpdb;
   	if(isset($_POST['email']) && isset($_POST['message']) && isset($_FILES['file']))
   	{
	
		if (!function_exists('wp_handle_upload')) {
	       require_once(ABSPATH . 'wp-admin/includes/file.php');
	   	}
	  // echo $_FILES["upload"]["name"];
	   	$email = $_POST['email'];
	   	$message = $_POST['message'];
	  	$uploadedfile = $_FILES['file'];
	  	$upload_overrides = array('test_form' => false);
	  	$movefile = wp_handle_upload($uploadedfile, $upload_overrides);
	  	$tablename = $wpdb->prefix . "custom_file_uploads";

		// echo $movefile['url'];
	  	if ($movefile && !isset($movefile['error'])) {

	  		$wpdb->insert($tablename, array(
	  			'email' => $email,
	  			'message' => $message,
	  			'file_url' => $movefile['url'],
	  			'file_path' => $movefile['file']));
	  		// echo $tablename.' ';
	     	echo "File Upload Successfully ";
	     	// print_r($movefile);
		} 
		else {	
		    /**
		     * Error generated by _wp_handle_upload()
		     * @see _wp_handle_upload() in wp-admin/includes/file.php
		     */
		    echo $movefile['error'];
		}
   }
   	else{
   		return 'Please fill the form correctly';
   }
    
	die();
}

// Hide Product Category Count
add_filter( 'woocommerce_subcategory_count_html', 'prima_hide_subcategory_count' );
function prima_hide_subcategory_count() {
  /* empty - no count */
}

// add_action( 'widgets_init',  'extra_footer_widget' );
add_action( 'widgets_init',  array( 'OCEANWP_Theme_Class', 'register_sidebars' ) );

function extra_footer_widget(){

	$heading = 'h4';
	$heading = apply_filters( 'ocean_sidebar_heading', $heading );

	register_sidebar( array(
			'name'			=> esc_html__( 'Footer 5', 'oceanwp' ),
			'id'			=> 'footer-five',
			'description'	=> esc_html__( 'Widgets in this area are used in the fifth footer region.', 'oceanwp' ),
			'before_widget'	=> '<div id="%1$s" class="footer-widget %2$s clr">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<'. $heading .' class="widget-title">',
			'after_title'	=> '</'. $heading .'>',
		) );
}