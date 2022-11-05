<?php /* Template Name: Contact Page */ ?>
<?php session_start(); ?>
<?php get_template_part('template-parts/header'); ?>
<?php get_template_part('template-parts/parts/top-menu'); ?>
<main>
	<article class="article">
		<header class="page-heading">
			<h1><?php echo get_the_title(); ?></h1>
		</header>
		<?php get_template_part('template-parts/parts/contact-form'); ?>
	</article>
</main>
<?php
get_template_part('template-parts/footer');
