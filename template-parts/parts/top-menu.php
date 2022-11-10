<header>
	<nav class="navigation">
		<div class="top-menu">
			<a class="logo" href="<?php bloginfo('url'); ?>"<?php if (is_home()) { echo ' aria-current="page"'; } ?> title="Wiryawan Adipa Homepage" aria-label="Wiryawan Adipa Homepage"><span class="name-part">W</span>IRYAWAN <span class="name-part">A</span>DIPA</a>
			<div id="menu-icon" title="Main Menu" aria-haspopup="true" aria-controls="main-menu">
				<div class="hamburger">
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
				</div>
			</div>
			<div id="main-menu" aria-labelledby="menu-icon">
				<ul>
					<li><a <?php if (is_category('blog')) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_category_link(get_cat_ID('Blog'))); ?>" title="Blog page" aria-label="Blog page">Blog</a></li>
					<li><a <?php if (is_page('about')) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_page_link(get_page_by_title('About')->ID)); ?>" title="About page" aria-label="About page">About</a></li>
					<li><a <?php if (is_page('contact')) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_page_link(get_page_by_title('Contact')->ID)); ?>" title="Contact page" aria-label="Contact page">Contact</a></li>
				</ul>
			</div>
			<script>
				const menuIcon = document.getElementById("menu-icon");
				const menuBox = document.getElementById("main-menu");
				document.addEventListener("click", function(event) {
					const hasMenuShow = menuBox.classList.contains("show");
					const isClickIcon = menuIcon.contains(event.target);
					const isClickMenu = menuBox.contains(event.target);
					if (!hasMenuShow && isClickIcon || isClickMenu) {
						menuBox.classList = "show";
					} else if (hasMenuShow && !isClickMenu) {
						menuBox.classList = "hidden";
					}
				});
			</script>
		</div>
	</nav>
</header>
