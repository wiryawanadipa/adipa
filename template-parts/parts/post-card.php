<article class="postcard">
	<div class="postcard-box">
		<?php
		if (
			has_post_thumbnail($post->ID)
			&& is_category('design-gallery')
			|| is_category('project')
		) {
			$image_id = get_post_thumbnail_id($post->ID);
			$image_title = get_the_title($image_id);
			$image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'bigthumb');
			echo '<div class="postcard-image"><img width="' . $image_src[1] . '" height="' . $image_src[2] . '" src="' . $image_src[0] . '" alt="' . $image_title . '" /></div>';
		}
		echo '<div class="postcard-date">' . get_the_date('Y-m-d H:i:s') . '</div>';
		if (is_home()) {
			echo '<h3>';
		} else {
			echo '<h2>';
		}
		echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '" aria-label="' . get_the_title() . '">' . get_the_title() . '</a>';
		if (is_home()) {
			echo '</h3>';
		} else {
			echo '</h2>';
		}
		the_excerpt();
		if (has_tag()) {
			echo '<ul>';
			$tags = get_the_tags();
			foreach ($tags as $tag) {
				$tag_link = get_tag_link($tag->term_id);
				$name = $tag->name;
				echo '<li><a href="' . $tag_link . '" title="' . esc_attr($name) . '" aria-label="' . esc_attr($name) . '">' . esc_attr($name) . '</a></li>';
			}
			echo '</ul>';
		}
		?>
	</div>
</article>
