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
				<button type="submit" aria-label="Search Button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg></button>
			</form>
		</div>
	</div>
</div>
