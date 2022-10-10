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
	echo '<nav class="breadcrumbs" aria-label="breadcrumb">';
	echo '<ol itemscope itemtype="http://schema.org/BreadcrumbList">';
	echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_bloginfo('url') . '"><span itemprop="name">Home</span></a><meta itemprop="position" content="1" /></li>';
	$categories = wp_get_post_terms($post->ID, 'category', array('orderby' => 'parent', 'order' => 'ASC'));
	if ($categories) {
		$catcount = 2;
		foreach ($categories as $cat) {
			echo '<li class="breadcrumb-list" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . get_category_link($cat->term_id) . '"><span itemprop="name">' . $cat->name . '</span></a><meta itemprop="position" content="' . $catcount . '" /></li>';
			$catcount++;
		}
	}
	echo '<li class="breadcrumb-list" aria-current="page">' . get_the_title() . '</li>';
	echo '</ol>';
	echo '</nav>';
}

// Include custom stylesheet on head
function wa_style_queue_css() {
	wp_register_style('wa-style', get_template_directory_uri() . '/assets/css/main.css', false, NULL);
	wp_enqueue_style('wa-style');
}
add_action('wp_enqueue_scripts', 'wa_style_queue_css');

// Insert custom style in custom setting
function wa_custom_setting_style() {
	wp_register_style('wa_custom_admin_css', get_template_directory_uri() . '/assets/css/admin.css', false, NULL);
	wp_enqueue_style('wa_custom_admin_css');
}
add_action('admin_enqueue_scripts', 'wa_custom_setting_style');

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

// Custom style on login page
function wa_login_style() {
	wp_register_style('wa-login-style', get_template_directory_uri() . '/assets/css/login.css', false, NULL);
	wp_enqueue_style('wa-login-style');
}
add_action('login_enqueue_scripts', 'wa_login_style');

//  Add Favicon on login and admin page
function add_third_party_resource() {
	echo '<link rel="apple-touch-icon" sizes="180x180" href="' . get_stylesheet_directory_uri() . '/assets/favicon/apple-touch-icon.png">';
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . get_stylesheet_directory_uri() . '/assets/favicon/favicon-32x32.png">';
	echo '<link rel="icon" type="image/png" sizes="16x16" href="' . get_stylesheet_directory_uri() . '/assets/favicon/favicon-16x16.png">';
}
add_action('login_head', 'add_third_party_resource');
add_action('admin_head', 'add_third_party_resource');

// Change login looks
function my_login_logo_url() {
	return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title() {
	return 'Wiryawan Adipa';
}
add_filter('login_headertext', 'my_login_logo_url_title');

// reCaptcha
if (
	null != get_option('wa_recaptcha_site_key')
	&& !empty(get_option('wa_recaptcha_site_key'))
	&& null != get_option('wa_recaptcha_secret_key')
	&& !empty(get_option('wa_recaptcha_secret_key'))
) {
	// Add reCaptcha & honeypot on login, registration and lost password page
	function recaptcha_honeypot() {
		echo '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
		echo '<input style="display: none;" name="captcha" placeholder="1+1=" type="text" tabindex="-1" autocomplete="off">';
		echo '<div class="g-recaptcha brochure__form__captcha" data-sitekey="' . get_option('wa_recaptcha_site_key') . '"></div>';
	}
	add_action('login_form','recaptcha_honeypot');
	add_action('register_form', 'recaptcha_honeypot');
	add_action('lostpassword_form', 'recaptcha_honeypot');

	function extra_div() {
		echo '<div style="width: 1px;"></div>';
	}
	add_action('lostpassword_form', 'extra_div');

	// Validating reCaptcha & honeypot on login page
	function captcha_login_check($user, $password) {
		if (!empty($_POST['g-recaptcha-response']) && $_POST['captcha'] === '') {
			$rsp = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . get_option('wa_recaptcha_secret_key') . '&response=' . $_POST['g-recaptcha-response'] .'&remoteip=' . $_SERVER['REMOTE_ADDR']);
			$valid = json_decode($rsp, true);
			if ($valid["success"] == true) {
				return $user;
			} else {
				return new WP_Error('Captcha Invalid', __('Captcha Invalid! Please check the captcha!'));
			}
		} else {
			return new WP_Error('Captcha Invalid', __('Captcha Invalid! Please check the captcha!'));
		}
	}
	add_action('wp_authenticate_user', 'captcha_login_check', 10, 2);

	// Validating reCaptcha & honeypot on registration page
	function captcha_registration_check($errors, $user_login, $user_email) {
		if (!empty($_POST['g-recaptcha-response']) && $_POST['captcha'] === '') {
			$rsp = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . get_option('wa_recaptcha_secret_key') . '&response=' . $_POST['g-recaptcha-response'] .'&remoteip=' . $_SERVER['REMOTE_ADDR']);
			$valid = json_decode($rsp, true);
			if ($valid["success"] == true) {
				return $errors;
			} else {
				return new WP_Error('Captcha Invalid', __('Captcha Invalid! Please check the captcha!'));
			}
		} else {
			return new WP_Error('Captcha Invalid', __('Captcha Invalid! Please check the captcha!'));
		}
	}
	add_action('registration_errors', 'captcha_registration_check', 10, 3);

	// Validating reCaptcha & honeypot on lost password page
	function captcha_lostpassword_check($errors) {
		if (!empty($_POST['g-recaptcha-response']) && $_POST['captcha'] === '') {
			$rsp = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . get_option('wa_recaptcha_secret_key') . '&response=' . $_POST['g-recaptcha-response'] .'&remoteip=' . $_SERVER['REMOTE_ADDR']);
			$valid = json_decode($rsp, true);
			if ($valid["success"] == true) {
				
			} else {
				$errors->add('Captcha Invalid', __('Captcha Invalid! Please check the captcha!'));
			}
		} else {
			$errors->add('Captcha Invalid', __('Captcha Invalid! Please check the captcha!'));
		}
	}
	add_action( 'lostpassword_post', 'captcha_lostpassword_check', 10, 1 );
}

