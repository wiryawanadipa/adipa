<div class="wrap custom-theme-section">
	<h2>General</h2>
	<?php if( isset( $_GET['settings-updated'] ) ) : ?>
		<div style="margin: 10px 0;" class="updated">
			<p>Settings updated</p>
		</div>
	<?php endif; ?>
	<div class="custom-theme-container">
		<form method="post" action="options.php">
			<table class="form-table">
				<!-- Recaptcha Key -->
				<tr>
					<th>
						<label>Recaptcha</label>
					</th>
					<td>
						<label>
							<input class="wa-input-social-id" name="wa_recaptcha" type="text" placeholder="Recaptcha API" value="<?php echo get_option('wa_recaptcha'); ?>">
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
				<tr>
					<th>
						<label>Description in Hero</label>
					</th>
					<td>
						<textarea name="hero_desc" cols="80" rows="12" placeholder="This text will show at hero section"><?php echo get_option('hero_desc', '[lorem]'); ?></textarea>
					</td>
				</tr>
				<!-- Social Link -->
				<!-- Facebook -->
				<tr>
					<th>
						<label>Facebook</label>
					</th>
					<td>
						<label>
							<input class="wa-input-social-id" name="wa_facebook" type="text" placeholder="Facebook Link" value="<?php echo get_option('wa_facebook', 'wiryawanadipa'); ?>">
						</label>
					</td>
				</tr>
				<!-- Twitter -->
				<tr>
					<th>
						<label>Twitter</label>
					</th>
					<td>
						<label>
							<input class="wa-input-social-id" name="wa_twitter" type="text" placeholder="Twitter Link" value="<?php echo get_option('wa_twitter', 'wiryawanadipa'); ?>">
						</label>
					</td>
				</tr>
				<!-- Instagram -->
				<tr>
					<th>
						<label>Instagram</label>
					</th>
					<td>
						<label>
							<input class="wa-input-social-id" name="wa_instagram" type="text" placeholder="Instagram Link" value="<?php echo get_option('wa_instagram', 'wiryawanadipa'); ?>">
						</label>
					</td>
				</tr>
				<!-- LinkedIn -->
				<tr>
					<th>
						<label>LinkedIn</label>
					</th>
					<td>
						<label>
							<input class="wa-input-social-id" name="wa_linkedin" type="text" placeholder="LinkedIn Link" value="<?php echo get_option('wa_linkedin', 'wiryawanadipa'); ?>">
						</label>
					</td>
				</tr>
				<!-- GitHub -->
				<tr>
					<th>
						<label>GitHub</label>
					</th>
					<td>
						<label>
							<input class="wa-input-social-id" name="wa_github" type="text" placeholder="GitHub Link" value="<?php echo get_option('wa_github', 'wiryawanadipa'); ?>">
						</label>
					</td>
				</tr>
				<!-- YouTube -->
				<tr>
					<th>
						<label>YouTube</label>
					</th>
					<td>
						<label>
							<input class="wa-input-social-id" name="wa_youtube" type="text" placeholder="YouTube Channel Link" value="<?php echo get_option('wa_youtube', 'UCpP1g9Vcl33ucu5mO2vr-5Q'); ?>">
						</label>
					</td>
				</tr>
				<!-- Medium -->
				<tr>
					<th>
						<label>Medium</label>
					</th>
					<td>
						<label>
							<input class="wa-input-social-id" name="wa_medium" type="text" placeholder="Medium Link" value="<?php echo get_option('wa_medium', 'wiryawanadipa'); ?>">
						</label>
					</td>
				</tr>
			</table>
			<?php settings_fields( 'main-settings' ); ?>
			<?php do_settings_sections( 'main-settings' ); ?>
			<?php submit_button(); ?>
		</form>
	</div>
</div>