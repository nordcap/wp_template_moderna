<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package moderna
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>Moderna - Bootstrap 3 flat corporate template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="author" content="http://bootstraptaste.com" />
	<!--TODO: определить зачем нужны 2 следующие конструкции-->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">





	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
		<div class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
<!--					TODO: Первую букву названия сайта Moderna необходимо обернуть в <span>	-->
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				</div>
				<div class="navbar-collapse collapse ">
<!--					TODO:здесь будет меню-->
					<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.html">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Features <b class=" icon-angle-down"></b></a>
							<ul class="dropdown-menu">
								<li><a href="typography.html">Typography</a></li>
								<li><a href="components.html">Components</a></li>
								<li><a href="pricingbox.html">Pricing box</a></li>
							</ul>
						</li>
						<li><a href="portfolio.html">Portfolio</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!-- end header -->
