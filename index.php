<?php get_header(); ?>
<?php include get_template_directory() . '/includes/hero.php'; ?>
<main class="container-xl py-4 main-page">
	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php include get_template_directory() . '/includes/postcard.php'; ?>
		<?php endwhile; ?>
		<?php else : ?>
			<?php echo '<p>There are no posts!</p>'; ?>
		<?php endif; ?>
	</div>
	<?php pagenavi(); ?>
</main>
<?php include get_template_directory() . '/includes/quote.php'; ?>
<?php get_footer(); ?>