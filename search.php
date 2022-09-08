<?php get_template_part( 'template-parts/header' ); ?>
<main class="container-xl py-4 py-xl-5 main-page">
	<?php if (have_posts()) { ?>
		<h1 class="text-center mb-4 mb-sm-5 text-white">Search results for <em><?php echo get_search_query(); ?></em></h1>
		<div class="row mt-4 mb-5 g-2 g-xxl-3">
			<?php
				while (have_posts()) {
					the_post();
					get_template_part( 'template-parts/parts/postcard' );
				}
			?>
		</div>
		<?php pagenavi(); ?>
	<?php } else { ?>
		<div class="row mb-5 g-2 g-xxl-3">	
			<div class="col-12 text-center my-5 error-404">
				<h1>No <em><?php echo get_search_query(); ?></em> found</h1>
				<i class="fa-solid fa-triangle-exclamation fa-10x mb-3 mt-3"></i>
				<div class="fs-4">Try another keyword.</div>
			</div>
			<div class="col-12 text-center search-big">
				<form action="<?php bloginfo('url'); ?>" role="search" method="get">
					<input type="search" name="s" autocomplete="off" placeholder="Search here..." title="Search" aria-label="Search" autofocus required>
				</form>
			</div>
			<?php
			$blog = array(
				'posts_per_page' => 9,
				'category_name' => 'Blog',
				'orderby' => 'rand'
			);
			$loop = new WP_Query( $blog );
			if ($loop->have_posts()) {
				while ($loop->have_posts()) {
					$loop->the_post();
					get_template_part( 'template-parts/parts/postcard' );
				}
			} else {
				echo '<div class="fs-1 text-center text-white">Coming Soon!</div>';
			}
			wp_reset_postdata();
			?>
		</div>
	<?php } ?>
</main>
<?php
get_template_part( 'template-parts/footer' );