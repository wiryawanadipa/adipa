<?php /* Template Name: About Page */ ?>
<?php get_template_part('template-parts/header'); ?>
<?php get_template_part('template-parts/parts/top-menu'); ?>
<main>
	<article class="article article-page">
		<header class="page-heading">
			<h1><?php echo get_the_title(); ?></h1>
		</header>
		<div class="article-content">
			<?php
				if( have_posts() ) {
					while( have_posts() ) {
						the_post();
						the_content();
					}
				}
			?>
		</div>
	</article>
</main>
<?php
get_template_part('template-parts/footer');
