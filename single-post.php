<?php get_template_part( 'template-parts/header' ); ?>
<main class="container-xl my-3 my-sm-4 main-page">
	<div class="row wa-post">
		<article class="col-xl-12">
			<!-- Post Article -->
			<div class="container px-0 px-md-3 wa-post-article">
				<div class="wa-post-article-box">
					<?php breadcrumbs(); ?>
					<!-- Post Title -->
					<div class="container px-0 mb-4">
						<div class="col-12 d-flex rounded-3 post-title">
							<header class="w-100 my-auto py-3 post-title-header">
								<h1 class="mb-3"><?php the_title(); ?></h1>
								<p>
									<i class="fa-solid fa-calendar-days"></i><span><time><?php echo get_the_date(); ?></time></span>
									<?php
									if (has_tag()) {
										echo '<i class="fa-solid fa-tag"></i>';
										$tags = get_the_tags();
										foreach( $tags as $tag) {
											$tag_link = get_tag_link( $tag->term_id );
											$name = $tag->name;
											echo '<span class="post-tag-list"><a href="' . $tag_link . '">' . esc_attr( $name) . '</a></span>' . "\n";
										}
									}
									?>
								</p>
							</header>
						</div>
					</div>
					<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							the_content();
							wa_related_by_tags();
						}
					}
					?>
				</div>
			</div>
		</article>
	</div>
</main>
<?php get_template_part( 'template-parts/footer' ); ?>