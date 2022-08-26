<?php get_header(); ?>
<?php include get_template_directory() . '/includes/hero.php'; ?>
<main class="container-xl py-4 py-lg-5 main-page">
	<div class="row mb-5 g-2 g-xxl-3">
		<h1 class="mb-4 text-white tag-title"><?php echo single_tag_title( '', false ); ?></h2>
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
<?php get_footer(); ?>