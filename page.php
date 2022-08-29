<?php get_template_part( 'template-parts/header' ); ?>
<main class="container-xl my-3 my-sm-5 main-page">
	<div class="row wa-post">
        <article class="col-xl-12">
            <!-- Post Title -->
            <div class="container px-0 mb-4">
                <?php
                if ( has_post_thumbnail ( $post->ID ) ) {
                    $img_link = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full');
                    echo '<div class="col-12 d-flex rounded-3 text-white text-center align-items-center" style="background: linear-gradient(rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(' . $img_link[0] . ') no-repeat center / cover; min-height: 300px;">' . "\n";
                } else {
                    echo '<div class="col-12 d-flex rounded-3 text-white text-center align-items-center" style="background: #212b31; min-height: 300px;">' . "\n";
                }
                ?>
                    <header class="w-100 my-auto py-3 post-title">
                        <h1><?php the_title(); ?></h1>
                        <p>
                            <i class="fa-solid fa-user"></i><span><?php the_post(); echo get_the_author(); rewind_posts(); ?></span>
                            <i class="fa-solid fa-calendar-days"></i><span><time><?php echo get_the_date(); ?></time></span>
                        </p>
                    </header>
                </div>
            </div>
            <!-- Post Article -->
            <div class="container px-0 px-md-3 wa-post-article">
                <div class="wa-post-article-box">
                    <?php
                    if ( is_page('About') ) {
                        get_template_part( 'template-parts/pages/about' );
                    } elseif ( is_page('Contact') ) {
                        get_template_part( 'template-parts/pages/contact' );
                    } elseif ( is_page('Privacy Policy') ) {
                        get_template_part( 'template-parts/pages/privacy-policy' );
                    } else {
                        if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post();
                                the_content();
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </article>
	</div>
</main>
<?php get_template_part( 'template-parts/footer' ); ?>