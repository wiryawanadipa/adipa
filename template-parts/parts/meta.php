<?php // Home ?>
<?php if (is_home()) { ?>
	<title>Home - <?php echo get_bloginfo('name'); ?></title>
	<meta name="description" content="<?php echo get_bloginfo('description'); ?>" />
	<link rel="canonical" href="<?php echo get_bloginfo('url'); ?>" />
	<meta property="og:title" content="Home - <?php echo get_bloginfo('name'); ?>" />
	<meta property="og:description" content="<?php echo get_bloginfo('description'); ?>">
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo get_bloginfo('url'); ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
	<meta property="og:image" content="<?php bloginfo('stylesheet_directory'); ?>/screenshot.png" />
	<meta name="twitter:card" content="summary_large_image">
	<meta property="twitter:domain" content="<?php echo $_SERVER['HTTP_HOST']; ?>">
	<meta property="twitter:url" content="<?php echo get_bloginfo('url'); ?>">
	<meta name="twitter:title" content="Home - <?php echo get_bloginfo('name'); ?>">
	<meta name="twitter:description" content="<?php echo get_bloginfo('description'); ?>">
	<meta name="twitter:image" content="<?php bloginfo('stylesheet_directory'); ?>/screenshot.png">
	<meta name="twitter:site" content="@wiryawanadipa" />
<?php } ?>
<?php // Single Post and Page ?>
<?php if (is_single() || is_page()) { ?>
	<title><?php echo get_the_title(); ?> - <?php echo get_bloginfo('name'); ?></title>
	<meta name="description" content="<?php echo wp_trim_words(get_the_content(), 25, ''); ?>" />
	<meta name="author" content="Wiryawan Adipa">
	<meta property="og:title" content="<?php echo get_the_title(); ?>" />
	<meta property="og:description" content="<?php echo wp_trim_words(get_the_content(), 25, ''); ?>">
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php echo wp_get_canonical_url(); ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
	<meta property="article:author" content="Wiryawan Adipa" />
	<meta property="article:published_time" content="<?php echo get_the_date('c'); ?>" />
	<meta property="article:modified_time" content="<?php echo get_the_modified_date('c'); ?>" />
	<?php if (is_single()) { ?>
		<meta property="og:image" content="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID))[0]; ?>" />
	<?php } elseif (is_page()) { ?>
		<meta property="og:image" content="<?php bloginfo('stylesheet_directory'); ?>/screenshot.png" />
	<?php } ?>
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:creator" content="@wiryawanadipa" />
	<meta name="twitter:site" content="@wiryawanadipa" />
	<meta property="twitter:domain" content="<?php echo $_SERVER['HTTP_HOST']; ?>">
	<meta property="twitter:url" content="<?php echo wp_get_canonical_url(); ?>">
	<meta name="twitter:title" content="<?php echo get_the_title(); ?>">
	<meta name="twitter:description" content="<?php echo wp_trim_words(get_the_content(), 25, ''); ?>">
	<?php if (is_single()) { ?>
		<meta name="twitter:image" content="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID))[0]; ?>">
	<?php } elseif (is_page()) { ?>
		<meta name="twitter:image" content="<?php bloginfo('stylesheet_directory'); ?>/screenshot.png">
	<?php } ?>
<?php } ?>
<?php // Category ?>
<?php if (is_category()) { ?>
	<?php global $wp; $current_url = home_url( add_query_arg( array(), $wp->request ) ); ?>
	<?php if (is_paged()) { ?>
		<title><?php echo single_cat_title('', false); ?> - Page <?php echo $paged; ?> - <?php echo get_bloginfo('name'); ?></title>
		<meta name="description" content="<?php echo wp_trim_words(category_description()); ?> - Page <?php echo $paged; ?>" />
	<?php } else { ?>
		<title><?php echo single_cat_title('', false); ?> - <?php echo get_bloginfo('name'); ?></title>
		<meta name="description" content="<?php echo wp_trim_words(category_description()); ?>" />
	<?php } ?>
	<link rel="canonical" href="<?php echo $current_url; ?>/" />
	<meta property="og:title" content="<?php echo single_cat_title('', false); ?> - <?php echo get_bloginfo('name'); ?>" />
	<meta property="og:description" content="<?php echo wp_trim_words(category_description()); ?>">
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo $current_url; ?>/" />
	<meta property="og:image" content="<?php bloginfo('stylesheet_directory'); ?>/screenshot.png" />
	<meta name="twitter:card" content="summary_large_image">
	<meta property="twitter:domain" content="<?php echo $_SERVER['HTTP_HOST']; ?>">
	<meta property="twitter:url" content="<?php echo $current_url; ?>/">
	<meta name="twitter:title" content="<?php echo single_cat_title('', false); ?> - <?php echo get_bloginfo('name'); ?>">
	<meta name="twitter:description" content="<?php echo wp_trim_words(category_description()); ?>">
	<meta name="twitter:image" content="<?php bloginfo('stylesheet_directory'); ?>/screenshot.png">
<?php } ?>
<?php // Tag ?>
<?php if (is_tag()) { ?>
	<?php global $wp; $current_url = home_url( add_query_arg( array(), $wp->request ) ); ?>
	<?php if (is_paged()) { ?>
		<title>#<?php echo single_tag_title('', false); ?> - <?php echo get_bloginfo('name'); ?> - Page <?php echo $paged; ?></title>
		<meta name="description" content="<?php echo wp_trim_words(tag_description()); ?> - Page <?php echo $paged; ?>" />
	<?php } else { ?>
		<title>#<?php echo single_tag_title('', false); ?> - <?php echo get_bloginfo('name'); ?></title>
		<meta name="description" content="<?php echo wp_trim_words(tag_description()); ?>" />
	<?php } ?>
	<link rel="canonical" href="<?php echo $current_url; ?>/" />
	<meta property="og:title" content="#<?php echo single_tag_title('', false); ?> - <?php echo get_bloginfo('name'); ?>" />
	<meta property="og:description" content="<?php echo wp_trim_words(tag_description()); ?>">
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo $current_url; ?>/" />
	<meta property="og:image" content="<?php bloginfo('stylesheet_directory'); ?>/screenshot.png" />
	<meta name="twitter:card" content="summary_large_image">
	<meta property="twitter:domain" content="<?php echo $_SERVER['HTTP_HOST']; ?>">
	<meta property="twitter:url" content="<?php echo $current_url; ?>/">
	<meta name="twitter:title" content="<?php echo single_tag_title('', false); ?> - <?php echo get_bloginfo('name'); ?>">
	<meta name="twitter:description" content="<?php echo wp_trim_words(category_description()); ?>">
	<meta name="twitter:image" content="<?php bloginfo('stylesheet_directory'); ?>/screenshot.png">
<?php } ?>
<?php // Search ?>
<?php if (is_search()) { ?>
	<title>Search Result for <?php ucwords(the_search_query()); ?> - <?php echo get_bloginfo('name'); ?></title>
	<meta name="description" content="Search result for <?php ucwords(the_search_query()); ?> on <?php echo get_bloginfo('name'); ?>" />
<?php } ?>
<?php // 404 ?>
<?php if (is_404()) { ?>
	<title>Error 404 Page not Found - <?php echo get_bloginfo('name'); ?></title>
<?php }
