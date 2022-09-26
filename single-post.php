<?php get_template_part( 'template-parts/header' ); ?>
<main>
	<article class="article">
		<?php breadcrumbs(); ?>
		<header class="article-title">
			<h1><?php the_title(); ?></h1>
			<div class="article-info">
				<i class="fa-solid fa-calendar-days"></i><span><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time></span>
				<?php
				if( has_tag() ) {
					echo '<i class="fa-solid fa-tag"></i>';
					$tags = get_the_tags();
					foreach( $tags as $tag ) {
						$tag_link = get_tag_link( $tag->term_id);
						$name = $tag->name;
						echo '<span class="article-tag-list"><a href="' . $tag_link . '">' . esc_attr( $name ) . '</a></span>';
					}
				}
				?>
			</div>
		</header>
		<div class="article-content">
			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					the_content();
				}
			}
			?>
		</div>
	<?php wa_related_by_tags(); ?>
	</article>
</main>
<?php
get_template_part( 'template-parts/footer' );
