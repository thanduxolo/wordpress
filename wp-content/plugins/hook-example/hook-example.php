<?php
/**
 * Plugin Name: Hook Test
 * Description: A simple plugin to test hooks
 */

	add_action( 'wp_insert_post', 'email_post_author', 10, 3 );

	function email_post_author( $post_id, $post, $update ) {
  		$email = 'thanduxolo@lightswitch.solutions';
 		$subject = 'New Post Published';
 		$message = 'A new post was published, use this link to view it: ' . get_permalink( $post->ID );
 		
 		wp_mail( $email, $subject, $message );
	}

?>