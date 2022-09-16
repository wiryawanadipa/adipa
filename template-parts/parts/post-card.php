<div class="col-sm-6 col-lg-4">
	<div class="row g-0 rounded-1 overflow-hidden flex-md-row h-md-250 position-relative postcard">
		<?php
		if (has_post_thumbnail ($post->ID)) {
			$image_id = get_post_thumbnail_id($post->ID);
			$image_title = get_the_title($image_id);
			$image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'bigthumb');
			echo '<div class="postcard-image"><img width="' . $image_src[1] . '" height="' . $image_src[2] . '" src="' . $image_src[0] . '" alt="' . $image_title . '" /></div>';
		}
		?>
		<div class="p-3 d-flex flex-column">
			<div class="text-muted postcard-date"><?php echo get_the_date('F j, Y'); ?></div>
			<?php
			if (is_home()) {
				echo '<h3 class="mb-3">';
			} else {
				echo '<h2 class="mb-3">';
			}
			echo '<a class="fs-5 stretched-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
			if (is_home()) {
				echo '</h3>';
			} else {
				echo '</h2>';
			}
			the_excerpt();
			if (has_tag()) {
				echo '<ul class="row postcard-tag-list">';
				$tags = get_the_tags();
				foreach ($tags as $tag) {
					$tag_link = get_tag_link($tag->term_id);
					$name = $tag->name;
					echo '<li><a class="d-inline-block postcard-tag text-white" href="' . $tag_link . '">' . esc_attr($name) . '</a></li>';
				}
				echo '</ul>';
			}
			?>
		</div>
	</div>
</div>
