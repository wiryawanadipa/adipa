		<div class="footer">
			<div class="footer-box">
				<div class="footer-left">
					<div class="copyright"><i class="fa-solid fa-copyright"></i> <?php echo date( 'Y' ); ?>, <?php echo $_SERVER['HTTP_HOST']; ?></div>
					<div class="privacy-policy"><i class="fa-solid fa-building-shield"></i><a class="small-text text-muted privacy-policy" href="<?php echo esc_url( get_page_link( get_page_id_by_title( 'Privacy Policy' ) ) ); ?>"> Privacy Policy</a></div>
					<div class="theme"><i class="fa-brands fa-html5"></i> <a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Wordpress Theme GitHub Repository" href="https://github.com/wiryawanadipa/adipa" target="_blank">Theme by Wiryawan Adipa v<?php echo wp_get_theme()->get( 'Version' ); ?></a></div>
				</div>
				<div class="footer-right">
					<div class="social-link">
						<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Twitter" href="https://twitter.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-twitter fa-2x"></i></a>
						<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Instagram" href="https://www.instagram.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-instagram fa-2x"></i></a>
						<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa LinkedIn" href="https://www.linkedin.com/in/wiryawanadipa" target="_blank"><i class="fa-brands fa-linkedin fa-2x"></i></a>
						<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa GitHub" href="https://github.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-github fa-2x"></i></a>
					</div>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>