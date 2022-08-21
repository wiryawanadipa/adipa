<?php
// Auto Theme Setting Upon Activation
if( isset( $_GET['activated'] ) && is_admin() ) {
	update_option( 'posts_per_page', 10 );
	update_option( 'thumbnail_size_w', 0 );
	update_option( 'thumbnail_size_h', 0 );
	update_option( 'thumbnail_crop', 1 );
	update_option( 'medium_size_w', 0 );
	update_option( 'medium_size_h', 0 );
	update_option( 'medium_large_size_w', '0');
	update_option( 'medium_large_size_h', '0');
	update_option( 'large_size_w', 0 );
	update_option( 'large_size_h', 0 );
	update_option( 'default_pingback_flag', 0 );
	update_option( 'default_comment_status', 'closed' );
	update_option( 'default_ping_status', 'closed' );
	update_option( 'show_avatars', 0 );
	update_option( 'permalink_structure', '/%postname%/' );
	wp_delete_post(1, true);
	wp_delete_post(2, true);
}

// Stop Wordpress Heartbeat
function stop_heartbeat() {
	wp_deregister_script('heartbeat');
}
add_action('init', 'stop_heartbeat', 1);

// Show Fake Login Error
function login_error() {
	return '<center>Your IP is blocked</center>';
}
add_filter('login_errors', 'login_error');

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

// Remove Admin Bar
add_filter('show_admin_bar', '__return_false');

// Remove Unnecessary HTML tag
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

// get theme version
function wpmix_get_version() {
	$theme_data = wp_get_theme();
	return $theme_data->Version;
}
$theme_version = wpmix_get_version();
global $theme_version;

// get random number
function wpmix_get_random() {
	$randomizr = '.' . rand(100,9999);
	return $randomizr;
}
$random_number = wpmix_get_random();
global $random_number;

// include custom stylesheet
function wpmix_queue_css() {
	global $theme_version, $random_number;
	if (!is_admin()) {
		wp_register_style('custom_styles', get_template_directory_uri() . '/style.css', false, $theme_version . $random_number);
		wp_enqueue_style('custom_styles');
	}
}
add_action('wp_print_styles', 'wpmix_queue_css');

// Disable Auto Generate Images
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

// Add Image Size
add_image_size('bigthumb', 274, 250, true);

function figure_tag_img ( $content ) {
    $content = preg_replace(
        '/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s',
        '<figure>$1</figure>',
        $content
    );
    return $content;
}
add_filter( 'the_content', 'figure_tag_img', 99 );

// Fix Search Function
if (!is_user_logged_in() || !is_admin()) {
	function search_filter( $query ) {
		if ($query->is_search) {
			$query->set('post_type','post');
		}
		return $query;
	}
	add_filter('pre_get_posts', 'search_filter');
}

// Disable Wordpress Auto Guessing
function stop_guessing($url) {
	if (is_404()) {
		return false;
	}
	return $url;
}
add_filter('redirect_canonical','stop_guessing');

// Clean Category List
function categories_clean($wp_list_categories) {
	$pattern = array(
		'/\<li class="cat-item cat-item[^>]*><a /'
	);
	$replace = array(
		'<li><a class="dropdown-item" '
	);
	return preg_replace($pattern, $replace, $wp_list_categories);
}
add_filter('wp_list_categories','categories_clean');

// Clean Page List
function pages_clean($wp_list_pages) {
	$pattern = array(
		'/\<li class="page_item[^>]*><a /'
	);
	$replace = array(
		'<li><a class="dropdown-item" '
	);
	return preg_replace($pattern, $replace, $wp_list_pages);
}
add_filter('wp_list_pages','pages_clean');

/*
// Modify <p> in Content
function modify_p_tag($content) {
    $content = str_replace('<p>', '<p class="wa-post">', $content);
    return $content;
}
add_filter('the_content', 'modify_p_tag', 9999);
*/

// Limit The Excerpt Length
function wp_example_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'wp_example_excerpt_length');

function replace_content( $content) {
    $content = str_replace(array( '[&hellip;]', '[...]', '...' ), '', $content);
    return $content;
}
add_filter('the_excerpt','replace_content');

