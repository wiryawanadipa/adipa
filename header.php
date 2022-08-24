<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<?php include 'meta.php'; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="preconnect" href="https://cdn.jsdelivr.net">
		<link rel="preconnect" href="https://cdnjs.cloudflare.com">
		<link rel="preconnect" href="https://instant.page">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon/site.webmanifest">
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Mogra&display=swap" rel="stylesheet">
		<?php wp_head(); ?>
		<?php
		$headcode = trim( get_option( 'head_code' ) );
		if ( null != get_option( 'head_code' ) && !empty ( $headcode ) ) {
			echo get_option( 'head_code' ) . "\n";
		}
		?>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-xl navbar-dark navbar-expand-sm wa-navbar">
				<div class="container-lg">
					<a class="navbar-brand" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/wiryawan-adipa-logo.png" alt="Wiryawan Adipa Logo"><span>Wiryawan Adipa</span></a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse mt-1 mt-sm-0" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto mb-2 mb-sm-0 me-sm-2 mt-3 mt-sm-0">
							<li class="nav-item mx-lg-2">
								<a class="nav-link py-3 py-sm-2 px-3 px-sm-2" href="<?php bloginfo('url'); ?>">Home</a>
							</li>
							<li class="nav-item mx-lg-2">
								<a class="nav-link py-3 py-sm-2 px-3 px-sm-2" href="<?php bloginfo('url'); ?>">Blog</a>
							</li>
							<li class="nav-item mx-lg-2 dropdown">
								<a class="nav-link dropdown-toggle py-3 py-sm-2 px-3 px-sm-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Category
								</a>
								<ul class="dropdown-menu">
									<?php wp_list_categories('title_li='); ?>
								</ul>
							</li>
							<li class="nav-item mx-lg-2 dropdown">
								<a class="nav-link dropdown-toggle py-3 py-sm-2 px-3 px-sm-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Page
								</a>
								<ul class="dropdown-menu">
									<?php wp_list_pages('&title_li='); ?>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>