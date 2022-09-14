<?php
// Auto theme setting upon activation
if (isset($_GET['activated']) && is_admin()) {
	update_option('posts_per_page', 12);
	update_option('thumbnail_size_w', 0);
	update_option('thumbnail_size_h', 0);
	update_option('thumbnail_crop', 1);
	update_option('medium_size_w', 0);
	update_option('medium_size_h', 0);
	update_option('medium_large_size_w', '0');
	update_option('medium_large_size_h', '0');
	update_option('large_size_w', 0);
	update_option('large_size_h', 0);
	update_option('require_name_email', 1);
	update_option('comment_registration', 1);
	update_option('default_pingback_flag', 0);
	update_option('default_comment_status', 'closed');
	update_option('default_ping_status', 'closed');
	update_option('comments_notify', 0);
	update_option('moderation_notify', 0);
	update_option('comment_moderation', 1);
	update_option('comment_previously_approved', 1);
	update_option('show_avatars', 0);
	update_option('permalink_structure', '/%category%/%postname%/');
	wp_insert_term('Blog', 'category', array('description' => 'List of all of my published articles, tutorial, study cases & etc.'));
	wp_insert_term('Design Gallery', 'category', array('description' => 'List of all my design are in this page. Including mock up.'));
	wp_insert_term('Project', 'category', array('description' => 'List of all my project in the past are in this page'));
	wp_delete_comment(1);
	wp_delete_post(1, true);
	wp_delete_post(2, true);
	$page_title = array('Contact', 'About');
	foreach ($page_title as $new_page_title) {
		$page_check = get_page_by_title($new_page_title);
		$new_page = array(
			'post_type' => 'page',
			'post_title' => $new_page_title,
			'post_content' => '',
			'post_status' => 'publish',
			'post_author' => 1,
			'page_template'  => 'page-templates/' . strtolower($new_page_title) . '.php'
		);
		if (!isset($page_check->ID)) {
			$new_page_id = wp_insert_post($new_page);
		}
	}
}

// Add breadcrumbs
function breadcrumbs() {
	global $post;
	echo '<nav aria-label="breadcrumb">' . "\n";
	echo '<ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">' . "\n";
	echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_bloginfo('url') . '">' . '<span itemprop="name">Home</span>' . '</a><meta itemprop="position" content="1" /></li> &gt; ' . "\n";
	$categories = wp_get_post_terms($post->ID, 'category', array('orderby' => 'parent', 'order' => 'ASC'));
	if ($categories) {
		$catcount = 2;
		foreach ($categories as $cat) {
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_category_link($cat->term_id) . '">' . '<span itemprop="name">' . $cat->name . '</span>' . '</a><meta itemprop="position" content="' . $catcount . '" /></li> &gt; ' . "\n";
			$catcount++;
		}
	}
	echo '<li aria-current="page">' . get_the_title() . '</li>' . "\n";
	echo '</ol>' . "\n";
	echo '</nav>' . "\n";
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
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title() {
	return 'Wiryawan Adipa';
}
add_filter('login_headertext', 'my_login_logo_url_title');

// Custom style on login page
function wa_login_style() {
	global $theme_version, $random_number;
	wp_register_style('wa-login-style', get_template_directory_uri() . '/assets/css/wa-login-style.css', false, $theme_version . $random_number);
	wp_enqueue_style('wa-login-style');
}
add_action('login_enqueue_scripts', 'wa_login_style');

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
	wp_register_style('wa_custom_admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', false, $theme_version . $random_number);
	wp_enqueue_style('wa_custom_admin_css');
}
add_action('admin_enqueue_scripts', 'wa_custom_setting_style');

