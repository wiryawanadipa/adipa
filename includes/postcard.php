<div class="col-xl-3 card border-0 postcard">
    <div class="row p-2 g-0 rounded overflow-hidden flex-md-row h-md-250 position-relative postcard-inside">
        <div class="col p-3 d-flex flex-column">
            <div class="mb-2">
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
            <div class="text-muted"><?php echo get_the_date('F j, Y'); ?></div>
            <h2>
                <a class="fs-5 stretched-link" href="<?php the_permalink() ?>">
                    <?php the_title() ?>
                </a>
            </h2>
            <?php the_excerpt(); ?>
            <span class="d-inline-block mb-2 text-white"><?php echo get_the_category()[0]->name; ?></span>
        </div>
    </div>
</div>