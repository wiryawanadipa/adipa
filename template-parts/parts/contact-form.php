<?php
if( null != get_option( 'wa_recaptcha_site_key' ) && !empty( get_option( 'wa_recaptcha_site_key' ) ) && null != get_option( 'wa_recaptcha_secret_key' ) && !empty( get_option( 'wa_recaptcha_secret_key' ) ) && null != get_option( 'wa_mail' ) && !empty( get_option( 'wa_mail' ) ) ) {
	if(isset($_POST['submit'])) {
		if ($_SESSION['rand'] == $_POST['randcheck']) {
			if(trim($_POST['contactName']) === '') {
				$emptyNameError = true;
			} else {
				$name = trim($_POST['contactName']);
			}

			if(trim($_POST['email']) === '')  {
				$emptyEmailError = true;
			} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,6}$/i", trim($_POST['email']))) {
				$invalidEmailError = true;
			} else {
				$email = trim($_POST['email']);
			}

			if(trim($_POST['comments']) === '') {
				$emptyCommentError = true;
			} else {
				if(function_exists('stripslashes')) {
					$comments = stripslashes(trim($_POST['comments']));
				} else {
					$comments = trim($_POST['comments']);
				}   
			}

			if(!isset($emptyNameError) && !isset($emptyEmailError) && !isset($invalidEmailError) && !isset($emptyCommentError) && !empty($_POST['g-recaptcha-response'])) {
				$secret = get_option( 'wa_recaptcha_secret_key' );
				$ip = $_SERVER['REMOTE_ADDR'];
				$captcha = $_POST['g-recaptcha-response'];
				$rsp = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha .'&remoteip='. $ip);
				$valid = json_decode($rsp, true);
				if($valid["success"] == true) {
					$emailTo = get_option( 'wa_mail' );
					$domain = strtoupper($_SERVER['HTTP_HOST']);
					$subject = '[' . $domain . '] From '.$name;
					$body = 'Name: ' . $name . "\n\n" . 'Email:' . $email . "\n\n" . 'Comments:' . $comments;
					$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
					$mail = wp_mail($emailTo, $subject, $body, $headers);
					if($mail) {
						echo '<div class="p-3 mb-2 bg-success rounded-1"><i class="fa-solid fa-envelope"></i> Thank you for contacting me! Your message has been sent. I&lsquo;ll respond to you within 2x24 hours.</div>';
						$emailSent = true;
					} else {
						echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Message was not sent. There is a problem with the server right now. Please try again. If the problem still persist you could contact me directly via social media.</div>';
					}
				} else {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Invalid captcha.</div>';
				}
			} else {
				if (isset($emptyNameError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Please enter your name.</div>';
				}
				if (isset($emptyEmailError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Please enter your email address.</div>';
				}
				if (isset($invalidEmailError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> You entered an invalid email format address. (e.g. yourname@domain.tld).</div>';
				}
				if (isset($emptyCommentError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Please enter a message.</div>';
				}
				if(empty($_POST['g-recaptcha-response'])) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Please check the captcha.</div>';
				}
			}
		} elseif ($_SESSION['rand'] != $_POST['randcheck']) {
			echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Please fill the form and check the captcha</div>';
		}
	}
	?>
	<div class="col-12 py-4 contact-form">
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<div id="content" role="main">
			<form action="" method="post">
				<fieldset>
					<div class="row mb-0 mb-md-3">
						<div class="col-12 col-md-6 mb-3 mb-md-0">
							<label class="mb-2">Name</label>
							<input id="cf-name" class="form-control check" name="contactName" type="text" placeholder="Please enter your name here." value="<?php if( isset( $_POST['contactName'] ) && !isset($emailSent) ){ echo esc_attr($_POST['contactName']);} else { echo '';} ?>" autofocus required>
						</div>
						<div class="col-12 col-md-6 mb-3 mb-md-0">
							<label class="mb-2">E-Mail</label>
							<input id="cf-email" class="form-control check" name="email" type="email" placeholder="Please enter your e-mail address here." value="<?php if( isset( $_POST['email'] ) && !isset($emailSent) ){ echo esc_attr($_POST['email']);} else { echo '';} ?>" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12">
							<label class="mb-2">Message</label>
							<textarea class="form-control check" id="comments" placeholder="Please enter your message here." name="comments" rows="10" class="form-control" required><?php if( isset( $_POST['comments'] ) && !isset($emailSent) ){ echo esc_attr($_POST['comments']);} else { echo '';} ?></textarea>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12 col-md-6 mb-4 mb-md-0">
							<div class="g-recaptcha brochure__form__captcha" data-sitekey="<?php echo get_option( 'wa_recaptcha_site_key' ); ?>"></div>
						</div>
						<div class="col-12 col-md-6 mb-4 mb-md-0 text-start text-md-end">
							<?php 
							$rand = rand();
							$_SESSION['rand'] = $rand;
							?>
							<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
							<button type="submit"  name="submit" value="Send" class="btn btn-primary">Send Message</button>
						</div>
					</div>
				</fieldset>
			</form>       
		</div>
	</div>
<?php } else { ?>
	<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Failed to create contact form.</div>
	<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Please set your reCAPTCHA site key, secret key and add your email address in Theme Settings.</div>
<?php } ?>