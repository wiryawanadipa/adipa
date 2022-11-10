<?php get_template_part('template-parts/header'); ?>
<?php get_template_part('template-parts/parts/top-menu'); ?>
<main>
	<article class="article">
		<?php breadcrumbs(); ?>
		<header class="article-title">
			<h1><?php the_title(); ?></h1>
			<div class="article-info">
				<div class="info-date">
					<i class="fa-solid fa-calendar-days"></i>
					<span><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time></span>
				</div>
				<?php
				if (has_tag()) {
					echo '<div class="info-tag-list">';
					echo '<i class="fa-solid fa-tags"></i>';
					$tags = get_the_tags();
					foreach ($tags as $tag) {
						$tag_link = get_tag_link($tag->term_id);
						$name = $tag->name;
						echo '<span class="article-tag"><a href="' . $tag_link . '">' . esc_attr($name) . '</a></span>';
					}
					echo '</div>';
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
get_template_part('template-parts/footer');
