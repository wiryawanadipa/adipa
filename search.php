<?php get_header(); ?>
<?php include get_template_directory() . '/includes/hero.php'; ?>
<main class="container-xl py-4 py-lg-5 main-page">
	<div class="row mb-5 g-2 g-xxl-3">
		<?php if ( have_posts() ) { ?>
            <h1 class="text-center mb-5 text-white">Search results for <em><?php echo get_search_query(); ?></em></h1>
        <?php
			while ( have_posts() ) {
				the_post();
				include get_template_directory() . '/includes/post-card.php';
			}
		} else {
        ?>
			<div class="col-12 text-center my-5 error-404">
                <h1>No &#34;<em><?php echo get_search_query(); ?></em>&#34; found</h1>
                <i class="fa-solid fa-triangle-exclamation fa-10x mb-3 mt-3"></i>
                <p>Try another keyword.</p>
            </div>
        <?php } ?>
	</div>
	<?php pagenavi(); ?>
</main>
<?php get_footer(); ?>