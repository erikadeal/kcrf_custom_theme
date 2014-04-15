<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

		<?php // Icon fonts and web fonts ?>
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700' rel='stylesheet' type='text/css'>

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">

					<h1 id="logo" class="h1">
						<a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a>
						<a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo home_url();?>/wp-content/themes/kcrf_custom_theme/library/images/revised_logo.png"></a>
					</h1>

					<div class="twelvecol wrap top-bar clearfix">
						<ul class="tencol first clearfix secondary-nav">
							<li><a href="<?php echo home_url();?>/contact">Contact</a></li>
							<?php global $user_ID, $user_identity; get_currentuserinfo(); 
							if (!$user_ID) { ?>
							<li><a href="<?php echo home_url();?>/login">Login/Register</a></li>
							<?php } 
							else { // if user is logged in ?>
							<li><a href="<?php echo home_url();?>/profile">My Profile</a></li>
							<?php } ?>
							<li><a href="<?php echo home_url();?>">Home</a></li>
						</ul>
						<form id="searchform-top" class="search-form twocol last clearfix" action="<?php echo home_url(); ?>" method="get" role="search">
							<input id="s" class="search-field" type="search" placeholder="Search" name="s" value="">
							<button type="submit">
								<i class="fa fa-search"></i>
							</button>
						</form>
					</div>
				</div>

				<a id="menu-link">&#8801;</a>

				<div id="menu">
					<nav role="navigation">
						<ul class="nav mobile-nav">
							<li><a href="<?php echo home_url();?>">Home</a></li>
						</ul>
						<?php bones_main_nav(); ?>
						<ul class="nav mobile-nav">
							<li><a href="<?php echo home_url();?>/contact">Contact</a></li>
							<?php global $user_ID, $user_identity; get_currentuserinfo(); 
							if (!$user_ID) { ?>
							<li><a href="<?php echo home_url();?>/login">Login/Register</a></li>
							<?php } 
							else { // if user is logged in ?>
							<li><a href="<?php echo home_url();?>/profile">My Profile</a></li>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</header>
