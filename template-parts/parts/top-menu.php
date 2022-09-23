<header>
	<nav class="navbar navbar-xl navbar-dark navbar-expand-md wa-navbar">
		<div class="container-lg">
			<a class="wa-brand" href="<?php bloginfo('url'); ?>"<?php if ( is_home() ) { echo ' aria-current="page"'; } ?>><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="40px" height="40px" alt="WA"><span class="wa-brand-name"><?php bloginfo( 'name' ); ?></span></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse mt-1 mt-md-0" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mt-3 mt-md-0">
					<li class="nav-item">
						<a class="nav-link fs-5 wa-top-menu<?php if(is_home()) { echo ' menu-active" aria-current="page'; } ?>" href="<?php bloginfo( 'url' ); ?>">home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fs-5 wa-top-menu<?php if(is_category( 'blog' )) { echo ' menu-active" aria-current="page'; } if(is_single() && has_category( 'blog',$post->ID )) { echo ' menu-active'; } ?>" href="<?php echo esc_url(get_category_link(get_cat_ID( 'Blog' ))); ?>">blog</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fs-5 wa-top-menu<?php if (is_page( 'about' )) { echo ' menu-active" aria-current="page'; } ?>" href="<?php echo esc_url(get_page_link(get_page_id_by_title( 'About' ))); ?>">about</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fs-5 wa-top-menu<?php if(is_page( 'contact' )) { echo ' menu-active" aria-current="page'; } ?>" href="<?php echo esc_url(get_page_link(get_page_id_by_title( 'Contact' ))); ?>">contact</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle p-2" href="#" role="button" data-bs-toggle="dropdown" title="Search Button" aria-expanded="false"><i class="fa-solid fa-magnifying-glass"></i></a>
						<ul class="dropdown-menu dropdown-menu-end wa-search" itemscope itemtype="https://schema.org/WebSite">
						<meta itemprop="url" content="<?php bloginfo('url'); ?>"/>
							<form action="<?php bloginfo('url'); ?>" role="search" method="get" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
								<meta itemprop="target" content="<?php bloginfo('url'); ?>/?s={s}"/>
								<input type="search" autocomplete="off" placeholder="Search here..." title="Search" aria-label="Search" itemprop="query-input" type="text" name="s" required>
								<button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
							</form>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
