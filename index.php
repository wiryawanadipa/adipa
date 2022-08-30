<?php get_template_part( 'template-parts/header' ); ?>
<?php if ( !is_paged() ) { ?>
	<?php get_template_part( 'template-parts/parts/hero' ); ?>
	<?php get_template_part( 'template-parts/parts/design-gallery' ); ?>
<?php } ?>
<main class="container-xl py-4 py-xl-5<?php if ( !is_paged() ) { ?> mt-5<?php } ?> main-page">
	<div class="row mb-5 g-2 g-md-3 g-xl-2 g-xxl-3">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/parts/postcard' );
			}
		} else {
			echo '<p class="fs-1 text-center text-white">Coming Soon!</p>';
		}
		?>
	</div>
	<?php pagenavi(); ?>
</main>
<?php get_template_part( 'template-parts/footer' ); ?>