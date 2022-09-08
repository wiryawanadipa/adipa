<?php
if ( null != get_option( 'wa_recaptcha_site_key' ) && !empty( get_option( 'wa_recaptcha_site_key' ) ) && null != get_option( 'wa_recaptcha_secret_key' ) && !empty( get_option( 'wa_recaptcha_secret_key' ) ) && null != get_option( 'wa_mail' ) && !empty( get_option( 'wa_mail' ) ) ) {
	if (isset($_POST['submit'])) {
		$sanitizecontactName = sanitize_text_field($_POST['contactName']);
		$sanitizeemail = sanitize_text_field($_POST['email']);
		$sanitizemessage = sanitize_textarea_field($_POST['message']);
		if ($_SESSION['rand'] == $_POST['randcheck']) {
			if ($sanitizecontactName === '') {
				$emptyNameError = true;
			} else if (strlen($sanitizecontactName) > 50) {
				$longNameError = true;
			} else {
				$name = $sanitizecontactName;
			}
			if ($sanitizeemail === '')  {
				$emptyEmailError = true;
			} else if (strlen($sanitizeemail) > 80) {
				$longEmailError = true;
			} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,6}$/i", $sanitizeemail)) {
				$invalidEmailError = true;
			} else {
				$email = $sanitizeemail;
			}
			if ($sanitizemessage === '') {
				$emptyMessageError = true;
			} else if (strlen($sanitizemessage) > 1000) {
				$longMessageError = true;
			} else {
				$message = $sanitizemessage;
			}
			if (!isset($emptyNameError) && strlen($sanitizecontactName) < 51 && !isset($emptyEmailError) && strlen($sanitizeemail) < 81 && !isset($invalidEmailError) && !isset($emptyMessageError) && strlen($sanitizemessage) < 1001 && !empty($_POST['g-recaptcha-response'])) {
				$secret = get_option( 'wa_recaptcha_secret_key' );
				$ip = $_SERVER['REMOTE_ADDR'];
				$captcha = $_POST['g-recaptcha-response'];
				$rsp = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha .'&remoteip='. $ip);
				$valid = json_decode($rsp, true);
				if ($valid["success"] == true) {
					$emailTo = get_option( 'wa_mail' );
					$domain = strtoupper($_SERVER['HTTP_HOST']);
					$subject = '[' . $domain . '] From ' . $name;
					$body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Message: ' . $message;
					$headers = 'From: ' . $name . ' <wordpress@' . $_SERVER['SERVER_NAME'] . '>' . "\r\n" . 'Reply-To: ' . $email;
					$mail = wp_mail($emailTo, $subject, $body, $headers);
					if ($mail) {
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
				if (isset($longNameError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> The name that you filled in the name form is too long. The name form should be no more than 50 characters.</div>';
				}
				if (isset($emptyEmailError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Please enter your email address.</div>';
				}
				if (isset($invalidEmailError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> You entered an invalid email format address. (e.g. yourname@domain.tld).</div>';
				}
				if (isset($longEmailError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Your email address is too long. Use an email address which is no more than 80 characters.</div>';
				}
				if (isset($emptyMessageError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Please enter a message.</div>';
				}
				if (isset($longMessageError)) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Your message is too long. Message should be no more than 1000 characters.</div>';
				}
				if (empty($_POST['g-recaptcha-response'])) {
					echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Please check the captcha.</div>';
				}
			}
		} elseif ($_SESSION['rand'] != $_POST['randcheck']) {
			echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Please fill the form and check the captcha</div>';
		}
	}
	?>
	<div class="my-4 contact-form">
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<div id="content" role="main">
			<form action="" method="post">
				<fieldset>
					<div class="row mb-0 mb-md-3">
						<div class="col-12 col-md-6 mb-3 mb-md-0">
							<label class="mb-2">Name<span>&#42;</span></label>
							<input class="form-control" name="contactName" type="text" placeholder="Please enter your name here." maxlength="50" value="<?php if ( isset( $_POST['contactName'] ) && !isset($emailSent) ) { echo $sanitizecontactName; } else { echo ''; } ?>" autofocus required>
						</div>
						<div class="col-12 col-md-6 mb-3 mb-md-0">
							<label class="mb-2">E-Mail<span>&#42;</span></label>
							<input class="form-control" name="email" type="email" placeholder="Please enter your e-mail address here." maxlength="80" value="<?php if ( isset( $_POST['email'] ) && !isset($emailSent) ) { echo $sanitizeemail; } else { echo ''; } ?>" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12">
							<label class="mb-2">Message<span>&#42;</span></label>
							<textarea id="message" class="form-control" placeholder="Please enter your message here." maxlength="1000" name="message" rows="10" required><?php if ( isset( $_POST['message'] ) && !isset($emailSent) ) { echo $sanitizemessage; } else { echo ''; } ?></textarea>
						</div>
					</div>
					<div id="messagecharcounter" class="mb-3 text-end text-light">
						<span id="typedchar"><?php if ( isset( $_POST['message'] ) && !isset($emailSent) ) { echo strlen($sanitizemessage); } else { echo '0'; } ?></span>
						<span id="maxchar">/ 1000</span>
					</div>
					<script>
					const messageElement = document.querySelector("#message");
					const characterCounterElement = document.querySelector("#messagecharcounter");
					const typedCharElement = document.querySelector("#typedchar");
					const maxChar = 1000;
					message.addEventListener("input", event => {
						const typedChar = message.value.length;
						if (typedChar > maxChar) {
							return false;
						}
						typedCharElement.textContent = typedChar;
						if (typedChar > maxChar-1) {
							characterCounterElement.classList = "mb-3 text-end text-danger";
						} else if (typedChar < maxChar && typedChar > maxChar-100) {
							characterCounterElement.classList = "mb-3 text-end text-warning";
						} else if (typedChar < maxChar-99) {
							characterCounterElement.classList = "mb-3 text-end text-light";
						}
					});
					</script>
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