<?php get_template_part( 'template-parts/header' ); ?>
<main>
	<?php if (have_posts()) { ?>
		<div class="content-list search-content-list">
			<h1>Search results for <em><?php echo get_search_query(); ?></em></h1>
			<div class="search-box">
				<form action="<?php bloginfo('url'); ?>" role="search" method="get">
					<input type="search" name="s" autocomplete="off" placeholder="Search here..." title="Search" aria-label="Search" autofocus required>
					<button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
				</form>
			</div>
			<div class="content-list-box">
				<?php
				while (have_posts()) {
					the_post();
					get_template_part( 'template-parts/parts/post-card' );
				}
				pagenavi();
				?>
			</div>
		</div>
	<?php } else { ?>
		<div class="content-list">
			<div class="not-found">
				<div class="not-found-info">
					<h1>No <em><?php echo get_search_query(); ?></em> found</h1>
					<i class="fa-solid fa-triangle-exclamation fa-10x"></i>
					<p>Try another keyword.</p>
				</div>
				<div class="search-box">
					<form action="<?php bloginfo('url'); ?>" role="search" method="get">
						<input type="search" name="s" autocomplete="off" placeholder="Search here..." title="Search" aria-label="Search" autofocus required>
						<button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
					</form>
				</div>
			</div>
			<div class="content-list-box">
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
						get_template_part( 'template-parts/parts/post-card' );
					}
				} else {
					echo '<div class="coming-soon">Coming Soon!</div>';
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
	<?php } ?>
</main>
<?php
get_template_part( 'template-parts/footer' );
