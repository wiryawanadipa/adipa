<header class="header">
	<nav class="navigation">
		<div class="top-menu">
			<a class="logo" href="<?php bloginfo('url'); ?>" <?php if ( is_home() ) { echo 'aria-current="page" '; } ?>><span class="logo-name"><span class="name-part">W</span>iryawan <span class="name-part">A</span>dipa</span></a>
			<div id="menu-icon">
				<div class="hamburger">
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
				</div>
			</div>
			<div id="main-menu" class="standby">
				<ul>
					<li><a <?php if(is_category( 'blog' )) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_category_link(get_cat_ID( 'Blog' ))); ?>">blog</a></li>
					<li><a <?php if (is_page( 'about' )) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_page_link(get_page_by_title( 'About' )->ID)); ?>">about</a></li>
					<li><a <?php if(is_page( 'contact' )) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_page_link(get_page_by_title( 'Contact' )->ID)); ?>">contact</a></li>
				</ul>
			</div>
			<script>
				const menuIconElement = document.getElementById("menu-icon");
				const mainMenuElement = document.getElementById("main-menu");
				menuIconElement.addEventListener("click", e => {
					if (mainMenuElement.classList != 'show') {
						mainMenuElement.classList = 'show';
					} else {
						mainMenuElement.classList = 'hidden';
						setTimeout(e => {
							mainMenuElement.classList = 'standby';
						}, 200);
					}
				});
			</script>
		</div>
	</nav>
</header>
