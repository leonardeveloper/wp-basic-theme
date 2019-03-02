<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="robots" content="noodp">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page">
		<header id="header">
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>" id="logo"></a>

			<nav>
				<ul>
					<?php site_menu( 'primary' ); ?>
				</ul>
			</nav>
		</header>

		<div id="content">