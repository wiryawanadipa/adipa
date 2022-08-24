<div class="col-sm-6 col-xl-4 card border-0 postcard">
    <div class="row g-0 rounded-1 overflow-hidden flex-md-row h-md-250 position-relative postcard-inside">
            <div class="col-12 postcard-image">
                <?php
                $inc = get_post_thumbnail_id(get_the_id());
                $images = get_children( array (
                    'post_parent' => $post->ID,
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image',
                    'include' => $inc
                ));
                if ( empty($images) ) :
                else :
                    foreach ( $images as $attachment ) :
                        $att_id = $attachment->ID;
                        $att_title = str_replace('-', ' ', $attachment->post_title);
                        $att_src = wp_get_attachment_image_src( $attachment->ID, 'bigthumb' );
                        echo '<img width="' . $att_src[1] . '" height="' . $att_src[2] . '" src="' . $att_src[0] . '" alt="' . $att_title . '" />' . "\n";
                    endforeach;
                endif;
                ?>
            </div>
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
                        echo '<li><a class="d-inline-block postcard-tag text-white" href="' . $tag_link . '">' . esc_attr( $name) . '</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>