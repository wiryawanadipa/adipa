<?php
/**
	* Default Theme Settings
*/
if (isset($_GET['activated']) && is_admin()) {
	update_option('posts_per_page', 10);
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
			'post_type'			=> 'page',
			'post_title'		=> $new_page_title,
			'post_content'	=> '',
			'post_status'		=> 'publish',
			'post_author'		=> 1,
			'page_template'	=> 'page-templates/' . strtolower($new_page_title) . '.php'
		);
		if (!isset($page_check->ID)) {
			$new_page_id = wp_insert_post($new_page);
		}
	}
}



/**
	* Disable WordPress auto generating various image sizes
*/
add_filter('intermediate_image_sizes_advanced', 'disable_media');
add_filter('big_image_size_threshold', '__return_false');

function disable_media($sizes) {
	unset($sizes['thumbnail']);
	unset($sizes['medium']);
	unset($sizes['medium_large']);
	unset($sizes['large']);
	unset($sizes['1536x1536']);
	unset($sizes['2048x2048']);
	return $sizes;
}



/**
	* Add custom image size for thumbnail
*/
add_image_size('bigthumb', 421, 263, true);



/**
	* Auto insert featured image
*/
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	add_action('the_post', 'easy_add_thumbnail');
	add_action('new_to_publish', 'easy_add_thumbnail');
	add_action('draft_to_publish', 'easy_add_thumbnail');
	add_action('pending_to_publish', 'easy_add_thumbnail');
	add_action('future_to_publish', 'easy_add_thumbnail');

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
}



/**
	* Custom shortcode for YouTube link
*/
add_shortcode('youtube', 'youtube_link');

function youtube_link($atts, $content = null) {
	return '<div class="youtube"><iframe width="560" height="315" src="https://www.youtube.com/embed/' . $content . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe></div>';
}



/**
	* Show all settings on admin menu
*/
add_action('admin_menu', 'show_options');

function show_options() {
	add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
}



/**
	* Custom theme settings
*/
add_action('admin_menu', 'theme_settings_panel');

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

function theme_settings_general() {
	include 'settings/setting-main.php';
}

add_action('admin_init', 'register_general_setting');

function register_general_setting() {
	register_setting('main-settings', 'wa_mail');
	register_setting('main-settings', 'wa_recaptcha_site_key');
	register_setting('main-settings', 'wa_recaptcha_secret_key');
}



/**
	* Custom Font
	*
	* https://fonts.google.com/specimen/Rubik
*/
add_action('login_head', 'wa_custom_font');
add_action('admin_head', 'wa_custom_font');

function wa_custom_font() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n\r";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n\r";
	echo '<link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">' . "\n\r";
}



/**
	* Favicon for admin & login page
*/
add_action('login_head', 'wa_custom_icon');
add_action('admin_head', 'wa_custom_icon');

function wa_custom_icon() {
	echo '<link rel="apple-touch-icon" sizes="180x180" href="' . get_stylesheet_directory_uri() . '/assets/favicon/apple-touch-icon.png">' . "\n\r";
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . get_stylesheet_directory_uri() . '/assets/favicon/favicon-32x32.png">' . "\n\r";
	echo '<link rel="icon" type="image/png" sizes="16x16" href="' . get_stylesheet_directory_uri() . '/assets/favicon/favicon-16x16.png">' . "\n\r";
}



/**
	* Front-End CSS Style
*/
add_action('wp_enqueue_scripts', 'wa_style_queue_css');

function wa_style_queue_css() {
	wp_register_style('wa-main-style', get_template_directory_uri() . '/assets/css/main.min.css', false, wp_get_theme()->get('Version') . '.' . date('YmdHis'));
	wp_enqueue_style('wa-main-style');
}



/**
	* Admin CSS Style
*/
add_action('admin_enqueue_scripts', 'wa_custom_setting_style');

function wa_custom_setting_style() {
	wp_register_style('wa-admin-style', get_template_directory_uri() . '/assets/css/admin.min.css', false, wp_get_theme()->get('Version') . '.' . date('YmdHis'));
	wp_enqueue_style('wa-admin-style');
}



/**
	* Login CSS Style
*/
add_action('login_enqueue_scripts', 'wa_login_style');

