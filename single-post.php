<?php get_header(); ?>
<main class="container-xl my-3 my-sm-5 main-page">
	<div class="row wa-post">
        <article class="col-xl-12">
            <!-- Post Title -->
            <div class="container px-0 px-md-3 mb-4 mb-md-5">
                <?php
                if ( has_post_thumbnail ( $post->ID ) ) {
                    $img_link = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full');
                    echo '<div class="col-12 d-flex rounded-3 text-white text-center align-items-center" style="background: linear-gradient(rgba(0, 0, 0, .55), rgba(0, 0, 0, .55)), url(' . $img_link[0] . ') no-repeat center / cover; min-height: 300px;">' . "\n";
                } else {
                    echo '<div class="col-12 d-flex rounded-3 text-white text-center align-items-center" style="background: #212b31; min-height: 300px;">' . "\n";
                }
                ?>
                    <header class="w-100 my-auto py-3 post-title">
                        <h1><?php the_title(); ?></h1>
                        <p class="post-info-top">
                            <i class="fa-solid fa-user"></i><span><?php the_post(); echo get_the_author(); rewind_posts(); ?></span>
                            <i class="fa-solid fa-calendar-days"></i><span><time><?php echo get_the_date(); ?></time></span>
                            <i class="fa-solid fa-tag"></i>
                            <?php
                                $categories = get_the_category();
                                foreach( $categories as $category) {
                                    $category_link = get_category_link( $category->term_id );
                                    $name = $category->name;
                                    echo '<span class="post-cat-list"><a href="' . $category_link . '">' . esc_attr( $name) . '</a></span>' . "\n";
                                }
                            ?>
                        </p>
                        <?php
                        if (has_tag()) {
                            echo '<p><i class="fa-solid fa-tags"></i>';
                            $tags = get_the_tags();
                            foreach( $tags as $tag) {
                                $tag_link = get_tag_link( $tag->term_id );
                                $name = $tag->name;
                                echo '<span class="post-tag-list"><a href="' . $tag_link . '">' . esc_attr( $name) . '</a></span>' . "\n";
                            }
                            echo '</p>';
                        }
                        ?>
                    </header>
                </div>
            </div>
            <!-- Post Article -->
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    echo '<div class="container px-0 px-md-3 wa-post-article">';
                        the_content();
                    echo '</div>';
                }
            }
            ?>
        </article>
	</div>
</main>
<?php get_footer(); ?>