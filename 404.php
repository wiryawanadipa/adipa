<?php get_template_part('template-parts/header'); ?>
<?php get_template_part('template-parts/parts/top-menu'); ?>
<main>
	<div class="content-list">
		<div class="not-found">
			<div class="not-found-info">
				<h1>404</h1>
				<i class="fa-solid fa-robot fa-10x"></i>
				<p>Page Not Found!</p>
			</div>
			<div class="search-box search-page-type">
				<form action="<?php bloginfo('url'); ?>" role="search" method="get">
					<input type="search" name="s" autocomplete="off" placeholder="Search" title="Search" aria-label="Search" required>
					<button type="submit" aria-label="Search Button"><i class="fa-solid fa-magnifying-glass"></i></button>
				</form>
			</div>
		</div>
		<h2 class="random-post-list-heading">My Blog Posts You Might Like</h2>
		<div class="content-list-box">
			<?php
			$blog = array(
				'posts_per_page' => 12,
				'category_name' => 'Blog',
				'orderby' => 'rand'
			);
			$loop = new WP_Query( $blog );
			if ($loop->have_posts()) {
				while ($loop->have_posts()) {
					$loop->the_post();
					get_template_part('template-parts/parts/post-card');
				}
			} else {
				echo '<div class="coming-soon">Coming Soon!</div>';
			}
			wp_reset_postdata();
			?>
		</div>
	</div>
</main>
<?php
get_template_part('template-parts/footer');
