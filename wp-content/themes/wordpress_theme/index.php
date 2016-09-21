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

<h1>Teams: query_posts</h1>
<!-- <?php 
	//query_posts('post_type=teams&posts_per_page=10'); 
?>
<table class="table">
  <tr class="row">
      <th>TITLE</th>
      <th>EXCERPT</th>
      <th>THUMBNAIL</th>
    </tr>
<?php if(have_posts()) : while (have_posts() ) : the_post(); ?>
    
    <tr>
      <td><?php the_title(); ?></td>
      <td><?php the_excerpt(); ?></td>
      <td><?php echo get_the_post_thumbnail(); ?></td>
    </tr>
<?php endwhile; endif; ?>
  </table> -->

<br /><br /><hr /></br /><br />

<h1>Teams: get_posts</h1>

<?php 
  $team_args = array(
	'post_type' => 'teams',
	'numberposts' => 5
  );
  $team_members = get_posts($team_args);

  // print_r($team_members);
  // echo"<pre>";
  // print_r ($team_members);
  // echo"</pre>";

  // if($team_members){
  // 	echo "THERE ARE TEAM MEMBERS<br>";
  // 	foreach ($team_members as $value) {
  // 		setup_postdata($value);?>
   		<?//php the_content(); ?>
   	}
  	
   }

?>

<?php get_footer(); ?>