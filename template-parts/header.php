<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="preconnect" href="https://www.google.com">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon/favicon-16x16.png">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<meta name="theme-color" content="#eb3b5a" />
		<?php wp_head(); ?>
		<?php get_template_part('template-parts/parts/meta'); ?>
	</head>
	<body>
