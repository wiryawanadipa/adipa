<?php get_template_part( 'template-parts/header' ); ?>
<main>
	<div class="content-list">
		<div class="not-found">
			<div class="not-found-info">
				<h1>404</h1>
				<i class="fa-solid fa-triangle-exclamation fa-10x"></i>
				<p>I can't find what you're looking for.</p>
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
				'posts_per_page' => 12,
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
		<div class="content-list-box">
	</div>
</main>
<?php
get_template_part( 'template-parts/footer' );
