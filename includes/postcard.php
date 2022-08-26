<div class="col-sm-6 col-xl-4 card border-0 postcard">
    <div class="row g-0 rounded-1 overflow-hidden flex-md-row h-md-250 position-relative postcard-inside">
        <?php
        if ( has_post_thumbnail ( $post->ID ) ) {
            $image_id = get_post_thumbnail_id( $post->ID );
            $image_title = get_the_title($image_id);
            $image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'bigthumb' );
            echo '<div class="col-12 postcard-image"><img width="' . $image_src[1] . '" height="' . $image_src[2] . '" src="' . $image_src[0] . '" alt="' . $image_title . '" /></div>' . "\n";
        }
        ?>
        <div class="p-3 d-flex flex-column">
            <div class="text-muted postcard-date"><?php echo get_the_date('F j, Y'); ?></div>
            <h2 class="mb-3">
                <a class="fs-5 stretched-link" href="<?php the_permalink() ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
            <?php the_excerpt(); ?>
            <ul class="row postcard-tag-list">
                <?php
                    $tags = get_the_tags();
                    foreach( $tags as $tag) {
                        $tag_link = get_tag_link( $tag->term_id );
                        $name = $tag->name;
                        echo '<li><a class="d-inline-block postcard-tag text-white" href="' . $tag_link . '">' . esc_attr( $name) . '</a></li>' . "\n";
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
