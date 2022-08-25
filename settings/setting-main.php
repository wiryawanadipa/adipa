<div class="wrap">
	<h2 style="padding:10px;background:#006080;color:#fff;border-radius:5px;margin-bottom:10px;">General</h2>
	<?php if( isset( $_GET['settings-updated'] ) ) : ?>
		<div style="margin: 10px 0;" class="updated">
			<p>Settings updated</p>
		</div>
	<?php endif; ?>
	<div style="background: #fff; border-radius: 3px; padding: 5px 15px 10px; margin-top: 5px; box-shadow: 0 0 2px rgba(0,0,0,.15);">
		<form method="post" action="options.php">
			<table class="form-table">
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
							<input style="width: 25em;margin-right: .5em;" name="wa_facebook" type="text" placeholder="Facebook Link" value="<?php echo get_option('wa_facebook'); ?>">
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
							<input style="width: 25em;margin-right: .5em;" name="wa_twitter" type="text" placeholder="Twitter Link" value="<?php echo get_option('wa_twitter'); ?>">
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
							<input style="width: 25em;margin-right: .5em;" name="wa_instagram" type="text" placeholder="Instagram Link" value="<?php echo get_option('wa_instagram'); ?>">
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
							<input style="width: 25em;margin-right: .5em;" name="wa_linkedin" type="text" placeholder="LinkedIn Link" value="<?php echo get_option('wa_linkedin'); ?>">
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
							<input style="width: 25em;margin-right: .5em;" name="wa_github" type="text" placeholder="GitHub Link" value="<?php echo get_option('wa_github'); ?>">
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
							<input style="width: 25em;margin-right: .5em;" name="wa_youtube" type="text" placeholder="YouTube Channel Link" value="<?php echo get_option('wa_youtube'); ?>">
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
							<input style="width: 25em;margin-right: .5em;" name="wa_medium" type="text" placeholder="Medium Link" value="<?php echo get_option('wa_medium'); ?>">
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