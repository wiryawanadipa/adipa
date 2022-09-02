        <?php get_template_part( 'template-parts/parts/quote' ); ?>
        <div class="wa-footer">
            <div class="container-xl py-5 wa-footer">
                <div class="row">
                    <div class="col-12 col-md-6 fs-1 mb-3 mb-md-0 text-center text-md-start">Thanks for visiting!</div>
                    <!-- Social Links -->
                    <?php get_template_part( 'template-parts/parts/social' ); ?>
                    <div class="col-12 col-md-6 mb-1 small-text text-center text-md-start"><i class="fa-solid fa-copyright"></i> <?php echo date( 'Y' ); ?>, <?php echo strtoupper($_SERVER['HTTP_HOST']); ?></div>
                    <div class="col-12 col-md-6"></div>
                    <div class="col-12 col-md-6 small-text text-muted pt-2 pt-md-0 text-center text-md-start"><i class="fa-solid fa-building-shield"></i><a class="small-text text-muted privacy-policy" href="<?php bloginfo('url'); ?>/privacy-policy/" target="_blank"> Privacy Policy</a></div>
                    <div class="col-12 col-md-6"></div>
                    <div class="col-12 col-md-6 small-text text-muted pt-2 pt-md-0 text-center text-md-start"><i class="fa-brands fa-html5"></i> <a class="small-text text-muted theme-version" href="https://github.com/wiryawanadipa/adipa" target="_blank">Theme by Wiryawan Adipa v<?php $theme_version = wp_get_theme(); echo $theme_version->Version; ?></a></div>
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