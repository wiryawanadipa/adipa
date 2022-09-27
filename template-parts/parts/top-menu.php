<header class="header">
	<nav class="navigation">
		<div class="top-menu">
			<a class="logo" href="<?php bloginfo('url'); ?>" <?php if ( is_home() ) { echo 'aria-current="page" '; } ?>><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAANlBMVEWUV2LnlKL0nazrO1rrO1rrO1rrO1rrO1rrO1r//v/99PX86ev52dz2wcbynKXueIbsWm/rO1pkAjK0AAAACXRSTlMAEB5Jf5nEye5gj1JpAAABRklEQVR42pWV3ZrCIAxEUfvDkAQ47/+ye0Ht6qeu7FzR9kAICdOUnnRbth3I+7bc0kddl8yD8nJ9i11WXrReXrlb5o3yywZWPmh9DrvxUdsj+Af3RK78qTP6jS86Mrrkb2C+zAQ+g1+Z0DWltMyAS0opz4D5SLnVsADwAFwONC8q0c/EF4CQ5EBVGU+VkEWMtyP2KEo3FcClClWqVerg0lmefQyq1OiSAqrUXTbWPsA9HYMmBVUmg5DTzJ9A7iAmx0qVOqY6JldXeQFDpSu6FE0GtCiSZCd4P8YquRoud1WoRV6bnWC+JwNjekjFgSKHJjn9SObsWZcCmqR25IZL3saGt99Sh9SBogAokheZJOvjwM+ubSUAYnxoJnlrJu/33p1tivk2m27c6aswf7mmr+u8AcxbyrxJTdveP4x03prnzf7L7+MHRcVMimhg4jMAAAAASUVORK5CYII=" width="40px" height="40px" alt="Wiryawan Adipa Small Logo"><span class="logo-name"><?php bloginfo( 'name' ); ?></span></a>
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
