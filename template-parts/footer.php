		<footer>
			<div class="footer-box">
				<div class="footer-left">
					<div>
						<i class="fa-solid fa-copyright"></i> <?php echo date('Y'); ?> - <?php echo $_SERVER['HTTP_HOST']; ?>
					</div>
					<div>
						<i class="fa-solid fa-scale-balanced"></i> <a href="<?php echo esc_url(get_page_link(get_page_by_title('Privacy Policy')->ID)); ?>" title="Privacy Policy" aria-label="Privacy Policy">Privacy Policy</a>
					</div>
					<div>
						<i class="fa-brands fa-github-alt"></i> <a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Wordpress Theme GitHub Repository" aria-label="Wiryawan Adipa Wordpress Theme GitHub Repository" href="https://github.com/wiryawanadipa/adipa" target="_blank">Wiryawan Adipa <?php echo wp_get_theme()->get('Version') ?></a>
					</div>
				</div>
				<div class="social-page">
					<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Twitter" aria-label="Wiryawan Adipa Twitter" href="https://twitter.com/wiryawanadipa" target="_blank">
						<i class="fa-brands fa-twitter"></i>
					</a>
					<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Instagram" aria-label="Wiryawan Adipa Instagram" href="https://www.instagram.com/wiryawanadipa" target="_blank">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa LinkedIn" aria-label="Wiryawan Adipa LinkedIn" href="https://www.linkedin.com/in/wiryawanadipa" target="_blank">
						<i class="fa-brands fa-linkedin-in"></i>
					</a>
					<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa GitHub" aria-label="Wiryawan Adipa GitHub" href="https://github.com/wiryawanadipa" target="_blank">
						<i class="fa-brands fa-github-alt"></i>
					</a>
					<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Dribbble" aria-label="Wiryawan Adipa Dribbble" href="https://dribbble.com/wiryawanadipa" target="_blank">
						<i class="fa-brands fa-dribbble"></i>
					</a>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>