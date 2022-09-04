<?php
// Auto theme setting upon activation
if( isset( $_GET['activated'] ) && is_admin() ) {
	update_option( 'posts_per_page', 12 );
	update_option( 'thumbnail_size_w', 0 );
	update_option( 'thumbnail_size_h', 0 );
	update_option( 'thumbnail_crop', 1 );
	update_option( 'medium_size_w', 0 );
	update_option( 'medium_size_h', 0 );
	update_option( 'medium_large_size_w', '0');
	update_option( 'medium_large_size_h', '0');
	update_option( 'large_size_w', 0 );
	update_option( 'large_size_h', 0 );
	update_option( 'require_name_email', 1 );
	update_option( 'comment_registration', 1 );
	update_option( 'default_pingback_flag', 0 );
	update_option( 'default_comment_status', 'closed' );
	update_option( 'default_ping_status', 'closed' );
	update_option( 'comments_notify', 0 );
	update_option( 'moderation_notify', 0 );
	update_option( 'comment_moderation', 1 );
	update_option( 'comment_previously_approved', 1 );
	update_option( 'show_avatars', 0 );
	update_option( 'permalink_structure', '/%category%/%postname%/' );
	wp_insert_term( 'Blog' , 'category', array('description' => 'List of all of my published articles, tutorial, study cases & etc.') );
	wp_insert_term( 'Design Gallery' , 'category', array('description' => 'List of all my design are in this page. Including mock up.') );
	wp_insert_term( 'Project' , 'category', array('description' => 'List of all my project in the past are in this page') );
	wp_delete_comment(1);
	wp_delete_post(1, true);
	wp_delete_post(2, true);
	$page_title = array( 'Contact', 'About' );
	foreach( $page_title as $new_page_title ) {
		$page_check = get_page_by_title( $new_page_title );
		$new_page = array(
			'post_type' => 'page',
			'post_title' => $new_page_title,
			'post_content' => '',
			'post_status' => 'publish',
			'post_author' => 1,
			'page_template'  => 'page-templates/' . strtolower($new_page_title) . '.php'
		);
		if( !isset( $page_check->ID ) ) {
			$new_page_id = wp_insert_post( $new_page );
		}
	}
}

// Add breadcrumbs
function breadcrumbs() {
	global $post;
	$schema_link = 'http://schema.org/ListItem';
	$home = 'Home';
	$delimiter = ' &gt; ';
	$homeLink = get_bloginfo('url');
	echo '<ol class="container p-3 py-2 rounded-1 mb-3 breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">' . "\n";
	echo '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '"><a itemprop="item" href="' . $homeLink . '">' . '<span itemprop="name">' . $home . '</span>' . '</a><meta itemprop="position" content="1" /></li>' . $delimiter . "\n";
	$category = get_the_category();
	if ($category) {
		foreach ( $category as $cat ) {
			if( !$cat->parent ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '"><a itemprop="item" href="' . get_category_link($cat->term_id) . '">' . '<span itemprop="name">' . $cat->name . '</span>' . '</a><meta itemprop="position" content="2" /></li>' . $delimiter . "\n";
			}
		}
		foreach ( $category as $cat ) {
			if( $cat->parent ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '"><a itemprop="item" href="' . get_category_link($cat->term_id) . '">' . '<span itemprop="name">' . $cat->name . '</span>' . '</a><meta itemprop="position" content="3" /></li>' . $delimiter . "\n";
			}
		}
	}
	echo '<li>' . get_the_title() . '</li>' . "\n";
	echo '</ol>' . "\n";
}

//  Add Favicon on login and admin page
function add_site_favicon() {
    echo '<link rel="apple-touch-icon" sizes="180x180" href="' . get_stylesheet_directory_uri() . '/assets/favicon/apple-touch-icon.png">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . get_stylesheet_directory_uri() . '/assets/favicon/favicon-32x32.png">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="16x16" href="' . get_stylesheet_directory_uri() . '/assets/favicon/favicon-16x16.png">' . "\n";
	echo '<link rel="manifest" href="' . get_stylesheet_directory_uri() . '/assets/favicon/site.webmanifest">' . "\n";
}
add_action('login_head', 'add_site_favicon');
add_action('admin_head', 'add_site_favicon');

// Get theme version
function style_get_version() {
	$theme_data = wp_get_theme();
	return $theme_data->Version;
}
$theme_version = style_get_version();
global $theme_version;

// Get random number
function style_get_random() {
	$randomizr = '.' . rand(100,9999);
	return $randomizr;
}
$random_number = style_get_random();
global $random_number;

// Change login looks
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Wiryawan Adipa';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );

