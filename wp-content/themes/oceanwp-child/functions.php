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

//Replace add to cart button by a linked button to the product in Shop and archives pages
add_filter( 'woocommerce_loop_add_to_cart_link', 'replace_loop_add_to_cart_button', 10, 2 );
function replace_loop_add_to_cart_button( $button, $product  ) {
    // Not needed for variable products
    if( $product->is_type( 'variable' ) ) return $button;

    // Button text here
    $button_text = __( "View product", "woocommerce" );

    return '<a class="button" href="' . $product->get_permalink() . '">' . $button_text . '</a>';
}

add_filter( 'woocommerce_loop_add_to_cart_link', 'replacing_add_to_cart_button', 10, 2 );
function replacing_add_to_cart_button( $button, $product  ) {
	if ( $product->is_type( 'simple' ) ) {
		$button_text = __("View product", "woocommerce");
		$button = '<a class="button" href="' . $product->get_permalink() . '">' . 
		$button_text . '</a>';
	}
	return $button;
}

 //custom upload file
// add_action( 'wp_ajax_upload_file','upload_file' );
// add_action( 'wp_ajax_nopriv_upload_file','upload_file' );

// /** Custom Menu to see above uploaded files */
// add_action( 'admin_menu', 'custom_plugin_menu' );

// function custom_plugin_menu() {
// 	add_options_page( 'Files Uploaded Group', 'Files Uploaded', 'manage_options', 'file_uploaded_by_customer', 'custom_plugin_options' );
// }

// function custom_plugin_options() {
// 	global $wpdb;

// 	if ( !current_user_can( 'manage_options' ) )  {
// 		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
// 	}
// 	$result = $wpdb->get_results("SELECT email,message,file_url FROM {$wpdb->prefix}custom_file_uploads
// 		ORDER BY timestamp LIMIT 25", OBJECT);
// 	echo '<div class="upload-result">';
// 	echo '<table class="upload-table">';
// 	echo '<tr><th>Email</th><th>Message</th><th>File</th></tr>';

// 	foreach ($result as $value) {
// 		echo '<tr><td>'.$value->email.'</td>'.'<td>'.$value->message.'</td>'.'<td><a href="'.$value->file_url.'" target="_blank">'.$value->file_url.'</a></td></tr>';
// 	}
// 	echo '</table>';
// 	echo '</div>';
// }

// /** file upload method */
// function upload_file(){
//    	global $wpdb;
//    	if(isset($_POST['email']) && isset($_POST['message']) && isset($_FILES['file']))
//    	{
	
// 		if (!function_exists('wp_handle_upload')) {
// 	       require_once(ABSPATH . 'wp-admin/includes/file.php');
// 	   	}
// 	  // echo $_FILES["upload"]["name"];
// 	   	$email = $_POST['email'];
// 	   	$message = $_POST['message'];
// 	  	$uploadedfile = $_FILES['file'];
// 	  	$upload_overrides = array('test_form' => false);
// 	  	$movefile = wp_handle_upload($uploadedfile, $upload_overrides);
// 	  	$tablename = $wpdb->prefix . "custom_file_uploads";

// 		// echo $movefile['url'];
// 	  	if ($movefile && !isset($movefile['error'])) {

// 	  		$wpdb->insert($tablename, array(
// 	  			'email' => $email,
// 	  			'message' => $message,
// 	  			'file_url' => $movefile['url'],
// 	  			'file_path' => $movefile['file']));
// 	  		// echo $tablename.' ';
// 	     	echo "File Upload Successfully ";
// 	     	// print_r($movefile);
// 		} 
// 		else {	
// 		    /**
// 		     * Error generated by _wp_handle_upload()
// 		     * @see _wp_handle_upload() in wp-admin/includes/file.php
// 		     */
// 		    echo $movefile['error'];
// 		}
//    }
//    	else{
//    		return 'Please fill the form correctly';
//    }
    
// 	die();
// }


add_action( 'wp_ajax_product_price','product_price' );
add_action( 'wp_ajax_nopriv_product_price','product_price' );
/** Ajax to get price  */
function product_price(){
		
   	if(isset($_POST['length']) && isset($_POST['height']) )
   	{
	
	  
	   	$length = $_POST['length'];
			$height = $_POST['height'];
			$id = $_POST['id'];
	  	
			$price = get_product_price($length, $height,$id);

			echo '<span class="woocommerce-Price-amount amount">
			<span class="woocommerce-Price-currencySymbol">£</span>'.$price->price.'</span>';
   }
   	else{
   		return 'Invalid request';
   }
    
	die();
}

/* Update price in cart */ 
add_action( 'woocommerce_before_calculate_totals', 'add_custom_price', 20, 1);
function add_custom_price( $cart_obj ) {

    // This is necessary for WC 3.0+
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;
		

    // Avoiding hook repetition (when using price calculations for example)
    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
				return;

		$no_of_design_req = 0;		
		$already_present = false;
		$key='';
		// print("<pre>".print_r($cart_obj,true)."</pre>");
		// Loop through cart items
		
    foreach ( $cart_obj->get_cart() as $cart_item ) {
				// print_r($cart_item);
				
				$height = $cart_item['wccpf_height']['user_val'];
				$length = $cart_item['wccpf_length']['user_val'];

				if($height !='' && $length!=''){
					$price = get_product_price($length, $height,$cart_item['product_id']);
        	$cart_item['data']->set_price( $price->price );
				}
		
				$design_option = $cart_item['wccpf_printing_options']['user_val'];
				// print_r($cart_item);
				if($design_option == 'Print And Design'){
					$no_of_design_req += $cart_item['quantity'];
				}

				if($cart_item['product_id']==963){
					$already_present = true;
					$key = $cart_item['key'];
				}
		}

		if($already_present == false ){
			$cart_obj->add_to_cart(963, $no_of_design_req);
		} else{
			$cart_data = $cart_obj->get_cart()[$key];
			$quantity = $cart_data['quantity'];
			// echo $quantity, $no_of_design_req;
			if($quantity != $no_of_design_req){
				$cart_obj->add_to_cart(963, $no_of_design_req - $quantity);
			}
		}

		

 }

 function get_product_price($length, $height,$id){
	global $wpdb;
	$tablename = $wpdb->prefix . "product_pricing";

	// echo $movefile['url'];
	
	$sql = $wpdb->prepare("SELECT `price` FROM $tablename WHERE `length`=%s AND `height`=%s AND `product_id`=%s",
													array($length, $height, $id));
	return $wpdb->get_row($sql);
 }
