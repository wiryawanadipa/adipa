<?php get_header(); ?>
<main class="container-xl my-xl-4 main-page">
	<div class="row wa-post">
        <div class="container p-4">
            <?php $img_link = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full'); ?>
            <div class="col-12 d-flex border rounded-3 text-white text-center align-items-center" style="background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(<?php echo $img_link[0]; ?>) no-repeat center / cover; height: 360px;">
                <header class="w-100 my-auto post-title">
                    <h1><?php the_title(); ?></h1>
                    <p><i class="fa-solid fa-user"></i><span><?php the_post(); echo get_the_author(); rewind_posts(); ?></span><i class="fa-solid fa-calendar"></i><span><time><?php echo get_the_date(); ?></time></span></p>
                </header>
            </div>
        </div>
        <article class="col-xl-9 ps-xl-4 pe-xl-3">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="container wa-post-article">
                    <?php the_content(); ?>
                </div>
                <?php comments_template('/comments.php'); ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </article>
        <?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer(); ?>