// Custom style on login page
function wa_login_style() {
	global $theme_version, $random_number;
    wp_register_style('wa-login-style', get_template_directory_uri() . '/assets/css/wa-login-style.css', false, $theme_version . $random_number);
	wp_enqueue_style('wa-login-style');
}
add_action( 'login_enqueue_scripts', 'wa_login_style' );

// Show fake error in login page (just for fun)
function login_error() {
	return '<center>Your IP is blocked</center>';
}
add_filter('login_errors', 'login_error');

// Include custom stylesheet on head
function wa_style_queue_css() {
	global $theme_version, $random_number;
	if (!is_admin()) {
		wp_register_style('wa-style', get_template_directory_uri() . '/assets/css/wa-style.css', false, $theme_version . $random_number);
		wp_enqueue_style('wa-style');
	}
}
add_action('wp_enqueue_scripts', 'wa_style_queue_css');

// Insert custom style in custom setting
function wa_custom_setting_style() {
	global $theme_version, $random_number;
	wp_register_style( 'wa_custom_admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', false, $theme_version . $random_number );
	wp_enqueue_style( 'wa_custom_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'wa_custom_setting_style' );

function fontawesome_icon() {
	wp_register_style( 'wa_fontawesome_icon', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' );
	wp_enqueue_style( 'wa_fontawesome_icon' );
}
add_action( 'admin_enqueue_scripts', 'fontawesome_icon' );

// Insert custom script in custom setting
function wa_custom_setting_script() {
	global $theme_version, $random_number;
	wp_register_script( 'wa_custom_admin_js', get_template_directory_uri() . '/assets/js/admin-script.js', false, $theme_version . $random_number );
	wp_enqueue_script( 'wa_custom_admin_js' );
}
add_action( 'admin_enqueue_scripts', 'wa_custom_setting_script' );

// Disable load HCB styles & scripts if it's not in single post
function wa_deregister_styles() {
	if (!is_single() && !is_admin()) {
		wp_deregister_style('hcb-coloring');
		wp_deregister_style( 'hcb-style' );
	}
}
add_action( 'wp_print_styles', 'wa_deregister_styles' );

function wa_deregister_script() {
	if (!is_single() && !is_admin()) {
		wp_deregister_script('clipboard');
		wp_deregister_script('hcb-prism');
		wp_deregister_script('hcb-script');
	}
}
add_action( 'wp_print_scripts', 'wa_deregister_script' );

// Stop wordpress heartbeat
function stop_heartbeat() {
	wp_deregister_script('heartbeat');
}
add_action('init', 'stop_heartbeat', 1);

// Disable author & date arhive page
function disable_page() {
    global $wp_query;
    if ( is_author() || is_date() ) {
        wp_redirect(get_option('home'), 301); 
        exit; 
    }
}
add_action('template_redirect', 'disable_page');

// Get page ID by title
function get_page_id_by_title($title) {
	$page = get_page_by_title($title);
	return $page->ID;
}

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    function easy_add_thumbnail($post) {
        $already_has_thumb = has_post_thumbnail();
        $post_type = get_post_type( $post->ID );
        $exclude_types = array('');
        $exclude_types = apply_filters( 'eat_exclude_types', $exclude_types );
        if ( $already_has_thumb ) {
            return;
        }
        if ( ! in_array( $post_type, $exclude_types ) ) {
            $attached_image = get_children( "order=ASC&post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
            if ( $attached_image ) {
                $attachment_values = array_values( $attached_image );
                add_post_meta( $post->ID, '_thumbnail_id', $attachment_values[0]->ID, true );
            }
        }
    }
    add_action('the_post', 'easy_add_thumbnail');
    add_action('new_to_publish', 'easy_add_thumbnail');
    add_action('draft_to_publish', 'easy_add_thumbnail');
    add_action('pending_to_publish', 'easy_add_thumbnail');
    add_action('future_to_publish', 'easy_add_thumbnail');
}

// Remove admin bar
add_filter('show_admin_bar', '__return_false');

// Remove unnecessary HTML tag
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

function remove_oembed() {
	global $wp;
	$wp->public_query_vars = array_diff($wp->public_query_vars, array('embed'));
	remove_action('rest_api_init', 'wp_oembed_register_route');
	add_filter('embed_oembed_discover', '__return_false');
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
	remove_action('wp_head', 'wp_oembed_add_discovery_links');
	remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'remove_oembed', 9999);

function smartwp_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-blocks-style' );
	wp_dequeue_style( 'global-styles' );
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// Disable Wordpress auto generated images
function disable_media($sizes) {
	unset($sizes['thumbnail']);
	unset($sizes['medium']);
	unset($sizes['medium_large']);
	unset($sizes['large']);
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );
	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'disable_media');
add_filter( 'big_image_size_threshold', '__return_false' );

// Add image size
add_image_size('bigthumb', 421, 263, true);

// Add <figure> tag on <img>
function figure_tag_img ( $content ) {
    $content = preg_replace(
        '/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s',
        '<figure>$1</figure>',
        $content
    );
    return $content;
}
add_filter( 'the_content', 'figure_tag_img', 99 );

// Strict guess for a 404 redirect
function strict_redirect_guessing() {
	return true;
}
add_filter( 'strict_redirect_guess_404_permalink', 'strict_redirect_guessing');

// Clean category list
function categories_clean($wp_list_categories) {
	$pattern = array(
		'/\<li class="cat-item cat-item[^>]*><a /',
		'/\<li class="cat-item-none[^>]*>/'
	);
	$replace = array(
		'<li><a class="dropdown-item py-3 py-sm-2 px-4 px-sm-3" ',
		'<li class="py-3 py-sm-2 px-3 text-white">'
	);
	return preg_replace($pattern, $replace, $wp_list_categories);
}
add_filter('wp_list_categories','categories_clean');

// Clean page list
function pages_clean($wp_list_pages) {
	$pattern = array(
		'/\<li class="page_item[^>]*><a /'
	);
	$replace = array(
		'<li><a class="dropdown-item py-3 py-sm-2 px-4 px-sm-3" '
	);
	return preg_replace($pattern, $replace, $wp_list_pages);
}
add_filter('wp_list_pages','pages_clean');

// Limit the excerpt length
function wp_example_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wp_example_excerpt_length');

// Remove dots on the_excerpt
function replace_content( $content) {
    $content = str_replace(array( '[&hellip;]', '[...]', '...' ), '', $content);
    return $content;
}
add_filter('the_excerpt','replace_content');

// Page navigation
function pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 1, $always_show = false) {
	global $request, $wpdb, $posts_per_page, $paged;
	if (!is_single()) {
		if (!is_category() && !is_tag()) {
			preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);
		} else {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);
		}
		$fromwhere = $matches[1];
		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		$max_page = ceil($numposts / $posts_per_page);
		if (empty($paged)) {
			$paged = 1;
		}
		if ($max_page > 1 || $always_show) {
			echo $before . '<nav class="blog-pagination text-end" aria-label="Pagination">';
			for ($i = $paged - $pages_to_show; $i <= $paged + $pages_to_show; $i++) {
				if ($i >= 1 && $i <= $max_page) {
					if($i == $paged) {
					}
					elseif ($i < $paged) {
						echo '<a href="'.get_pagenum_link($i).'" class="pagination me-2"><i class="fa-solid fa-chevron-left"></i> Newer Post</a>';
					}
					else {
						echo '<a href="'.get_pagenum_link($i).'" class="pagination">Older Post <i class="fa-solid fa-chevron-right"></i></a>';
					}
				}
			}
			echo '</nav>' . $after;
		}
	}
}

