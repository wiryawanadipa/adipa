<?php // Home ?>
<?php if ( is_home() ) : ?>
    <?php if ($paged): ?>
        <title><?php do_action ( 'homepage_title' ); ?> - Page <?php echo $paged; ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?> - Page <?php echo $paged; ?>" />
    <?php else: ?>
        <title><?php do_action ( 'homepage_title' ); ?></title>
        <meta name="description" content="<?php do_action ( 'homepage_desc' ); ?>" />
    <?php endif; ?>
<?php endif; ?>
<?php // Single Post ?>
<?php if ( is_single() ) : ?>
    <title><?php do_action ( 'single_title' ); ?></title>
    <meta name="description" content="<?php do_action ( 'post_desc' ); ?>" />
<?php endif; ?>
<?php // Category ?>
<?php if ( is_category() ) : ?>
    <?php if ($paged): ?>
        <title><?php do_action ( 'cat_page_title' ); ?> - Page <?php echo $paged; ?></title>
        <meta name="description" content="Category page of <?php echo single_cat_title( '', false ); ?> on <?php bloginfo('name'); ?> - Page <?php echo $paged; ?>" />
    <?php else: ?>
        <title><?php do_action ( 'cat_page_title' ); ?></title>
        <meta name="description" content="<?php do_action ( 'cat_page_desc' ); ?>" />
    <?php endif; ?>
<?php endif; ?>
<?php // Tag ?>
<?php if ( is_tag() ) : ?>
    <?php if ($paged): ?>
        <title><?php do_action ( 'tag_page_title' ); ?> - Page <?php echo $paged; ?></title>
        <meta name="description" content="<?php do_action ( 'tag_page_desc' ); ?>" />
    <?php else: ?>
        <title><?php do_action ( 'tag_page_title' ); ?></title>
        <meta name="description" content="<?php do_action ( 'tag_page_desc' ); ?>" />
    <?php endif; ?>
<?php endif; ?>
<?php // Page ?>
<?php  if ( is_page() ) : ?>
    <title><?php do_action ( 'static_page_title' ); ?></title>
    <meta name="description" content="<?php do_action ( 'static_page_desc' ); ?>" />
<?php endif; ?>
<?php // Search ?>
<?php if ( is_search() ) : ?>
    <title>Search Result for <?php ucwords(the_search_query()); ?> - <?php bloginfo('name'); ?></title>
    <meta name="description" content="Search result for <?php ucwords(the_search_query()); ?> on <?php bloginfo('name'); ?>" />
<?php endif; ?>
<?php // 404 ?>
<?php if ( is_404() ) : ?>
    <title>Error 404 Page not Found - <?php bloginfo('name'); ?></title>
<?php endif; ?>
