<?php get_header(); ?>
<div id="greeting">
  <?php greeting(); ?>
</div>

<div id="items">
	<ul>
	  <li>PHP</li>
	  <li>CSS</li>
	  <li>HTML</li>
	  <li>JQUERY</li>
	  <li>WORDPRESS</li>
	  <li>JAVASCRIPT</li>	 
	</ul>
</div>

<div id="user-links">
	<?php create_user_links(); ?>
	<?php 
		$user_links = get_user_links(1); 
		echo '<pre>';
		print_r($user_links);
	?>
</div>
<div id="options">
	<?php //get_all_options(); ?>
</div>

<div class="shortcode">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h3><?php the_title(); ?></h3>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>

</div>


<?php get_footer(); ?>