// NoFollow on Pages
function add_nofollow($text) {
	$list = str_replace('<a ', '<a rel="nofollow" ', $text);
	return $list;
}
add_filter('wp_list_pages', 'add_nofollow');

// Youtube shortcode
function youtube_link( $atts, $content = null ) {
	return '<div class="ratio ratio-16x9 youtube"><iframe width="560" height="315" src="https://www.youtube.com/embed/' . $content . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe></div>';
}
add_shortcode( 'youtube', 'youtube_link' );

// Show Advanced Option in Settings
function show_options() {
	add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
}
add_action('admin_menu', 'show_options');

// Custom theme settings
function theme_settings_panel() {
	add_menu_page(
		'Wiryawan Adipa Theme Settings',
		'Theme Settings',
		'manage_options',
		'wa-theme-settings',
		'theme_settings_general',
		get_template_directory_uri() . '/assets/favicon/favicon-16x16.png',
		'2'
	);
	add_submenu_page(
		'wa-theme-settings',
		'General',
		'General',
		'manage_options',
		'wa-theme-settings',
		'theme_settings_general'
	);
	add_submenu_page(
		'wa-theme-settings',
		'Meta',
		'Meta',
		'manage_options',
		'wa-theme-settings-meta',
		'theme_settings_meta'
	);
	add_submenu_page(
		'wa-theme-settings',
		'About',
		'About',
		'manage_options',
		'wa-theme-settings-about',
		'theme_settings_about'
	);
}
add_action('admin_menu', 'theme_settings_panel');

function theme_settings_general() {
	include 'settings/setting-main.php';
}

function theme_settings_meta() {
	include 'settings/setting-meta.php';
}

function theme_settings_about() {
	include 'settings/setting-about.php';
}

