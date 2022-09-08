<div class="wrap custom-theme-section">
	<h1>General</h1>
	<?php if (isset($_GET['settings-updated'])) : ?>
		<div style="margin: 10px 0;" class="updated">
			<p>Settings updated</p>
		</div>
	<?php endif; ?>
	<div class="custom-theme-container">
		<form method="post" action="options.php">
			<table class="form-table">
				<!-- reCAPTCHA Key -->
				<tr>
					<th>
						<label>Contact E-Mail</label>
					</th>
					<td>
						<label>
							<input class="wa-input" name="wa_mail" type="text" placeholder="Contact E-Mail" value="<?php echo get_option('wa_mail'); ?>">
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<label>reCAPTCHA Site Key</label>
					</th>
					<td>
						<label>
							<input class="wa-input" name="wa_recaptcha_site_key" type="text" placeholder="reCAPTCHA site key" value="<?php echo get_option('wa_recaptcha_site_key'); ?>">
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<label>reCAPTCHA Secret Key</label>
					</th>
					<td>
						<label>
							<input class="wa-input" name="wa_recaptcha_secret_key" type="text" placeholder="reCAPTCHA secret key" value="<?php echo get_option('wa_recaptcha_secret_key'); ?>">
						</label>
					</td>
				</tr>
				<!-- Head Code -->
				<tr>
					<th>
						<label>Head Code</label>
					</th>
					<td>
						<textarea name="head_code" cols="80" rows="12" placeholder="This code will be placed inside <head></head>"><?php echo get_option('head_code'); ?></textarea>
					</td>
				</tr>
				<!-- Footer Code -->
				<tr>
					<th>
						<label>Footer Code</label>
					</th>
					<td>
						<textarea name="footer_code" cols="80" rows="12" placeholder="This code will be placed just right before </body>"><?php echo get_option('footer_code'); ?></textarea>
					</td>
				</tr>
			</table>
			<?php settings_fields('main-settings'); ?>
			<?php do_settings_sections('main-settings'); ?>
			<?php submit_button(); ?>
		</form>
	</div>
</div>