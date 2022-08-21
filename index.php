<?php get_header(); ?>
<main class="container-xl py-4 main-page">
	<div class="row big-article-post-list">
		<div class="col-lg-6 col-md-12">
			<div class="big-post px-3">
				Text Left
			</div>
		</div>
		<div class="col-lg-6 col-md-12">
			Text Right
		</div>
	</div>
	<div class="row" data-masonry='{"percentPosition": true }'>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php include get_template_directory() . '/includes/postcard.php'; ?>
		<?php endwhile; ?>
		<?php else : ?>
			<?php echo '<p>There are no posts!</p>'; ?>
		<?php endif; ?>
		<?php pagenavi(); ?>
	</div>
</main>
<?php get_footer(); ?>