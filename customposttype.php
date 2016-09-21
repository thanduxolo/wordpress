<?php
$current_path = getcwd();
require("$current_path/wp-load.php");
get_header();
?>
<h1 class="entry-title">Let's display some custom post type content</h1>

<?php
//Define your custom post type name in the arguments
 
$args = array('post_type' => 'bios');
 
//Define the loop based on arguments
 
$loop = new WP_Query( $args );
 
//Display the contents
 
while ( $loop->have_posts() ) : $loop->the_post();
?>
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="entry-content">
<?php the_content(); ?>
</div>
?>
<?php endwhile;?>