<?php get_template_part( 'template-parts/header' ); ?>
<main>
	<div class="content-list">
		<?php
			if (is_paged()) {
				echo '<h1 class="category-list-heading">' . single_cat_title( '', false ) . ' - Page ' . $paged . '</h1>';
			} else {
				echo '<h1 class="category-list-heading">' . single_cat_title( '', false ) . '</h1>';
			}
		?>
		<div class="content-list-box">
			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					get_template_part( 'template-parts/parts/post-card' );
				}
			} else {
				echo '<div class="coming-soon">Coming Soon!</div>';
			}
			pagenavi();
			?>
		</div>
	</div>
</main>
<?php
get_template_part( 'template-parts/footer' );
