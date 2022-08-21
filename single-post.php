<?php get_header(); ?>
<main class="container-xl my-4 main-page">
	<div class="row wa-post">
        <article class="col-xl-12">
            <div class="container mb-4">
                <?php $img_link = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full'); ?>
                <?php $the_cat = get_the_category(); ?>
                <?php $category_name = $the_cat[0]->cat_name; ?>
                <div class="col-12 d-flex rounded-3 text-white text-center align-items-center" style="background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(<?php echo $img_link[0]; ?>) no-repeat center / cover; height: 360px;">
                    <header class="w-100 my-auto post-title">
                        <h1><?php the_title(); ?></h1>
                        <p><i class="fa-solid fa-user"></i><span><?php the_post(); echo get_the_author(); rewind_posts(); ?></span><i class="fa-solid fa-calendar"></i><span><time><?php echo get_the_date(); ?></time></span><i class="fa-solid fa-tag"></i><span><?php echo $category_name; ?></span></p>
                    </header>
                </div>
            </div>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="container wa-post-article">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </article>
	</div>
</main>
<?php get_footer(); ?>