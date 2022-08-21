<?php get_header(); ?>
<main class="container-xl py-4 main-page">
	<div class="container-xl py-xl-5 mb-5 hero">
		<div class="row">
			<div class="col-lg-8 p-xl-3">
				<div class="hero-heading-name">
					Hi! I'm Wiryawan Adipa.
				</div>
				<div class="hero-heading-text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, modi dicta molestias eveniet, perspiciatis neque incidunt eaque dolore ratione, deleniti illo? Sunt, non. Ab atque facere, veniam error itaque enim.
				</div>
			</div>
			<div class="col-lg-4 d-none d-lg-block position-relative hero-photo">
				<img class="position-absolute top-50 start-50 translate-middle rounded-circle" src="<?php bloginfo('stylesheet_directory'); ?>/assets/wiryawan-adipa-photo.jpg" alt="">
			</div>
		</div>
	</div>
	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php include get_template_directory() . '/includes/postcard.php'; ?>
		<?php endwhile; ?>
		<?php else : ?>
			<?php echo '<p>There are no posts!</p>'; ?>
		<?php endif; ?>
	</div>
	<?php pagenavi(); ?>
</main>
<?php get_footer(); ?>