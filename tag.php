<?php get_template_part( 'template-parts/header' ); ?>
<main class="container-xl py-4 py-xl-5 main-page">
	<?php
		if ( is_paged() ) {
			echo '<h1 class="text-center mb-4 mb-sm-5 text-white tag-title">' . single_tag_title( '', false ) . ' - Page ' . $paged . '</h1>';
		} else {
			echo '<h1 class="text-center mb-4 mb-sm-5 text-white tag-title">' . single_tag_title( '', false ) . '</h1>';
		}
	?>
	<div class="row mt-4 mb-5 g-2 g-xxl-3">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/parts/postcard' );
			}
		} else {
			echo '<div class="fs-1 text-center text-white">Coming Soon!</div>';
		}
		?>
	</div>
	<?php pagenavi(); ?>
</main>
<?php
get_template_part( 'template-parts/footer' );
