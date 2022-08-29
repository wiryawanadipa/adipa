<?php get_template_part( 'template-parts/header' ); ?>
<?php get_template_part( 'template-parts/parts/hero' ); ?>
<main class="container-xl py-4 py-xl-5 main-page">
	<div class="row mb-5 g-2 g-md-3 g-xl-2 g-xxl-3">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/parts/postcard' );
			}
		} else {
			echo '<p class="text-center text-white">There are no posts, yet!</p>';
		}
		?>
	</div>
	<?php pagenavi(); ?>
</main>
<?php get_template_part( 'template-parts/footer' ); ?>