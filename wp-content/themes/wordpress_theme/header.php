
<!DOCTYPE html>
<html>
<head>
	<title>Wordpress Training</title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	 <?php wp_head(); ?>
</head>
<body>
  <div id="wrapper">
  	<div id="header">
  	  <h1>HEADER</h1>
  	  <ul id="linklist">
 <li>
  <?php _e('Check It Out'); ?>
  <ul id="pageslist">
   <li>
    <a title="Home Page" href="http://wwww.webmail.co.za">Exercise</a>
   </li>
   <li>
    <a title="Blog" href="index.php?cat=7">Exercise</a>
   </li>
   <li>
    <a title="Life Story" href="index.php?p=12">Exercise</a>
   </li>
   <?php wp_list_pages('exclude=4&depth=1&sort_column=menu_order&title_li='); ?>
   <li>
    <a title="Links and Resources" href="index.php?cat=33">Exercise</a>
   </li>
   <li>
    <a title="Site Map" href="sitemap.php">Exercise</a>
   </li>
  </ul>
 </li>
</ul>
  	</div>
  