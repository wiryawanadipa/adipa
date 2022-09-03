<?php
if( null != get_option( 'wa_recaptcha_site_key' ) && !empty( get_option( 'wa_recaptcha_site_key' ) ) && null != get_option( 'wa_recaptcha_secret_key' ) && !empty( get_option( 'wa_recaptcha_secret_key' ) ) && null != get_option( 'wa_mail' ) && !empty( get_option( 'wa_mail' ) ) ) {
	if(isset($_POST['submit'])) {
		if ($_SESSION['rand'] == $_POST['randcheck']) {
			if(trim($_POST['contactName']) === '') {
				$emptyName = 'Please enter your name.';
				$emptyNameError = true;
			} else {
				$name = trim($_POST['contactName']);
			}

			if(trim($_POST['email']) === '')  {
				$emptyEmail = 'Please enter your email address.';
				$emptyEmailError = true;
			} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
				$invalidEmail = 'You entered an invalid email format address. (e.g. yourname@domain.tld).';
				$invalidEmailError = true;
			} else {
				$email = trim($_POST['email']);
			}

			if(trim($_POST['comments']) === '') {
				$emptyCommentError = true;
				$emptyComment = 'Please enter a message.';
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
				$rsp = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha .'&remoteip='.$ip);
				$valid = json_decode($rsp, true);
				if($valid["success"] == true) {
					$emailTo = get_option( 'wa_mail' );
					$domain = strtoupper($_SERVER['HTTP_HOST']);
					$subject = '[' . $domain . '] From '.$name;
					$body = 'Name: ' . $name . "\n\n" . 'Email:' . $email . "\n\n" . 'Comments:' . $comments;
					$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
					wp_mail($emailTo, $subject, $body, $headers);
					$emailSent = true;
					echo '<div class="p-3 mb-2 bg-success rounded-1">Thank you for contacting me! Your message has been sent. I&lsquo;ll respond to you within 2x24 hours</div>';
				} else {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Invalid captcha.</div>';
				}
			} else {
				if (isset($emptyNameError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> ' . $emptyName . '</div>';
				}
				if (isset($emptyEmailError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> ' . $emptyEmail . '</div>';
				}
				if (isset($invalidEmailError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> ' . $invalidEmail . '</div>';
				}
				if (isset($emptyCommentError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> ' . $emptyComment . '</div>';
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
		<script src="https://www.google.com/recaptcha/api.js?hl=en" async defer></script>
		<div id="content" role="main">
			<form action="" method="post">
				<fieldset>
					<div class="row mb-0 mb-md-4">
						<div class="col-12 col-md-6 mb-4 mb-md-0">
							<input id="cf-name" class="form-control check" name="contactName" type="text" placeholder="Please enter your full name here." value="<?php if( isset( $_POST['contactName'] ) ){ echo esc_attr($_POST['contactName']);} else { echo '';} ?>" required>
						</div>
						<div class="col-12 col-md-6 mb-4 mb-md-0">
							<input id="cf-email" class="form-control check" name="email" type="email" placeholder="Please enter your e-mail address here." value="<?php if( isset( $_POST['email'] ) ){ echo esc_attr($_POST['email']);} else { echo '';} ?>" required>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12">                   
							<textarea class="form-control check" id="comments" placeholder="Please enter your message here." name="comments" rows="10" class="form-control" required><?php if( isset( $_POST['comments'] ) ){ echo esc_attr($_POST['comments']);} else { echo '';} ?></textarea>
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