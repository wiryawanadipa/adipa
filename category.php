<?php get_header(); ?>
<main class="container-xl p-4 my-xl-4 main-page">
	<div class="row">
		<div class="col-xl-9 ps-xl-4 pe-xl-3">
			<h2 class="mb-4"><?php echo single_cat_title( '', false ); ?></h2>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php include get_template_directory() . '/includes/postcard.php'; ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php echo '<p>There are no posts!</p>'; ?>
			<?php endif; ?>
			<?php pagenavi(); ?>
		</div>
        <?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer(); ?>