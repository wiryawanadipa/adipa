<?php get_header(); ?>
<main class="container-xl py-4 my-xl-4 main-page">
	<div class="row">
		<div class="col-xl-9 ps-xl-4 pe-xl-3">
		<?php if ( have_posts() ) : ?>
            <h2 class="text-center mt-4 mb-5">Search results for <em><?php echo get_search_query(); ?></em></h2>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php include get_template_directory() . '/includes/postcard.php'; ?>
			<?php endwhile; ?>
            <?php else : ?>
                <div class="row text-center mt-4 mb-5">
                    <h2>No &#34;<em><?php echo get_search_query(); ?></em>&#34; found</h2>
                    <i class="fa-solid fa-triangle-exclamation fa-10x mb-3 mt-3"></i>
                    <p>Try another keyword.</p>
                </div>
            <?php endif; ?>
            <?php pagenavi(); ?>
		</div>
        <?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer(); ?>