<?php
if ( is_admin() ) : // Load only if we are viewing an admin page

	// Register settings and call sanitation functions
	function register_settings() {
		register_setting( 'theme_options', 'option_1');
		register_setting( 'theme_options', 'option_2');
		register_setting( 'theme_options', 'option_3');
	}
	add_action( 'admin_init', 'register_settings' );

	function sa_theme_options() {
		// Add theme options page to the addmin menu
		add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'sa_theme_options_page' );
	}
	add_action( 'admin_menu', 'sa_theme_options' );

	// Function to generate options page
	function sa_theme_options_page() {
		if ( ! isset( $_REQUEST['updated'] ) )
			$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. 
?>

		<div class="wrap">

		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>"; ?>


		<form method="post" action="options.php">

		<?php 
			$option_1 = get_option( 'option_1' ); 
			$option_2 = get_option( 'option_2' ); 
			$option_3 = get_option( 'option_3' );
		?>
		
		<?php settings_fields( 'theme_options' );
		/* This function outputs some hidden fields required by the form,
		including a nonce, a unique number used to ensure the form has been submitted from the admin page
		and not somewhere else, very important for security */ ?>

		<table class="form-table"><!-- Grab a hot cup of coffee, yes we're using tables! -->
			<tr valign="top">
				<td>
					<label>Option 1 :</label>
				</td>
				<td>
					<input name="option_1" type="text" value="<?php  esc_attr_e($option_1); ?>" />
				</td>
			</tr>	
			<tr valign="top">
				<td>
					<label>Option 2 :</label>
				</td>
				<td>
					<input name="option_2" type="text" value="<?php  esc_attr_e($option_2); ?>" />
				</td>
			</tr>	
			<tr valign="top">
				<td>
					<label>Option 3: </label>
				</td>
				<td>
					<input name="option_3" type="text" value="<?php esc_attr_e($option_3); ?>" >
				</td>		
			</tr>
		</table>

		<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

		</form>

		</div> <!--CLOSE WRAP -->

		<?php
	}
endif;  // EndIf is_admin()