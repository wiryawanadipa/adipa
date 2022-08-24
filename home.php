<?php get_header(); ?>
<?php include get_template_directory() . '/includes/hero.php'; ?>
<main class="container-xl py-4 py-lg-5 main-page">
	<div class="row mb-5 g-2 g-xxl-3">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				include get_template_directory() . '/includes/postcard.php';
			}
		} else {
			echo '<p>There are no posts!</p>';
		}
		?>
	</div>
	<?php pagenavi(); ?>
</main>
<?php include get_template_directory() . '/includes/quote.php'; ?>
<?php get_footer(); ?>