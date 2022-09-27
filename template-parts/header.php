<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="preconnect" href="https://cdn.jsdelivr.net">
		<link rel="preconnect" href="https://cdnjs.cloudflare.com">
		<link rel="preconnect" href="https://www.google.com">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link media="print" onload="this.onload=null;this.removeAttribute('media');" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
		<noscript>
			<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
		</noscript>
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/favicon/favicon-16x16.png">
		<link rel="shortcut icon" href="/favicon.ico">
		<meta name="theme-color" content="#eb3b5a" />
		<?php wp_head(); ?>
		<?php get_template_part( 'template-parts/parts/meta' ); ?>
	</head>
	<body>
		<?php get_template_part( 'template-parts/parts/top-menu' ); ?>
