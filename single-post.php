<?php get_template_part( 'template-parts/header' ); ?>
<main class="container-xl mt-2 mt-sm-3 mb-5 main-page">
	<article class="wa-post-article">
		<?php breadcrumbs(); ?>
		<div class="post-title">
			<header class="post-title-header">
				<h1><?php the_title(); ?></h1>
				<div class="post-info">
					<i class="fa-solid fa-calendar-days"></i><span><time><?php echo get_the_date(); ?></time></span>
					<?php
					if( has_tag() ) {
						echo '<i class="fa-solid fa-tag"></i>';
						$tags = get_the_tags();
						foreach( $tags as $tag ) {
							$tag_link = get_tag_link( $tag->term_id);
							$name = $tag->name;
							echo '<span class="post-tag-list"><a href="' . $tag_link . '">' . esc_attr( $name ) . '</a></span>' . "\n";
						}
					}
					?>
				</div>
			</header>
		</div>
		<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				the_content();
			}
		}
		?>
	<?php wa_related_by_tags(); ?>
	</article>
</main>
<?php
get_template_part( 'template-parts/footer' );