function wa_login_style() {
	wp_register_style('wa-login-style', get_template_directory_uri() . '/assets/css/login.min.css', false, wp_get_theme()->get('Version') . '.' . date('YmdHis'));
	wp_enqueue_style('wa-login-style');
}



/**
	* Disable calling Highlighting Code Block plugin CSS & JS
	* Enable only in single post & admin page
	*
	* https://wordpress.org/plugins/highlighting-code-block/
*/
add_action('wp_print_styles', 'wa_deregister_styles');
add_action('wp_print_scripts', 'wa_deregister_script');

function wa_deregister_styles() {
	if (!is_single() && !is_admin()) {
		wp_deregister_style('hcb-coloring');
		wp_deregister_style('hcb-style');
	}
}

function wa_deregister_script() {
	if (!is_single() && !is_admin()) {
		wp_deregister_script('hcb-prism');
		wp_deregister_script('hcb-script');
	}
}



/**
	* Change login page title
*/
add_filter('login_title', 'my_login_title');

function my_login_title() {
	return 'Login - Wiryawan Adipa';
}


/**
	* Change header title
*/
add_filter('login_headertext', 'my_login_logo_url_title');

function my_login_logo_url_title() {
	return 'Wiryawan Adipa';
}



/**
	* Change header URL
*/
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url() {
	return home_url();
}


/**
	* Add Google reCaptcha & honeypot on login, registration, and lost password page
	*
	* https://developers.google.com/recaptcha/docs/display
	* https://developers.google.com/recaptcha/docs/verify
*/
if (
	null != get_option('wa_recaptcha_site_key')
	&& !empty(get_option('wa_recaptcha_site_key'))
	&& null != get_option('wa_recaptcha_secret_key')
	&& !empty(get_option('wa_recaptcha_secret_key'))
) {
	/**
		* Add Google reCaptcha & honeypot element
	*/
	add_action('login_form','recaptcha_honeypot');
	add_action('register_form', 'recaptcha_honeypot');
	add_action('lostpassword_form', 'recaptcha_honeypot');

	function recaptcha_honeypot() {
		echo '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
		echo '<input style="display: none;" name="captcha" placeholder="1+1=" type="text" tabindex="-1" autocomplete="off">';
		echo '<div class="g-recaptcha brochure__form__captcha" data-theme="dark" data-sitekey="' . get_option('wa_recaptcha_site_key') . '"></div>';
	}
	
	/**
		* Add extra element to lost password
		* Function: Fixing UI position
	*/
	add_action('lostpassword_form', 'wa_extra_element');

	function wa_extra_element() {
		echo '<div style="width: 1px;"></div>';
	}

	/**
		* Validating reCaptcha & honeypot on login page
	*/
	add_action('wp_authenticate_user', 'captcha_login_check', 10, 2);

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

	/**
		* Validating reCaptcha & honeypot on registration page
	*/
	add_action('registration_errors', 'captcha_registration_check', 10, 3);

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

	/**
		* Validating reCaptcha & honeypot on lost password page
	*/
	add_action( 'lostpassword_post', 'captcha_lostpassword_check', 10, 1 );

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
}



/**
	* Disable WordPress heartbeat
*/
add_action('init', 'stop_heartbeat', 1);

function stop_heartbeat() {
	wp_deregister_script('heartbeat');
}



/**
	* Breadcrumbs
	*
	* https://schema.org/BreadcrumbList
*/
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



/**
	* Redirect author & date archive page to homepage
*/
add_action('template_redirect', 'disable_page');

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



/**
	* Remove admin bar on front-end
*/
add_filter('show_admin_bar', '__return_false');



/**
	* Remove unnecessary WordPress HTML tag
*/
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

add_action('init', 'remove_oembed', 9999);

function remove_oembed() {
	global $wp;
	$wp->public_query_vars = array_diff($wp->public_query_vars, array('embed'));
	remove_action('rest_api_init', 'wp_oembed_register_route');
	add_filter('embed_oembed_discover', '__return_false');
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
	remove_action('wp_head', 'wp_oembed_add_discovery_links');
	remove_action('wp_head', 'wp_oembed_add_host_js');
}

