<?php 

    function greeting(){
    	global $current_user;
    	//Valid but deprecated
    	// get_currentuserinfo();
    	wp_get_current_user();
    	
		if ( is_user_logged_in() ) {
	    	echo "<strong>Hello ",$current_user->user_login . "\n</strong>";
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
					<input type='text' placeholder='Your name'> <br><br>
					<input type='text' placeholder='Your email'> <br><br>
					<input type='submit' value='Click to submit'>
				</form> ";		
	return $my_form;
}
add_shortcode('news_letter_subscription', 'newsletterForm');

// function create_post_type(){
// 	register_post_type('Team', 
// 		//CTP Options
// 		array(),
// 	);
// }

// Our custom post type function
function create_posttype() {
    register_post_type( 'movies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


/*
* Creating a function to create our CPT
*/
function custom_post_type() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Movies', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Movie', 'twentythirteen' ),
        'all_items'           => __( 'All Movies', 'twentythirteen' ),
        'view_item'           => __( 'View Movie', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Movie', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Movie', 'twentythirteen' ),
        'update_item'         => __( 'Update Movie', 'twentythirteen' ),
        'search_items'        => __( 'Search Movie', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
// Set other options for Custom Post Type
    $args = array(
        'label'               => __( 'movies', 'twentythirteen' ),
        'description'         => __( 'Movie news and reviews', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'movies', $args );
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
60
*/
add_action( 'init', 'custom_post_type', 0 );


	
?>