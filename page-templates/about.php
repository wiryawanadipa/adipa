<?php /* Template Name: About Page */ ?>
<?php get_template_part( 'template-parts/header' ); ?>
<main class="container-xl my-3 my-sm-5 main-page">
	<div class="row wa-post">
        <article class="col-xl-12">
            <!-- Post Title -->
            <div class="container px-0 mb-4">
                <div class="col-12 d-flex rounded-3 text-white text-center align-items-center post-title">
                    <header class="w-100 my-auto py-3 post-title-header">
                        <h1 class="title-decoration"><?php echo strtolower(get_the_title()); ?></h1>
                    </header>
                </div>
            </div>
            <!-- Post Article -->
            <div class="container px-0 px-md-3 wa-post-article">
                <div class="wa-post-article-box">
                    <?php
                        if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post();
                                the_content();
                            }
                        }
                    ?>
                    <div class="fs-3 text-center about social">
                        <a title="<?php get_bloginfo( 'name' ); ?> Mail" class="mx-sm-1 p-1" href="<?php echo esc_url( get_page_link( get_page_id_by_title( 'Contact' ) ) ); ?>"><i class="fa-solid fa-envelope fa-2x"></i></a>
                        <?php get_template_part( 'template-parts/parts/social' ); ?>
                    </div>
                </div>
            </div>
        </article>
	</div>
</main>
<?php get_template_part( 'template-parts/footer' ); ?>