// Page Navigation
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
			echo $before.'<nav class="blog-pagination text-end" aria-label="Pagination">';
			for ($i = $paged - $pages_to_show; $i <= $paged + $pages_to_show; $i++) {
				if ($i >= 1 && $i <= $max_page) {
					if($i == $paged) {
					}
					elseif ($i < $paged) {
						echo '<a href="'.get_pagenum_link($i).'" class="btn btn-primary me-2" ' . $i . '">Newer</a>';
					}
					else {
						echo '<a href="'.get_pagenum_link($i).'" class="btn btn-primary" ' . $i . '">Older</a>';
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

// Show Advanced Option in Settings
function show_options() {
	add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
}
add_action('admin_menu', 'show_options');

// Custom Theme Settings
function theme_options_panel() {
	add_menu_page(
		'Wiryawan Adipa Theme Options',
		'Theme Options',
		'manage_options',
		'wa-theme-options',
		'theme_op_general',
		'dashicons-screenoptions',
		'60'
	);
	add_submenu_page(
		'wa-theme-options',
		'General',
		'General',
		'manage_options',
		'wa-theme-options',
		'theme_op_general'
	);
	add_submenu_page(
		'wa-theme-options',
		'Ads',
		'Ads',
		'manage_options',
		'wa-theme-options-ads',
		'theme_op_ads'
	);
}
add_action('admin_menu', 'theme_options_panel');

function register_general_setting() {
	register_setting('main-settings', 'head_code');
	register_setting('main-settings', 'ads_code_horizontal');
	register_setting('main-settings', 'ads_code_rectangle');
	register_setting('main-settings', 'ads_code_vertical');
	register_setting('main-settings', 'footer_code');
}
add_action('admin_init', 'register_general_setting');

function theme_op_general() {
	include 'settings/setting-main.php';
}

function add_home_title() {
	global $post;
	$variable = get_option('home_title', '[sitename] - [desc]');
	$shortcode  = array(
		'[sitename]',
		'[domain]',
		'[desc]'
	);
	$function = array(
		ucfirst(get_bloginfo( 'name' )),
		ucfirst($_SERVER['HTTP_HOST']),
		ucfirst(get_bloginfo( 'description' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('homepage_title', 'add_home_title');

function add_home_meta_desc() {
	global $post;
	$variable = get_option('home_meta_desc', '[desc].');
	$shortcode  = array(
		'[sitename]',
		'[domain]',
		'[desc]'
	);
	$function = array(
		ucfirst(get_bloginfo( 'name' )),
		ucfirst($_SERVER['HTTP_HOST']),
		ucfirst(get_bloginfo( 'description' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('homepage_desc', 'add_home_meta_desc');

function add_post_title() {
	global $post;
	$variable = get_option('post_title', '[title] - [domain]');
	$shortcode  = array(
		'[title]',
		'[domain]',
		'[sitename]'
	);
	$function = array(
		ucwords($post->post_title),
		ucfirst($_SERVER['HTTP_HOST']),
		ucfirst(get_bloginfo( 'name' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('single_title', 'add_post_title');

function add_post_meta_desc() {
	global $post;
	$variable = get_option('post_meta_desc', '[words].');
	$shortcode  = array(
		'[title]',
		'[cat]',
		'[tag]',
		'[imgtotal]',
		'[date]',
		'[domain]',
		'[sitename]',
		'[words]'
	);
	$function = array(
		ucwords($post->post_title),
		strtolower ( strip_tags ( get_the_term_list ( get_the_ID(), 'category', '', ', ', '' ) ) ),
		strtolower ( strip_tags ( get_the_term_list ( get_the_ID(), 'post_tag', '', ', ', '' ) ) ),
		$nbImg = count( get_children ( array ( 'post_parent' => $post->ID ) ) ),
		get_the_date(),
		ucfirst($_SERVER['HTTP_HOST']),
		ucfirst(get_bloginfo( 'name' )),
		wp_trim_words( get_the_content(), 40, '...' )
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('post_desc', 'add_post_meta_desc');

function add_page_title() {
	global $post;
	$variable = get_option('page_title', '[title] - [domain]');
	$shortcode  = array(
		'[title]',
		'[domain]',
		'[sitename]'
	);
	$function = array(
		ucwords($post->post_title),
		ucfirst($_SERVER['HTTP_HOST']),
		ucfirst(get_bloginfo( 'name' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('static_page_title', 'add_page_title');

function add_page_meta_desc() {
	global $post;
	$variable = get_option('page_meta_desc', '[words]');
	$shortcode  = array(
		'[title]',
		'[domain]',
		'[sitename]',
		'[words]'
	);
	$function = array(
		ucwords($post->post_title),
		ucfirst($_SERVER['HTTP_HOST']),
		ucfirst(get_bloginfo( 'name' )),
		wp_trim_words( get_the_content(), 40, '...' )
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('static_page_desc', 'add_page_meta_desc');

function add_cat_title() {
	global $post;
	$variable = get_option('cat_title', '[catname] - [domain]');
	$shortcode  = array(
		'[catname]',
		'[domain]',
		'[sitename]'
	);
	$function = array(
		ucwords(single_cat_title( '', false )),
		ucfirst($_SERVER['HTTP_HOST']),
		ucfirst(get_bloginfo( 'name' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('cat_page_title', 'add_cat_title');

function add_cat_meta_desc() {
	global $post;
	$variable = get_option('cat_meta_desc', 'List of [catname] post category.');
	$shortcode  = array(
		'[catname]',
		'[domain]',
		'[sitename]'
	);
	$function = array(
		ucwords(single_cat_title( '', false )),
		ucfirst($_SERVER['HTTP_HOST']),
		ucfirst(get_bloginfo( 'name' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('cat_page_desc', 'add_cat_meta_desc');

function add_tag_title() {
	global $post;
	$variable = get_option('tag_title', '[tagname] - [domain]');
	$shortcode  = array(
		'[tagname]',
		'[domain]',
		'[sitename]'
	);
	$function = array(
		ucwords(single_tag_title( '', false )),
		ucfirst($_SERVER['HTTP_HOST']),
		ucfirst(get_bloginfo( 'name' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('tag_page_title', 'add_tag_title');

function add_tag_meta_desc() {
global $post;
	$variable = get_option('tag_meta_desc', 'List of [tagname] post tag.');
	$shortcode  = array(
		'[tagname]',
		'[domain]',
		'[sitename]'
	);
	$function = array(
		ucwords(single_tag_title( '', false )),
		ucfirst($_SERVER['HTTP_HOST']),
		ucfirst(get_bloginfo( 'name' ))
	);
	echo str_replace($shortcode, $function, $variable);
}
add_action('tag_page_desc', 'add_tag_meta_desc');
?>