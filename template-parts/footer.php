		<?php get_template_part( 'template-parts/parts/quote' ); ?>
		<div class="wa-footer py-4">
			<div class="container-xl py-5 wa-footer">
				<div class="row">
					<div class="col-md-6 fs-1 mb-3 mb-md-0 text-center text-md-start">Thanks for visiting!</div>
					<div class="col-md-6 fs-5 d-flex mb-4 mb-md-0 align-content-center justify-content-center justify-content-md-end flex-wrap social">
						<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Twitter" class="mx-sm-1 p-1" href="https://twitter.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-twitter fa-2x"></i></a>
						<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Instagram" class="mx-sm-1 p-1" href="https://www.instagram.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-instagram fa-2x"></i></a>
						<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa LinkedIn" class="mx-sm-1 p-1" href="https://www.linkedin.com/in/wiryawanadipa" target="_blank"><i class="fa-brands fa-linkedin fa-2x"></i></a>
						<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa GitHub" class="mx-sm-1 p-1" href="https://github.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-github fa-2x"></i></a>
						<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Youtube Channel" class="mx-sm-1 p-1" href="https://www.youtube.com/channel/UCpP1g9Vcl33ucu5mO2vr-5Q" target="_blank"><i class="fa-brands fa-youtube fa-2x"></i></a>
						<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Medium" class="mx-sm-1 p-1" href="https://medium.com/@wiryawanadipa" target="_blank"><i class="fa-brands fa-medium fa-2x"></i></a>
					</div>
					<div class="col-md-6 mb-1 small-text text-center text-md-start"><i class="fa-solid fa-copyright"></i> <?php echo date( 'Y' ); ?>, <?php echo $_SERVER['HTTP_HOST']; ?></div>
					<div class="col-md-6"></div>
					<div class="col-md-6 mb-1 small-text text-muted pt-2 pt-md-0 text-center text-md-start"><i class="fa-solid fa-building-shield"></i><a class="small-text text-muted privacy-policy" href="<?php echo esc_url( get_page_link( get_page_id_by_title( 'Privacy Policy' ) ) ); ?>"> Privacy Policy</a></div>
					<div class="col-md-6"></div>
					<div class="col-md-6 mb-1 small-text text-muted pt-2 pt-md-0 text-center text-md-start"><i class="fa-brands fa-html5"></i> <a rel="nofollow noopener noreferrer" class="small-text text-muted theme-version" title="Wiryawan Adipa Wordpress Theme GitHub Repository" href="https://github.com/wiryawanadipa/adipa" target="_blank">Theme by Wiryawan Adipa v<?php echo wp_get_theme()->get( 'Version' ); ?></a></div>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
		<?php
		$footercode = trim(get_option( 'footer_code' ));
		if (null != get_option( 'footer_code' ) && !empty( $footercode )) {
			echo get_option( 'footer_code' );
		}
		?>
	</body>
</html>