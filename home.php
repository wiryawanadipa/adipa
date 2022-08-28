<?php get_template_part( 'template-parts/header' ); ?>
<?php include get_template_directory() . '/includes/hero.php'; ?>
<main class="container-xl py-5 main-page">
	<?php
		if ( is_paged() ) {
			echo '<h3 class="text-center mb-5 fs-1 text-white">Page ' . $paged . '</h3>';
		} else {
			echo '<h3 class="text-center mb-5 fs-1 text-white">Recent Post</h3>';
		}
	?>
	<?php pagenavi(); ?>
	<div class="row mt-4 mb-5 g-2 g-xxl-3">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				include get_template_directory() . '/includes/post-card.php';
			}
		} else {
			echo '<p class="text-center text-white">There are no posts, yet!</p>';
		}
		?>
	</div>
	<?php pagenavi(); ?>
</main>
<?php get_template_part( 'template-parts/footer' ); ?>