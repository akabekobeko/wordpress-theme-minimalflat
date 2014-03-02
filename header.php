<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="container">
	<!-- header -->
	<header class="page-header">
		<div class="site-branding">
			<h1 class="site-title">
				<?php if( get_header_image() ) : ?>
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
				<?php endif; ?>
				<a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
			</h1>
			<h2 class="site-description"><?php bloginfo('description'); ?></h2>
		</div>
		<nav class="site-navigation">
<?php get_search_form(); ?>
<?php wp_nav_menu( array ( 'theme_location' => 'header-navi' ) ); ?>
		</nav>
		<div class="clear"></div>
	</header>
	<!-- /header -->