<?php // Home ?>
<?php if ( is_home() ) { ?>
	<title>Home - <?php echo get_bloginfo('name'); ?></title>
	<meta name="description" content="<?php echo get_bloginfo('description'); ?>" />
	<link rel="canonical" href="<?php echo get_bloginfo('url'); ?>" />
<?php } ?>
<?php // Single Post ?>
<?php if ( is_single() || is_page() ) { ?>
	<title><?php echo get_the_title(); ?> - <?php echo get_bloginfo('name'); ?></title>
	<meta name="description" content="<?php echo wp_trim_words(get_the_content(), 20, ''); ?>" />
	<link rel="canonical" href="<?php echo wp_get_canonical_url(); ?>" />
<?php } ?>
<?php // Category ?>
<?php if ( is_category() ) { ?>
	<?php if ( is_paged() ){ ?>
		<title><?php echo single_cat_title('', false); ?> - <?php echo get_bloginfo('name'); ?> - Page <?php echo $paged; ?></title>
		<meta name="description" content="<?php echo wp_trim_words(category_description()); ?> - Page <?php echo $paged; ?>" />
	<?php } else { ?>
		<title><?php echo single_cat_title('', false); ?> - <?php echo get_bloginfo('name'); ?></title>
		<meta name="description" content="<?php echo wp_trim_words(category_description()); ?>" />
	<?php } ?>
<?php } ?>
<?php // Tag ?>
<?php if ( is_tag() ) { ?>
	<?php if ( is_paged() ){ ?>
		<title>#<?php echo single_tag_title('', false); ?> - <?php echo get_bloginfo('name'); ?> - Page <?php echo $paged; ?></title>
		<meta name="description" content="<?php echo wp_trim_words(tag_description()); ?> - Page <?php echo $paged; ?>" />
	<?php } else { ?>
		<title>#<?php echo single_tag_title('', false); ?> - <?php echo get_bloginfo('name'); ?></title>
		<meta name="description" content="<?php echo wp_trim_words(tag_description()); ?>" />
	<?php } ?>
<?php } ?>
<?php // Search ?>
<?php if ( is_search() ) { ?>
	<title>Search Result for <?php ucwords(the_search_query()); ?> - <?php echo get_bloginfo('name'); ?></title>
	<meta name="description" content="Search result for <?php ucwords(the_search_query()); ?> on <?php echo get_bloginfo('name'); ?>" />
<?php } ?>
<?php // 404 ?>
<?php if ( is_404() ) { ?>
	<title>Error 404 Page not Found - <?php echo get_bloginfo('name'); ?></title>
<?php }
