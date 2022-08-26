<?php get_header(); ?>
<main class="container-xl py-5 main-page">
	<?php if ( have_posts() ) { ?>
		<h1 class="text-center mt-4 mt-sm-3 mb-5 text-white">Search results for <em><?php echo get_search_query(); ?></em></h1>
		<?php pagenavi(); ?>
		<div class="row mt-4 mb-5 g-2 g-xxl-3">
			<?php
				while ( have_posts() ) {
					the_post();
					include get_template_directory() . '/includes/post-card.php';
				}
			?>
		</div>
		<?php pagenavi(); ?>
	<?php } else { ?>
		<div class="row mb-5 g-2 g-xxl-3">	
			<div class="col-12 text-center my-5 error-404">
				<h1>No &#34;<em><?php echo get_search_query(); ?></em>&#34; found</h1>
				<i class="fa-solid fa-triangle-exclamation fa-10x mb-3 mt-3"></i>
				<p>Try another keyword.</p>
			</div>
		</div>
	<?php } ?>
</main>
<?php get_footer(); ?>