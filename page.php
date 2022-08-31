<?php get_template_part( 'template-parts/header' ); ?>
<main class="container-xl my-3 my-sm-5 main-page">
	<div class="row wa-post">
        <article class="col-xl-12">
            <!-- Post Title -->
            <div class="container px-0 mb-4">
                <div class="col-12 d-flex rounded-3 text-white text-center align-items-center post-title" style="background: #212b31; min-height: 300px;">
                    <header class="w-100 my-auto py-3 post-title-header">
                        <h1><?php the_title(); ?></h1>
                    </header>
                </div>
            </div>
            <!-- Post Article -->
            <div class="container px-0 px-md-3 wa-post-article">
                <div class="wa-post-article-box">
                    <?php
                    if ( is_page('Contact') ) {
                        get_template_part( 'template-parts/pages/contact' );
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