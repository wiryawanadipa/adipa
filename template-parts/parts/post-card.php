<div class="col-sm-6 col-lg-4">
	<div class="postcard">
		<div class="postcard-date"><?php echo get_the_date('F j, Y'); ?></div>
		<?php
		if (is_home()) {
			echo '<h3>';
		} else {
			echo '<h2>';
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
