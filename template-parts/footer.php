        <?php get_template_part( 'template-parts/parts/quote' ); ?>
        <div class="wa-footer">
            <div class="container-xl py-5 wa-footer">
                <div class="row">
                    <div class="col-12 col-md-6 fs-1 mb-3 mb-md-0 text-center text-md-start">Thanks for visiting!</div>
                    <div class="col-12 col-md-6 fs-5 d-flex mb-4 mb-md-0 align-content-center justify-content-center justify-content-md-end flex-wrap social"><?php get_template_part( 'template-parts/parts/social' ); ?></div>
                    <div class="col-12 col-md-6 mb-1 small-text text-center text-md-start"><i class="fa-solid fa-copyright"></i> <?php echo date( 'Y' ); ?>, <?php echo $_SERVER['HTTP_HOST']; ?></div>
                    <div class="col-12 col-md-6"></div>
                    <div class="col-12 col-md-6 mb-1 small-text text-muted pt-2 pt-md-0 text-center text-md-start"><i class="fa-solid fa-building-shield"></i><a class="small-text text-muted privacy-policy" href="<?php echo esc_url( get_page_link( get_page_id_by_title( 'Privacy Policy' ) ) ); ?>"> Privacy Policy</a></div>
                    <div class="col-12 col-md-6"></div>
                    <div class="col-12 col-md-6 mb-1 small-text text-muted pt-2 pt-md-0 text-center text-md-start"><i class="fa-brands fa-html5"></i> <a rel="nofollow" class="small-text text-muted theme-version" title="Wiryawan Adipa Wordpress Theme GitHub Repository" href="https://github.com/wiryawanadipa/adipa" target="_blank">Theme by Wiryawan Adipa v<?php $theme_version = wp_get_theme(); echo $theme_version->Version; ?></a></div>
                </div>
            </div>
        </div>
        <!-- wp_footer -->
        <?php wp_footer(); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <?php
		$footercode = trim( get_option( 'footer_code' ) );
		if ( null != get_option( 'footer_code' ) && !empty ( $footercode ) ) {
            echo '<!-- Extra Code -->' . "\n";
			echo get_option( 'footer_code' ) . "\n";
		}
        ?>
    </body>
</html>