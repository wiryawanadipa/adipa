<?php /* Template Name: About Page */ ?>
<?php get_template_part( 'template-parts/header' ); ?>
<main class="container-xl my-3 my-sm-5 main-page">
	<div class="row wa-post">
		<article>
			<!-- Post Article -->
			<div class="wa-post-article">
				<!-- Post Title -->
				<div class="rounded-3 text-center mb-3 post-title">
					<header class="py-3 post-title-header">
						<h1 class="title-decoration"><?php echo strtolower(get_the_title()); ?></h1>
					</header>
				</div>
				<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							the_content();
						}
					}
				?>
				<div class="fs-3 mt-4 text-center about social">
					<a title="<?php bloginfo( 'name' ); ?> Mail" class="mx-sm-1 p-1" href="<?php echo esc_url( get_page_link( get_page_id_by_title( 'Contact' ) ) ); ?>"><i class="fa-solid fa-envelope fa-2x"></i></a>
					<?php get_template_part( 'template-parts/parts/social' ); ?>
				</div>
			</div>
		</article>
	</div>
</main>
<?php get_template_part( 'template-parts/footer' ); ?>