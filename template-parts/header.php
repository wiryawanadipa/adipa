<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- External Assets CDN -->
		<link rel="preconnect" href="https://cdn.jsdelivr.net">
		<link rel="preconnect" href="https://cdnjs.cloudflare.com">
		<link rel="preconnect" href="https://www.google.com">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon/site.webmanifest">
		<!-- wp_head -->
		<?php wp_head(); ?>
		<?php get_template_part( 'template-parts/parts/meta' ); ?>
		<?php
		$headcode = trim( get_option( 'head_code' ) );
		if ( null != get_option( 'head_code' ) && !empty ( $headcode ) ) {
			echo '<!-- Extra Code -->' . "\n";
			echo get_option( 'head_code' ) . "\n";
		}
		?>
	</head>
	<body>
		<div class="d-none d-md-block py-4 top-space"></div>
		<?php get_template_part( 'template-parts/parts/topnav' ); ?>
		<div class="d-none d-md-block py-4 top-space"></div>
		<!-- Main -->