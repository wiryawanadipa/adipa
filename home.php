<?php if ( !is_paged()) { ?>
	<?php get_template_part( 'template-parts/header' ); ?>
	<?php if ( !is_paged() ) { ?>
		<?php get_template_part( 'template-parts/parts/hero' ); ?>
		<?php get_template_part( 'template-parts/parts/design-gallery' ); ?>
	<?php } ?>
	<main class="container-xl py-4 py-xl-5 main-page">
		<h2 class="fs-1 text-center mb-4 mb-sm-5 text-white title-decoration">blog</h2>
		<div class="row mb-5 g-2 g-md-3 g-xl-2 g-xxl-3">
			<?php
			$blog = array(
				'posts_per_page' => 9,
				'category_name' => 'Blog'
			);
			$loop = new WP_Query( $blog );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) {
					$loop->the_post();
					get_template_part( 'template-parts/parts/postcard' );
				}
			} else {
				echo '<p class="fs-1 text-center text-white">Coming Soon!</p>';
			}
			wp_reset_postdata();
			?>
		</div>
	</main>
	<?php get_template_part( 'template-parts/footer' ); ?>
<?php } else { wp_safe_redirect(home_url(), 301); exit; } ?>