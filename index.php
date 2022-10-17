<?php get_template_part('template-parts/header'); ?>
<?php get_template_part('template-parts/parts/hero'); ?>
<main>
	<div class="content-list">
		<h2 class="content-list-heading">Blog</h2>
		<div class="content-list-box">
			<?php
			$blog = array(
				'posts_per_page' => 12,
				'category_name' => 'blog'
			);
			$loop = new WP_Query($blog);
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
<?php get_template_part('template-parts/footer');
