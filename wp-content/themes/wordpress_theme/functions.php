<?php 

    function greeting(){
    	global $current_user;
    	get_currentuserinfo();
    	
		if ( is_user_logged_in() ) {
	    	echo "Hello ",$current_user->user_login . "\n";
		} else {
	    	echo 'Hello guest.';
		}
	}
?>