<div class="hero">
	<div class="herobox">
		<div class="hero-photo">
			<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="192px" height="192px" alt="wa logo big">
		</div>
		<div class="hero-heading-name">
			<h1>Hi! I'm <span class="hero-name"><?php echo get_bloginfo('name'); ?></span>.</h1>
		</div>
		<div class="hero-heading-text">Wordpress Developer - UI & UX Designer - Web Designer</div>
		<div class="hero-heading-link">
			<a href="<?php echo esc_url( get_category_link( get_cat_ID( 'Design Gallery' ) ) ); ?>" title="Design Gallery">design-gallery</a>
			<a href="<?php echo esc_url( get_category_link( get_cat_ID( 'Project' ) ) ); ?>" title="Project">project</a>
		</div>
		<div class="search-box" itemscope itemtype="https://schema.org/WebSite">
		<meta itemprop="url" content="<?php bloginfo('url'); ?>"/>
			<form action="<?php bloginfo('url'); ?>" role="search" method="get" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
				<meta itemprop="target" content="<?php bloginfo('url'); ?>/?s={s}"/>
				<input type="search" autocomplete="off" placeholder="Search here..." title="Search" aria-label="Search" itemprop="query-input" type="text" name="s" required>
				<button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
			</form>
		</div>
	</div>
</div>
