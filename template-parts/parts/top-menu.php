<header class="header">
	<nav class="navigation">
		<div class="top-menu">
			<a class="logo" href="<?php bloginfo('url'); ?>" <?php if ( is_home() ) { echo 'aria-current="page" '; } ?>><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="40px" height="40px" alt="Wiryawan Adipa Logo"><span class="logo-name"><?php bloginfo( 'name' ); ?></span></a>
			<div id="menu-icon" onclick="mobileMenu()">
				<div class="hamburger">
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
				</div>
			</div>
			<div id="main-menu" class="standby">
				<ul>
					<li><a <?php if(is_category( 'blog' )) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_category_link(get_cat_ID( 'Blog' ))); ?>">blog</a></li>
					<li><a <?php if (is_page( 'about' )) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_page_link(get_page_id_by_title( 'About' ))); ?>">about</a></li>
					<li><a <?php if(is_page( 'contact' )) { echo 'aria-current="page" '; } ?>href="<?php echo esc_url(get_page_link(get_page_id_by_title( 'Contact' ))); ?>">contact</a></li>
				</ul>
			</div>
			<script>
				const menuIconElement = document.getElementById("menu-icon");
				const mainMenuElement = document.getElementById("main-menu");
				menuIconElement.addEventListener("click", (e) => {
					if (mainMenuElement.classList == 'standby' || mainMenuElement.classList == 'hidden') {
						mainMenuElement.classList = "show";
					} else {
						mainMenuElement.classList = 'hidden';
					}
				});
			</script>
		</div>
	</nav>
</header>
