<header class="header">
	<nav class="navigation">
		<div class="top-menu">
			<a class="logo" href="<?php bloginfo('url'); ?>" <?php if ( is_home() ) { echo 'aria-current="page" '; } ?>><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQBAMAAAB8P++eAAAAFVBMVEVhbHDtLlbrOlnuWnX////4wMrrO1rMgfNcAAAAAXRSTlMAQObYZgAAAe9JREFUSMe1l0tyhCAQhmfFSaZygETnALHJBUTX1KB9/yOkH4iOjtqpMiwU8fPvB4jt7bZuKO120hyWFo84fGlWbp9EtJGINhLRRrr3YDRyWxJ3m1FwLYlok3RHYDQKLiXdMRiNggtJK+jOwGgULJJW0J2D8W8gotG2FXQWMP4FRDTanroPE/hM4YfPXUuHGvj4rAP4dgbFRRoDBhN4PgA8GAftZCcFrGioofPIINJTPXWlNVuQkUEkBgbJ7ueoowuQzXl9oGdd6EfpkfYKzEOhgJVcV8XJOGVHjYLEROCjWriiYeezmErqPfVRFe874Kgx3ekw7IGJjQ4grlYkmyT19xJMAZGNBhCngiQ/e/6xBilvGLx4IKHzfHXhjSKFmaAhD/qkd8cAMCd8BsnKSCbJVZ3HPIVbkG7UMnNNxS5ypnwb3oNBAvF84jy2HOEWZAmYl0fIC24LohKDTk6apsjjVwbdnJ98j5ND4LfIe9RcxRewL8tbFCWgWrO/AHUtTv4T0wWY34YFOOpQnj+FQsnkC+iVEJ/k1Wqzx7oDlPzou1l1etlJIgO0mw0g7wDpdKc43VKu382u33H/4atw/ZfL/tG8/nttLxXMxYe9nDEXSPaSy1zE2ctCc6FpL13txbC9vLYX7PZfAPtPxcFvyi8BQrYEAw3olwAAAABJRU5ErkJggg==" alt="Wiryawan Adipa Small Logo"><span class="logo-name"><?php bloginfo( 'name' ); ?></span></a>
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
