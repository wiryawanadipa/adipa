<header class="header">
	<nav class="navigation">
		<div class="top-menu">
			<a class="logo" href="<?php bloginfo('url'); ?>"<?php if (is_home()) { echo ' aria-current="page"'; } ?>><span class="logo-name"><span class="name-part">W</span>iryawan <span class="name-part">A</span>dipa</span></a>
			<div id="menu-icon">
				<div class="hamburger">
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
				</div>
			</div>
			<div id="main-menu" class="standby">
				<ul>
					<li><a <?php if (is_category('blog')) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_category_link(get_cat_ID('Blog'))); ?>">blog</a></li>
					<li><a <?php if (is_page('about')) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_page_link(get_page_by_title('About')->ID)); ?>">about</a></li>
					<li><a <?php if (is_page('contact')) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_page_link(get_page_by_title('Contact')->ID)); ?>">contact</a></li>
				</ul>
			</div>
			<script>
				const menuIconElement = document.getElementById("menu-icon");
				const mainMenuElement = document.getElementById("main-menu");
				function closeMenu() {
					mainMenuElement.classList = "hidden";
					setTimeout(e => {
						mainMenuElement.classList = "standby";
					}, 150);
				}
				document.addEventListener("click", function(event) {
					const isMenuShow = mainMenuElement.classList.contains("show");
					const isClickIcon = menuIconElement.contains(event.target);
					const isClickMenu = mainMenuElement.contains(event.target);
					if (!isMenuShow && isClickIcon || isClickMenu) {
						mainMenuElement.classList = "show";
					} else if (isMenuShow && isClickIcon && !isClickMenu) {
						closeMenu();
					} else if (isMenuShow && !isClickIcon && !isClickMenu) {
						closeMenu();
					}
				});
			</script>
		</div>
	</nav>
</header>