add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);

function smartwp_remove_wp_block_library_css(){
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-blocks-style');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('classic-theme-styles');
}



/**
	* Related post by tags
*/
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
			echo '<aside class="related-article">';
			echo '<h3>Related Post</h3>';
			echo '<ul>';
			while ($my_query->have_posts()) {
				$my_query->the_post();
				echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
			}
			echo '</ul>';
			echo '</aside>';
		}
	}
	wp_reset_postdata();
}



/**
	* Get Page by Title
*/
function getPageByTitle($page_title, $output = OBJECT, $post_type = 'page') {
	global $wpdb;
	if ( is_array( $post_type ) ) {
		$post_type						= esc_sql( $post_type );
		$post_type_in_string	= "'" . implode( "','", $post_type ) . "'";
		$sql									= $wpdb->prepare(
			"
			SELECT ID
			FROM $wpdb->posts
			WHERE post_title = %s
			AND post_type IN ($post_type_in_string)
		",
			$page_title
		);
	} else {
		$sql = $wpdb->prepare(
			"
			SELECT ID
			FROM $wpdb->posts
			WHERE post_title = %s
			AND post_type = %s
		",
			$page_title,
			$post_type
		);
	}

	$page = $wpdb->get_var( $sql );

	if ( $page ) {
		return get_post( $page, $output );
	}

	return null;
}



/**
	* Add <figure> tag on <img>
*/
add_filter('the_content', 'figure_tag_img', 99);

function figure_tag_img ($content) {
	$content = preg_replace(
		'/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s',
		'<figure>$1</figure>',
		$content
	);
	return $content;
}



/**
	* Replace img class attribute with loading="lazy" attribute
*/
add_filter('get_image_tag', 'strip_entire_image_class', 0, 4);

function strip_entire_image_class($html) {
	return preg_replace('/ class="(.*)"/', 'loading="lazy"', $html);
}



/**
	* Strict guess for a 404 redirect
*/
add_filter('strict_redirect_guess_404_permalink', 'strict_redirect_guessing');

function strict_redirect_guessing() {
	return true;
}



/**
	* Limit the excerpt length
*/
add_filter('excerpt_length', 'wp_example_excerpt_length');

function wp_example_excerpt_length($length) {
	return 25;
}



/**
	* Remove dots on the_excerpt
*/
add_filter('the_excerpt', 'replace_content');
add_filter('get_the_excerpt', 'replace_content');

function replace_content($content) {
	$content = str_replace(array('[&hellip;]', '[...]', '...'), '', $content);
	return $content;
}



/**
	* Custom pagination
*/
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
			echo '<a href="' . get_pagenum_link($paged - 1) . '" title="Go to the previous page" aria-label="Go to the previous page" class="nav-arrow">&lsaquo;</a>';
		}
		if (
			$paged > $range
			&& $paged > $range+1
			&& $showitems < $pages
		) {
			echo '<a href="' . get_pagenum_link(1) . '" title="Go to the page 1" aria-label="Go to the page 1">1</a>';
		}
		if (
			$paged-$range-1 > 1
			&& $pages >= $showitems
			&& $pages != $showitems
		) {
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
					echo '<a href="' . get_pagenum_link($i) . '" title="Go to the page ' . $i . '" aria-label="Go to the page ' . $i . '">' . $i . '</a>';
				}
			}
		}
		if (
			$paged+$range+1 < $pages
			&& $pages >= $showitems
			&& $pages != $showitems
		) {
			echo '<span class="dot">&hellip;</span>';
		}
		if (
			$paged < $pages-$range
			&& $paged+$range-1 < $pages
			&& $showitems < $pages
		) {
			echo '<a href="' . get_pagenum_link($pages) . '" title="Go to the page ' . $pages . '" aria-label="Go to the page ' . $pages . '">' . $pages . '</a>';
		}
		if (
			$paged < $pages
			&& $showitems < $pages
		) {
			echo '<a href="' . get_pagenum_link($paged + 1) . '" title="Go to the next page" aria-label="Go to the next page" class="nav-arrow">&rsaquo;</a>';
		}
		echo '</nav>' . "\n";
	}
}
