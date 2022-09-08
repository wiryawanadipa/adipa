<?php /* Template Name: About Page */ ?>
<?php get_template_part( 'template-parts/header' ); ?>
<main class="container-xl my-3 my-sm-5 main-page">
	<article class="wa-post-article">
		<div class="rounded-3 text-center mb-3 post-title">
			<header class="py-3 post-title-header">
				<h1 class="title-decoration"><?php echo strtolower( get_the_title() ); ?></h1>
			</header>
		</div>
		<?php
			if( have_posts() ) {
				while( have_posts() ) {
					the_post();
					the_content();
				}
			}
		?>
		<div class="fs-3 mt-4 text-center about social">
			<a title="<?php bloginfo( 'name' ); ?> Mail" class="mx-sm-1 p-1" href="<?php echo esc_url( get_page_link( get_page_id_by_title( 'Contact' ) ) ); ?>"><i class="fa-solid fa-envelope fa-2x"></i></a>
			<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Facebook" class="mx-sm-1 p-1" href="https://www.facebook.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-facebook fa-2x"></i></a>
			<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Twitter" class="mx-sm-1 p-1" href="https://twitter.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-twitter fa-2x"></i></a>
			<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Instagram" class="mx-sm-1 p-1" href="https://www.instagram.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-instagram fa-2x"></i></a>
			<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa LinkedIn" class="mx-sm-1 p-1" href="https://www.linkedin.com/in/wiryawanadipa" target="_blank"><i class="fa-brands fa-linkedin fa-2x"></i></a>
			<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa GitHub" class="mx-sm-1 p-1" href="https://github.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-github fa-2x"></i></a>
			<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Youtube Channel" class="mx-sm-1 p-1" href="https://www.youtube.com/channel/UCpP1g9Vcl33ucu5mO2vr-5Q" target="_blank"><i class="fa-brands fa-youtube fa-2x"></i></a>
			<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Medium" class="mx-sm-1 p-1" href="https://medium.com/@wiryawanadipa" target="_blank"><i class="fa-brands fa-medium fa-2x"></i></a>
		</div>
	</article>
</main>
<?php
get_template_part( 'template-parts/footer' );
