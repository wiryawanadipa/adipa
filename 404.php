<?php get_template_part('template-parts/header'); ?>
<?php get_template_part('template-parts/parts/top-menu'); ?>
<main>
	<div class="content-list">
		<div class="not-found">
			<div class="not-found-info">
				<h1>404</h1>
				<svg xmlns="http://www.w3.org/2000/svg" height='160px' width='160px' viewBox="0 0 640 512"><path d="M320 0c17.7 0 32 14.3 32 32V96H480c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H160c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64H288V32c0-17.7 14.3-32 32-32zM208 384c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H208zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H304zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H400zM264 256c0-22.1-17.9-40-40-40s-40 17.9-40 40s17.9 40 40 40s40-17.9 40-40zm152 40c22.1 0 40-17.9 40-40s-17.9-40-40-40s-40 17.9-40 40s17.9 40 40 40zM48 224H64V416H48c-26.5 0-48-21.5-48-48V272c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H576V224h16z"/></svg>
				<p>I couldn't find what you're looking for</p>
			</div>
			<div class="search-box">
				<form action="<?php bloginfo('url'); ?>" role="search" method="get">
					<input type="search" name="s" autocomplete="off" placeholder="Search here..." title="Search" aria-label="Search" required>
					<button type="submit" aria-label="Search Button"><svg xmlns="http://www.w3.org/2000/svg" height='20px' width='20px' viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg></button>
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
