<?php get_template_part('template-parts/header'); ?>
		<div class="homepage">
			<div class="hero">
				<div class="hero-photo">
					<svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" version="1.1" viewBox="0 0 24 24"><path d="M24 12a12 12 0 0 1-12 12A12 12 0 0 1 0 12 12 12 0 0 1 12 0a12 12 0 0 1 12 12Z" fill="#eb3b5a"/><path d="m12.727 8.455-1.171 6.562q-.04.195-.177.337-.136.142-.33.18-.2.035-.382-.043-.176-.079-.278-.246l-2.325-3.818-2.328 3.818q-.084.142-.23.22-.142.078-.308.078-.23 0-.405-.146-.176-.146-.215-.381L3.397 8.453h1.289l.84 4.624 2.001-3.193q.083-.141.225-.22.146-.077.312-.077t.308.078q.142.078.235.22l1.992 3.194.84-4.624zm7.595 7.002h-1.27v-1.719H14.59v1.72h-1.27v-3.502q0-.767.264-1.41.264-.646.732-1.11.47-.464 1.109-.722.64-.26 1.396-.26h2.862q.132 0 .249.05.117.048.205.136.087.09.137.207.048.117.048.25zm-5.732-2.989h4.463V9.724H16.82q-.058 0-.249.02-.185.015-.435.083-.243.068-.517.21-.273.141-.503.39-.23.25-.38.625-.147.372-.147.904z" fill="#f0f0f0"/></svg>
				</div>
				<h1>WIRYAWAN ADIPA</h1>
				<div class="hero-heading-text">Front-End Web &bull; UI/UX &bull; WordPress</div>
				<div class="hero-social">
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
					<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Dribbble" aria-label="Wiryawan Adipa GitHub" href="https://dribbble.com/wiryawanadipa" target="_blank">
						<i class="fa-brands fa-dribbble"></i>
					</a>
				</div>
				<div class="hero-heading-link">
					<a href="<?php echo esc_url(get_category_link(get_cat_ID('Blog'))); ?>" title="Blog page" aria-label="Blog page"><i class="fa-solid fa-newspaper"></i>Blog</a>
					<a href="<?php echo esc_url(get_category_link(get_cat_ID('Design Gallery'))); ?>" title="Design Gallery page" aria-label="Design Gallery page"><i class="fa-solid fa-palette"></i>Design Gallery</a>
					<a href="<?php echo esc_url(get_category_link(get_cat_ID('Project') ) ); ?>" title="Project" aria-label="Project label"><i class="fa-solid fa-briefcase"></i>Project</a>
					<a href="<?php echo esc_url(get_page_link(get_page_by_title('About')->ID)); ?>" title="About page" aria-label="About page"><i class="fa-solid fa-user"></i>About</a>
					<a href="<?php echo esc_url(get_page_link(get_page_by_title('Contact')->ID)); ?>" title="Contact page" aria-label="Contact page"><i class="fa-solid fa-envelope"></i>Contact</a>
				</div>
				<div class="search-box" itemscope itemtype="https://schema.org/WebSite">
					<meta itemprop="url" content="<?php bloginfo('url'); ?>"/>
					<form action="<?php bloginfo('url'); ?>" role="search" method="get" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
						<meta itemprop="target" content="<?php bloginfo('url'); ?>/?s={s}"/>
						<input type="search" autocomplete="off" placeholder="Search" title="Search" aria-label="Search" itemprop="query-input" name="s" required>
						<button type="submit" aria-label="Search Button"><i class="fa-solid fa-magnifying-glass"></i></button>
					</form>
				</div>
				<div class="hero-footer">
					<div><i class="fa-solid fa-copyright"></i> <?php echo date('Y'); ?> - <?php echo $_SERVER['HTTP_HOST']; ?></div>
					<div><i class="fa-solid fa-scale-balanced"></i> <a href="<?php echo esc_url(get_page_link(get_page_by_title('Privacy Policy')->ID)); ?>" title="Privacy Policy" aria-label="Privacy Policy">Privacy Policy</a></div>
					<div><i class="fa-brands fa-github-alt"></i> <a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Wordpress Theme GitHub Repository" aria-label="Wiryawan Adipa Wordpress Theme GitHub Repository" href="https://github.com/wiryawanadipa/adipa" target="_blank">Wiryawan Adipa <?php echo wp_get_theme()->get('Version') ?></a></div>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>