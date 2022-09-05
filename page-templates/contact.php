<?php /* Template Name: Contact Page */ ?>
<?php session_start(); ?>
<?php get_template_part( 'template-parts/header' ); ?>
<main class="container-xl my-3 my-sm-5 main-page">
	<div class="row wa-post">
		<article class="col-xl-12">
			<!-- Post Title -->
			<div class="container px-0 mb-4">
				<div class="col-12 d-flex rounded-3 text-white text-center align-items-center post-title">
					<header class="w-100 my-auto py-3 post-title-header">
						<h1 class="title-decoration"><?php echo strtolower(get_the_title()); ?></h1>
					</header>
				</div>
			</div>
			<!-- Post Article -->
			<div class="container px-0 px-md-3 wa-post-article">
				<div class="wa-post-article-box">
					<?php get_template_part( 'template-parts/parts/contact-form' ); ?>
				</div>
			</div>
		</article>
	</div>
</main>
<?php get_template_part( 'template-parts/footer' ); ?>