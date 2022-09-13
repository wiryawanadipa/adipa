<div class="wrap custom-theme-section">
	<h1>About</h1>
	<div class="tabs">
		<ul class="tab-links">
			<li class="active"><a href="#tab1"><div class="wa-custom-tab-icon"><i class="fa-solid fa-note-sticky"></i></div>Notes</a></li>
			<li><a href="#tab2"><div class="wa-custom-tab-icon"><i class="fa-solid fa-address-book"></i></div>About</a></li>
		</ul>
		<div class="custom-theme-container">
			<div id="tab1" class="tab active">
				<table class="form-table">
					<tr>
						<th>
							<label>Notes</label>
						</th>
						<td>
							<p>This Wordpress theme has built-in function to disable auto generate image function from wordpress every time you upload an image (thumbnail, medium, medium large, large, 1536x1536 and 2048x2048). This feature is on by default.</p>
							<p>So, if you want to re-enable auto generate image function you need to remove this lines from <code>function.php</code> file</p>
							<br>
							<code>function disable_media($sizes) {</code><br>
							&emsp;<code>    unset($sizes['thumbnail']);</code><br>
							&emsp;<code>    unset($sizes['medium']);</code><br>
							&emsp;<code>    unset($sizes['medium_large']);</code><br>
							&emsp;<code>    unset($sizes['large']);</code><br>
							&emsp;<code>    unset( $sizes['1536x1536'] );</code><br>
							&emsp;<code>    unset( $sizes['2048x2048'] );</code><br>
							&emsp;<code>    return $sizes;</code><br>
							<code>}</code><br>
							<code>add_filter('intermediate_image_sizes_advanced', 'disable_media');</code><br>
							<code>add_filter( 'big_image_size_threshold', '__return_false' );</code><br>
						</td>
					</tr>
				</table>
			</div>
			<div id="tab2" class="tab">
				<div class="theme-github-link">
					<a href="https://github.com/wiryawanadipa/adipa" target="_blank">Wiryawan Adipa Wordpress v<?php $theme_version = wp_get_theme(); echo $theme_version->Version; ?></a>
				</div>
				<div class="wa-theme-social">
					<a href="https://wiryawanadipa.com" target="_blank"><i class="fa-solid fa-globe fa-2x"></i></i></a>
					<a href="https://www.facebook.com/wiryawanadipa/" target="_blank"><i class="fa-brands fa-square-facebook fa-2x"></i></a>
					<a href="https://twitter.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-twitter fa-2x"></i></a>
					<a href="https://www.instagram.com/wiryawanadipa/" target="_blank"><i class="fa-brands fa-square-instagram fa-2x"></i></a>
					<a href="https://www.linkedin.com/in/wiryawanadipa/" target="_blank"><i class="fa-brands fa-linkedin fa-2x"></i></a>
					<a href="https://github.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-github fa-2x"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
