<?php get_template_part('template-parts/header'); ?>
		<div class="homepage">
			<div class="hero">
				<div class="hero-photo">
					<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="192" height="192" version="1.1" viewBox="0 0 50.8 50.8"><g stroke-width=".265"><path d="M50.8 25.4a25.4 25.4 0 0 1-25.4 25.4A25.4 25.4 0 0 1 0 25.4 25.4 25.4 0 0 1 25.4 0a25.4 25.4 0 0 1 25.4 25.4Z" fill="#36454F"/><path d="M8.649 33.401a77.15 77.15 0 0 1-.457-1.98l-.686-2.795-.762-3.2-2.057-4.905 5.055-3.855 3.606 17.475H8.827zm3.988-8 1.905-4.999 5.207-3.74 4.165 17.476H19.57l-.203-.838-.533-2.21-.762-3.225a250.435 250.435 0 0 1-.915-3.836h-.153l-.861 3.836-.28 1.295c-.085.355-.17.694-.254 1.016a40.535 40.535 0 0 1-.203.915l-.508 2.213-.205.837h-.28zm10.26-.153 1.525-5.38 5.055-3.205-2.082 8.762-.763 3.2a98.959 98.959 0 0 0-.66 2.795l-.483 1.98-.178.738h-.305zm11.43-8.585h.433l2.007 6.96-2.921 10.515h-5.08zm5.716 14.376H35.8l1.067-3.912H38.9l-2.997-7.97 4.648-2.494 5.562 17.475h-5.181z" fill="#fff"/></g></svg>
				</div>
				<div class="hero-main-content">
					<h1>WIRYAWAN ADIPA</h1>
					<div class="hero-heading-text">Front-End Web Dev &bull; UX Designer &bull; WordPress Dev</div>
					<div class="hero-heading-link">
						<a href="<?php echo esc_url(get_category_link(get_cat_ID('Blog'))); ?>" title="Blog page" aria-label="Blog page">Blog</a>
						<a href="<?php echo esc_url(get_category_link(get_cat_ID('Design Gallery'))); ?>" title="Design Gallery page" aria-label="Design Gallery page">Design Gallery</a>
						<a href="<?php echo esc_url(get_category_link(get_cat_ID('Project') ) ); ?>" title="Project" aria-label="Project label">Project</a>
						<a href="<?php echo esc_url(get_page_link(get_page_by_title('About')->ID)); ?>" title="About page" aria-label="About page">About</a>
						<a href="<?php echo esc_url(get_page_link(get_page_by_title('Contact')->ID)); ?>" title="Contact page" aria-label="Contact page">Contact</a>
					</div>
				</div>
				<div class="hero-social">
					<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Twitter" aria-label="Wiryawan Adipa Twitter" href="https://twitter.com/wiryawanadipa" target="_blank">
						<i class="fa-brands fa-square-twitter"></i>
					</a>
					<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Instagram" aria-label="Wiryawan Adipa Instagram" href="https://www.instagram.com/wiryawanadipa" target="_blank">
						<i class="fa-brands fa-square-instagram"></i>
					</a>
					<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa LinkedIn" aria-label="Wiryawan Adipa LinkedIn" href="https://www.linkedin.com/in/wiryawanadipa" target="_blank">
						<i class="fa-brands fa-linkedin"></i>
					</a>
					<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa GitHub" aria-label="Wiryawan Adipa GitHub" href="https://github.com/wiryawanadipa" target="_blank">
						<i class="fa-brands fa-square-github"></i>
					</a>
					<a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Dribbble" aria-label="Wiryawan Adipa GitHub" href="https://dribbble.com/wiryawanadipa" target="_blank">
						<i class="fa-brands fa-square-dribbble"></i>
					</a>
				</div>
				<div class="search-box" itemscope itemtype="https://schema.org/WebSite">
					<meta itemprop="url" content="<?php bloginfo('url'); ?>"/>
					<form action="<?php bloginfo('url'); ?>" role="search" method="get" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
						<meta itemprop="target" content="<?php bloginfo('url'); ?>/?s={s}"/>
						<input type="search" autocomplete="off" placeholder="Search here..." title="Search" aria-label="Search" itemprop="query-input" name="s" required>
						<button type="submit" aria-label="Search Button"><svg xmlns="http://www.w3.org/2000/svg" height='20px' width='20px' viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg></button>
					</form>
				</div>
				<div class="hero-footer">
					<div><i class="fa-solid fa-copyright"></i> <?php echo date('Y'); ?>, <?php echo $_SERVER['HTTP_HOST']; ?></div>
					<div><i class="fa-solid fa-scale-balanced"></i> <a href="<?php echo esc_url(get_page_link(get_page_by_title('Privacy Policy')->ID)); ?>" title="Privacy Policy" aria-label="Privacy Policy">Privacy Policy</a></div>
					<div><i class="fa-brands fa-square-github"></i> <a rel="nofollow noopener noreferrer" title="Wiryawan Adipa Wordpress Theme GitHub Repository" aria-label="Wiryawan Adipa Wordpress Theme GitHub Repository" href="https://github.com/wiryawanadipa/adipa" target="_blank">Theme by Wiryawan Adipa</a></div>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>