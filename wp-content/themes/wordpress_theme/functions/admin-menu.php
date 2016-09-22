admin-menu.php
<?php
  add_action('admin-menu', 'create_theme_options_page');
  function create_theme_options_page(){
  	add_options_page('Theme Options', 'Theme_Options', 'administrator', __FILE__, 'build_options_page');
  }
  echo "Hello theme options!";

  function build_options_page() {
  ?>  
    <div id="theme-options-wrap">    <div class="icon32" id="icon-tools"> <br /> </div>    <h2>My Theme Options</h2>    <p>Take control of your theme, by overriding the default settings with your own specific preferences.</p>    <form method="post" action="options.php">      <p class="submit">        <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />      </p>    </form>  </div><?php
}
?>