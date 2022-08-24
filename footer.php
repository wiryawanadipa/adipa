        <div class="wa-footer">
            <div class="container-xl py-5 wa-footer">
                <div class="row">
                    <div class="col-12 col-md-6 fs-1 mb-3 mb-md-0 text-center text-md-start">Thanks for visiting!</div>
                    <div class="col-12 col-md-6 fs-5 d-flex mb-5 mb-md-0 align-content-center justify-content-center justify-content-md-end flex-wrap social">
                        <a rel="nofollow" class="mx-sm-1 p-1" href="https://twitter.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-twitter fa-2x"></i></a>
                        <a rel="nofollow" class="mx-sm-1 p-1" href="https://www.youtube.com/channel/UCpP1g9Vcl33ucu5mO2vr-5Q" target="_blank"><i class="fa-brands fa-youtube fa-2x"></i></a>
                        <a rel="nofollow" class="mx-sm-1 p-1" href="https://github.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-github fa-2x"></i></a>
                        <a rel="nofollow" class="mx-sm-1 p-1" href="https://www.linkedin.com/in/wiryawanadipa/" target="_blank"><i class="fa-brands fa-linkedin fa-2x"></i></a>
                        <a rel="nofollow" class="mx-sm-1 p-1" href="https://medium.com/@wiryawanadipa" target="_blank"><i class="fa-brands fa-medium fa-2x"></i></a>
                    </div>
                    <div class="col-12 col-md-6 mb-1 small-text text-center text-md-start"><i class="fa-solid fa-copyright"></i> 2017-<?php echo date( 'Y' ); ?>, <?php bloginfo( 'name' ); ?></div>
                    <div class="col-12 col-md-6"></div>
                    <div class="col-12 col-md-6 small-text text-muted text-center text-md-start"><i class="fa-brands fa-html5"></i> <a class="small-text text-muted theme-version" rel="nofollow" href="https://github.com/wiryawanadipa/adipa" target="_blank">Theme by Wiryawan Adipa v<?php $theme_version = wp_get_theme(); echo $theme_version->Version; ?></a></div>
                </div>
            </div>
        </div>
        <?php wp_footer(); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://instant.page/5.1.1" type="module" integrity="sha384-MWfCL6g1OTGsbSwfuMHc8+8J2u71/LA8dzlIN3ycajckxuZZmF+DNjdm7O6H3PSq"></script>
        <?php
		$footercode = trim( get_option( 'footer_code' ) );
		if ( null != get_option( 'footer_code' ) && !empty ( $footercode ) ) {
			echo get_option( 'footer_code' ) . "\n";
		}
        ?>
    </body>
</html>