<div class="wrap">
	<h2 style="padding:10px;background:#006080;color:#fff;border-radius:5px;margin-bottom:10px;">General</h2>
	<?php if( isset( $_GET['settings-updated'] ) ) { ?>
		<div style="margin: 10px 0" class="updated">
			<p>Settings updated</p>
		</div>
	<?php } ?>
	<div style="background: #fff; border-radius: 3px; padding: 5px 15px 10px; margin-top: 5px; box-shadow: 0 0 2px rgba(0,0,0,.15);">
		<form method="post" action="options.php">
			<table class="form-table">
				<tr>
					<th>
						<label>Head Code</label>
					</th>
					<td>
						<textarea name="head_code" cols="80" rows="12" placeholder="This code will be placed inside <head></head>"><?php echo get_option('head_code'); ?></textarea>
					</td>
				</tr>
				<tr>
					<th>
						<label>Footer Code</label>
					</th>
					<td>
						<textarea name="footer_code" cols="80" rows="12" placeholder="This code will be placed just right before </body>"><?php echo get_option('footer_code'); ?></textarea>
					</td>
				</tr>
				<tr>
					<th>
						<label>Responsive Ads Code Horizontal (Change data-ad-format to horizontal)</label>
					</th>
					<td>
						<textarea name="ads_code_horizontal" cols="80" rows="10" placeholder="This ads will be placed at the bottom of main image"><?php echo get_option('ads_code_horizontal'); ?></textarea>
					</td>
				</tr>
				<tr>
					<th>
						<label>Responsive Ads Code Rectangle (Change data-ad-format to rectangle)</label>
					</th>
					<td>
						<textarea name="ads_code_rectangle" cols="80" rows="10" placeholder="This ads will be placed side by side with article"><?php echo get_option('ads_code_rectangle'); ?></textarea>
					</td>
				</tr>
				<tr>
					<th>
						<label>Responsive Ads Code Vertical (Change data-ad-format to vertical)</label>
					</th>
					<td>
						<textarea name="ads_code_vertical" cols="80" rows="10" placeholder="This ads will be placed in sidebar"><?php echo get_option('ads_code_vertical'); ?></textarea>
					</td>
				</tr>
			</table>
			<?php settings_fields( 'main-settings' ); ?>
			<?php do_settings_sections( 'main-settings' ); ?>
			<?php submit_button(); ?>
		</form>
	</div>
</div>