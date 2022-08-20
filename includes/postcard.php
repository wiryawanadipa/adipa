<div class="col-md-12 postcard">
    <div class="row g-0 rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <div class="mb-1 text-muted"><?php echo get_the_date('F j, Y'); ?></div>
            <h2>
                <a class="stretched-link" href="<?php the_permalink() ?>">
                    <?php the_title() ?>
                </a>
            </h2>
            <strong class="d-inline-block mb-2 text-primary"><?php echo get_the_category()[0]->name; ?></strong>
        </div>
        <div class="col-auto d-none d-md-block">
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
    </div>
</div>