function fontawesome_icon() {
	wp_register_style('wa_fontawesome_icon', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css');
	wp_enqueue_style('wa_fontawesome_icon');
}
add_action('admin_enqueue_scripts', 'fontawesome_icon');

// Disable load HCB styles & scripts if it's not in single post
function wa_deregister_styles() {
	if (!is_single() && !is_admin()) {
		wp_deregister_style('hcb-coloring');
		wp_deregister_style('hcb-style');
	}
}
add_action('wp_print_styles', 'wa_deregister_styles');

function wa_deregister_script() {
	if (!is_single() && !is_admin()) {
		wp_deregister_script('hcb-prism');
		wp_deregister_script('hcb-script');
	}
}
add_action('wp_print_scripts', 'wa_deregister_script');

// Stop wordpress heartbeat
function stop_heartbeat() {
	wp_deregister_script('heartbeat');
}
add_action('init', 'stop_heartbeat', 1);

// Disable author & date arhive page
function disable_page() {
	global $wp_query;
	if (is_author() || is_date() || (is_home() && is_paged())) {
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

if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	function easy_add_thumbnail($post) {
		$already_has_thumb = has_post_thumbnail();
		$post_type = get_post_type($post->ID);
		$exclude_types = array('');
		$exclude_types = apply_filters('eat_exclude_types', $exclude_types);
		if ($already_has_thumb) {
			return;
		}
		if (!in_array($post_type, $exclude_types)) {
			$childarray = array(
				'order' => 'ASC',
				'post_parent' => $post->ID,
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'numberposts' => 1
			);
			$attached_image = get_children($childarray);
			if ($attached_image) {
				$attachment_values = array_values($attached_image);
				add_post_meta($post->ID, '_thumbnail_id', $attachment_values[0]->ID, true);
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
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-blocks-style');
	wp_dequeue_style('global-styles');
} 
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);

// Disable Wordpress auto generated images
function disable_media($sizes) {
	unset($sizes['thumbnail']);
	unset($sizes['medium']);
	unset($sizes['medium_large']);
	unset($sizes['large']);
	unset($sizes['1536x1536']);
	unset($sizes['2048x2048']);
	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'disable_media');
add_filter('big_image_size_threshold', '__return_false');

// Add image size
add_image_size('bigthumb', 421, 263, true);

function wa_related_by_tags() {
	global $post;
	$tags = get_the_tags($post->ID);
	if ($tags) {
		foreach($tags as $individual_tag) {
			$tags_ids[] = $individual_tag->term_id;
		}
		$args=array(
			'tag__in' => $tags_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=> 4,
			'orderby' => 'rand'
		);
		$my_query = new wp_query($args);
		if ($my_query->have_posts()) {
			echo '<div class="container wa-related-post"><div class="row">';
			echo '<h2>Related Post</h2>';
			while ($my_query->have_posts()) {
				$my_query->the_post();
				echo '<div class="px-4 py-2 mb-2 mb-md-3 position-relative"><a class="stretched-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>';
			}
			echo '</div></div>';
		}
	}
	wp_reset_postdata();
}

// Add <figure> tag on <img>
function figure_tag_img ($content) {
	$content = preg_replace(
		'/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s',
		'<figure>$1</figure>',
		$content
	);
	return $content;
}
add_filter('the_content', 'figure_tag_img', 99);

// Strict guess for a 404 redirect
function strict_redirect_guessing() {
	return true;
}
add_filter('strict_redirect_guess_404_permalink', 'strict_redirect_guessing');

// Limit the excerpt length
function wp_example_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'wp_example_excerpt_length');

// Remove dots on the_excerpt
function replace_content($content) {
	$content = str_replace(array('[&hellip;]', '[...]', '...'), '', $content);
	return $content;
}
add_filter('the_excerpt', 'replace_content');

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
					if ($i == $paged) {
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
function youtube_link($atts, $content = null) {
	return '<div class="ratio ratio-16x9 youtube"><iframe width="560" height="315" src="https://www.youtube.com/embed/' . $content . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe></div>';
}
add_shortcode('youtube', 'youtube_link');

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
		'61'
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

function theme_settings_about() {
	include 'settings/setting-about.php';
}

function register_general_setting() {
	register_setting('main-settings', 'wa_mail');
	register_setting('main-settings', 'wa_recaptcha_site_key');
	register_setting('main-settings', 'wa_recaptcha_secret_key');
	register_setting('main-settings', 'head_code');
	register_setting('main-settings', 'footer_code');
}
add_action('admin_init', 'register_general_setting');
