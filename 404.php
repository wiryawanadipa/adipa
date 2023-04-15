<?php get_template_part('template-parts/header'); ?>
<?php get_template_part('template-parts/parts/top-menu'); ?>
<main>
	<div class="content-list">
		<div class="not-found">
			<div class="not-found-info">
				<h1>404</h1>
				<svg xmlns="http://www.w3.org/2000/svg" fill="#fc5c65" height="192px" width="192px" viewBox="0 0 640 512"><path d="M320 0c17.7 0 32 14.3 32 32v64h120c39.8 0 72 32.2 72 72v272c0 39.8-32.2 72-72 72H168c-39.8 0-72-32.2-72-72V168c0-39.8 32.2-72 72-72h120V32c0-17.7 14.3-32 32-32zM208 384c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16h-32zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16h-32zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16h-32zM264 256a40 40 0 1 0-80 0 40 40 0 1 0 80 0zm152 40a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM48 224h16v192H48c-26.5 0-48-21.5-48-48v-96c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48h-16V224h16z"/></svg>
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