function register_general_setting() {
	register_setting( 'main-settings', 'head_code' );
	register_setting( 'main-settings', 'footer_code' );
	register_setting( 'main-settings', 'hero_desc' );
	register_setting( 'main-settings', 'wa_facebook' );
	register_setting( 'main-settings', 'wa_twitter' );
	register_setting( 'main-settings', 'wa_instagram' );
	register_setting( 'main-settings', 'wa_linkedin' );
	register_setting( 'main-settings', 'wa_github' );
	register_setting( 'main-settings', 'wa_youtube' );
	register_setting( 'main-settings', 'wa_medium' );
	register_setting( 'main-settings', 'wa_recaptcha_site_key' );
	register_setting( 'main-settings', 'wa_recaptcha_secret_key' );
	register_setting( 'main-settings', 'wa_mail' );
	register_setting( 'home-settings', 'home_title' );
	register_setting( 'home-settings', 'home_meta_desc' );
	register_setting( 'post-settings', 'post_title' );
	register_setting( 'post-settings', 'post_meta_desc' );
	register_setting( 'page-settings', 'page_title' );
	register_setting( 'page-settings', 'page_meta_desc' );
	register_setting( 'cat-settings', 'cat_title' );
	register_setting( 'cat-settings', 'cat_meta_desc' );
	register_setting( 'tag-settings', 'tag_title' );
	register_setting( 'tag-settings', 'tag_meta_desc' );
}
add_action('admin_init', 'register_general_setting');

function add_hero_desc() {
	global $post;
	$variable = get_option('hero_desc', '[lorem]');
	$shortcode  = array(
		'[lorem]'
	);
	$function = array(
		'Lorem ipsum dolor, sit amet consectetur adipisicing elit.'
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('hero_desc', 'add_hero_desc');

function add_home_title() {
	global $post;
	$variable = get_option('home_title', 'Home - [sitename]');
	$shortcode  = array(
		'[sitename]',
		'[tagline]'
	);
	$function = array(
		ucfirst(get_bloginfo( 'name' )),
		ucfirst(get_bloginfo( 'description' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('homepage_title', 'add_home_title');

function add_home_meta_desc() {
	global $post;
	$variable = get_option('home_meta_desc', '[tagline]');
	$shortcode  = array(
		'[tagline]'
	);
	$function = array(
		ucfirst(get_bloginfo( 'description' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('homepage_desc', 'add_home_meta_desc');

function add_post_title() {
	global $post;
	$variable = get_option('post_title', '[title] - [sitename]');
	$shortcode  = array(
		'[title]',
		'[sitename]'
	);
	$function = array(
		ucwords($post->post_title),
		ucfirst(get_bloginfo( 'name' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('single_title', 'add_post_title');

function add_post_meta_desc() {
	global $post;
	$variable = get_option('post_meta_desc', '[words]');
	$shortcode  = array(
		'[words]'
	);
	$function = array(
		wp_trim_words( get_the_content(), 40, '' )
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('post_desc', 'add_post_meta_desc');

function add_page_title() {
	global $post;
	$variable = get_option('page_title', '[title] - [sitename]');
	$shortcode  = array(
		'[title]',
		'[sitename]'
	);
	$function = array(
		ucwords($post->post_title),
		ucfirst(get_bloginfo( 'name' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('static_page_title', 'add_page_title');

function add_page_meta_desc() {
	global $post;
	$variable = get_option('page_meta_desc', '[words]');
	$shortcode  = array(
		'[words]'
	);
	$function = array(
		wp_trim_words( get_the_content(), 40, '' )
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('static_page_desc', 'add_page_meta_desc');

function add_cat_title() {
	global $post;
	$variable = get_option('cat_title', '[catname] - [sitename]');
	$shortcode  = array(
		'[catname]',
		'[sitename]'
	);
	$function = array(
		ucwords(single_cat_title( '', false )),
		ucfirst(get_bloginfo( 'name' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('cat_page_title', 'add_cat_title');

function add_cat_meta_desc() {
	global $post;
	$variable = get_option('cat_meta_desc', '[words]');
	$shortcode  = array(
		'[catname]',
		'[words]'
	);
	$function = array(
		ucwords(single_cat_title( '', false )),
		wp_trim_words( category_description() )
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('cat_page_desc', 'add_cat_meta_desc');

function add_tag_title() {
	global $post;
	$variable = get_option('tag_title', '[tagname] - [sitename]');
	$shortcode  = array(
		'[tagname]',
		'[sitename]'
	);
	$function = array(
		single_tag_title( '', false ),
		ucfirst(get_bloginfo( 'name' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('tag_page_title', 'add_tag_title');

function add_tag_meta_desc() {
global $post;
	$variable = get_option('tag_meta_desc', '[words]');
	$shortcode  = array(
		'[tagname]',
		'[words]'
	);
	$function = array(
		single_tag_title( '', false ),
		wp_trim_words( tag_description() )
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('tag_page_desc', 'add_tag_meta_desc');
?>