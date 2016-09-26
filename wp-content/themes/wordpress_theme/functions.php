<?php 

    function greeting(){
    	global $current_user;
    	//Valid but deprecated
    	// get_currentuserinfo();
    	wp_get_current_user();
    	
		if ( is_user_logged_in() ) {
	    	echo "<strong id = 'greet'>Hello ",$current_user->user_login . "\n</strong>";
		} else {
	    	echo 'Hello guest.';
		}
	}

	function get_all_options(){
		global $wpdb;
		echo("<h3>Database Options.</h3><br>");
		$results = $wpdb->get_results('SELECT * FROM wp_options');
		echo '<pre>';
		print_r( $results );
		echo '</pre>';
	}

	function create_user_links(){
		global $wpdb;

    	$table_name = $wpdb->prefix . 'user_links';
    	
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

	    	$sql = "CREATE TABLE $table_name (
	      	id int(11) NOT NULL AUTO_INCREMENT,
	      	user_id varchar(255) DEFAULT NULL,
	      	link varchar(255) DEFAULT NULL,
	      	UNIQUE KEY id (id)
	    	);";

	    	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	    	dbDelta( $sql );

	    	$wpdb->insert( 
				$table_name, 
					array( 
						 'id' => 1,
						 'user_id' => 1, 
						 'link' => "http://www.google.com/"
					) 
			);

			$wpdb->insert( 
				$table_name, 
					array( 
						 'id' => 2,
						 'user_id' => 1, 
						 'link' => "http://www.google.co.za"
					) 
			);

			$wpdb->insert( 
				$table_name, 
					array( 
						 'id' => 3,
						 'user_id' => 1, 
						 'link' => "http://lightswitch.solutions"
					) 
			);
			echo 'TABLE CREATED<br/>';
		} //end check if table exists
	}

	function get_user_links($user_id){
		global $wpdb;

		$table_name = $wpdb->prefix . 'user_links';
		$results = $wpdb->get_results( "
    		SELECT *
    		FROM wp_user_links
    		JOIN wp_users ON wp_users.ID = wp_user_links.user_id
		");

				// $results = $wpdb->get_results( "
  //   		SELECT *
  //   		FROM wp_user_links
  //    		WHERE wp_user_links.user_id = $user_id
		// ");


    	return $results;
	}

	// echo"JOINED TABLES";
	// echo "<pre>";
	// print_r(get_user_links(1));
	// echo "</pre>";


// Function to add subscribe text to posts and pages
	function test() {
		return 'short code test';
	}
	add_shortcode('testcode', 'test');

	function newsletterForm(){
		$my_form = "<form class='my_form_class'>
						<input type='text' placeholder='Your name' size=40> <br><br>
						<input type='text' placeholder='Your email'  size=40> <br><br>
						<input type='submit' value='Click to submit'>
					</form> ";		
		return $my_form;
	}
	add_shortcode('news_letter_subscription', 'newsletterForm');


	function custom_post_types() {
		$labels = array(
			'name'          => 'Teams',
			'singular_name' => 'Team',
			'add_new'       => 'Add New',
			'add_new_item'  => 'Add New Team Item',
			'new_item'      => 'New Team Item',
			'edit_item'     => 'Edit Team Item',
			'view_item'     => 'View Team Item',
			'not_found'     => 'No team found',
		);

		$args = array( 
			'public'      => true, 
			'labels'      => $labels,
			'description' => 'Holds our teams data',
			'supports'	  => array('title', 'editor', 'thumbnail', 'excerpt')
		);
	    register_post_type('teams', $args);
	}
	add_action('init', 'custom_post_types');

	add_theme_support( 'post-thumbnails' ); 
?>

<?php require_once(TEMPLATEPATH. '/functions/admin-menu.php'); ?>


<?php
	add_action( 'admin_menu', 'my_plugin_menu' );

	function my_plugin_menu() {
		// add_options_page();
		add_menu_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
	}

	function my_plugin_options() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		echo '<div class="wrap">';
		echo '<p>Here is where the form would go if I actually had options.</p>';
		//Diplay current menu positions
		echo '<pre>';
		print_r($GLOBALS['menu']);
		echo '</pre>';
		echo '</div>';
	}

?>




	


