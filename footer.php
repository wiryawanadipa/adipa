        <div class="wa-footer">
            <div class="container-xl py-5 wa-footer">
                <div class="row">
                    <div class="col-lg-6 fs-2">Thanks for visiting!</div>
                    <div class="col-lg-6 d-flex align-content-center justify-content-end flex-wrap social fs-5">
                        <a class="mx-3 p-1" href="https://twitter.com/wrywndp">Twitter</a>
                        <a class="mx-3 p-1" href="https://github.com/wrywndp">Github</a>
                        <a class="mx-3 p-1" href="https://www.linkedin.com/in/wiryawanadipa/">LinkedIn</a>
                        <a class="mx-3 p-1" href="https://medium.com/@wiryawanadipa">Medium</a>
                    </div>
                    <div class="col-lg-6 small-text">&#169; <?php bloginfo( 'name' ); ?>, 2017-<?php echo date("Y"); ?></div>
                    <div class="col-lg-6"></div>
                    <?php $theme_version = wp_get_theme(); ?>
                    <div class="col-lg-6 small-text text-muted">Theme by Wiryawan Adipa v<?php echo $theme_version->Version; ?></div>
                </div>
            </div>
        </div>
        <?php wp_footer(); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://instant.page/5.1.1" type="module" integrity="sha384-MWfCL6g1OTGsbSwfuMHc8+8J2u71/LA8dzlIN3ycajckxuZZmF+DNjdm7O6H3PSq"></script>
    </body>
</html>