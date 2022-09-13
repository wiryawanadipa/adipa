<?php /* Template Name: Contact Page */ ?>
<?php session_start(); ?>
<?php get_template_part( 'template-parts/header' ); ?>
<main class="container-xl my-3 my-sm-5 main-page">
	<article class="wa-post-article">
		<div class="text-center post-title">
			<header class="py-3 post-title-header">
				<h1 class="title-decoration"><?php echo strtolower( get_the_title() ); ?></h1>
			</header>
		</div>
		<?php get_template_part( 'template-parts/parts/contact-form' ); ?>
	</article>
</main>
<?php
get_template_part( 'template-parts/footer' );
