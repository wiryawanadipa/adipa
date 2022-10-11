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
						setTimeout(e => {
							menuBox.classList = "standby";
						}, 150);
					}
				});
			</script>
		</div>
	</nav>
</header>