// Stop wordpress heartbeat
function stop_heartbeat() {
	wp_deregister_script('heartbeat');
}
add_action('init', 'stop_heartbeat', 1);

// Disable author & date arhive page
function disable_page() {
	global $wp_query;
	if (
		is_author()
		|| is_date()
		|| (is_home()
		&& is_paged())
	) {
		wp_redirect(get_option('home'), 301); 
		exit; 
	}
}
add_action('template_redirect', 'disable_page');

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
			echo '<div class="related-article">';
			echo '<h2>Related Post</h2>';
			while ($my_query->have_posts()) {
				$my_query->the_post();
				echo '<div class="related-article-link"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>';
			}
			echo '</div>';
		}
	}
	wp_reset_postdata();
}

// Add loading attribute
function strip_entire_image_class($html) {
    return preg_replace('/ class="(.*)"/', 'loading="lazy"', $html);
}
add_filter('get_image_tag', 'strip_entire_image_class', 0, 4);

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
	return 25;
}
add_filter('excerpt_length', 'wp_example_excerpt_length');

// Remove dots on the_excerpt
function replace_content($content) {
	$content = str_replace(array('[&hellip;]', '[...]', '...'), '', $content);
	return $content;
}
add_filter('the_excerpt', 'replace_content');
add_filter('get_the_excerpt', 'replace_content');

// Custom Pagination
function custom_pagination($pages = '', $range = 3) {  
	$showitems = ($range*2)+1;  
	global $paged;
	if (empty($paged)) {
		$paged = 1;
	}
	if ($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if (!$pages) {
			$pages = 1;
		}
	}   
	if (1 != $pages) {
		echo '<nav class="pagination" aria-label="Pagination">';
		if (
			$paged > 1
			&& $showitems < $pages
		) {
			echo '<a href="' . get_pagenum_link($paged - 1) . '" title="Go to Page ' . ($paged-1) . '" aria-label="Go to Page ' . ($paged-1) . '" class="nav-arrow">&lsaquo;</a>';
		}
		if (
			$paged > $range
			&& $paged > $range+1
			&& $showitems < $pages
		) {
			echo '<a href="' . get_pagenum_link(1) . '" title="Go to Page 1" aria-label="Go to Page 1">1</a>';
		}
		if ($paged-$range-1 > 1) {
			echo '<span class="dot">&hellip;</span>';
		}
		for ($i=1; $i <= $pages; $i++) {
			if (
				1 != $pages
				&& ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )
			) {
				if ($paged == $i) {
					echo '<span class="current">' . $i . '</span>';
				} else {
					echo '<a href="' . get_pagenum_link($i) . '" title="Go to Page ' . $i . '" aria-label="Go to Page ' . $i . '">' . $i . '</a>';
				}
			}
		}
		if ($paged+$range+1 < $pages) {
			echo '<span class="dot">&hellip;</span>';
		}
		if (
			$paged < $pages-$range
			&&  $paged+$range-1 < $pages
			&& $showitems < $pages
		) {
			echo '<a href="' . get_pagenum_link($pages) . '" title="Go to Page ' . $pages . '" aria-label="Go to Page ' . $pages . '">' . $pages . '</a>';
		}
		if (
			$paged < $pages
			&& $showitems < $pages
		) {
			echo '<a href="' . get_pagenum_link($paged + 1) . '" title="Go to Page ' . ($paged+1) . '" aria-label="Go to Page ' . ($paged+1) . '" class="nav-arrow">&rsaquo;</a>';
		}
		echo '</nav>' . "\n";
	}
}

// Youtube shortcode
function youtube_link($atts, $content = null) {
	return '<div class="youtube"><iframe width="560" height="315" src="https://www.youtube.com/embed/' . $content . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe></div>';
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
}
add_action('admin_menu', 'theme_settings_panel');

function theme_settings_general() {
	include 'settings/setting-main.php';
}

function register_general_setting() {
	register_setting('main-settings', 'wa_mail');
	register_setting('main-settings', 'wa_recaptcha_site_key');
	register_setting('main-settings', 'wa_recaptcha_secret_key');
}
add_action('admin_init', 'register_general_setting');
