<?php get_template_part('template-parts/header'); ?>
<?php get_template_part('template-parts/parts/top-menu'); ?>
<main>
	<div class="content-list">
		<?php
		if (is_paged()) {
			echo '<h1 class="tag-list-heading">' . single_tag_title('', false) . ' - Page ' . $paged . '</h1>';
		} else {
			echo '<h1 class="tag-list-heading">' . single_tag_title('', false) . '</h1>';
		}
		if (have_posts()) {
			echo '<div class="content-list-box">';
			while (have_posts()) {
				the_post();
				get_template_part('template-parts/parts/post-card');
			}
			echo '</div>';
			custom_pagination();
		} else {
			echo '<div class="content-list-box">';
			echo '<div class="coming-soon">Coming Soon!</div>';
			echo '</div>';
		}
		?>
	</div>
</main>
<?php
get_template_part('template-parts/footer');
