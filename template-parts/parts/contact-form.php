<?php
if (
	null != get_option('wa_recaptcha_site_key')
	&& !empty(get_option('wa_recaptcha_site_key'))
	&& null != get_option('wa_recaptcha_secret_key')
	&& !empty(get_option('wa_recaptcha_secret_key'))
	&& null != get_option('wa_mail')
	&& !empty(get_option('wa_mail'))
) {
	$maxMessageChar = 1000;
	if (isset($_POST['submit'])) {
		$sanitizename = sanitize_text_field($_POST['sname']);
		$sanitizeemail = sanitize_text_field($_POST['email']);
		$sanitizemessage = sanitize_textarea_field($_POST['message']);
		$sanitizesubject = sanitize_text_field($_POST['subject']);
		$countName = mb_strlen($sanitizename);
		$countEmail = mb_strlen($sanitizeemail);
		$newLines = substr_count($sanitizemessage, "\n");
		$countMessage = (mb_strlen($sanitizemessage) - $newLines);
		if ($_SESSION['rand'] == $_POST['randcheck']) {
			if ($sanitizename === '') {
				$emptyNameError = true;
			} else if ($countName > 50) {
				$longNameError = true;
			} else {
				$name = $sanitizename;
			}

			if ($sanitizeemail === '')  {
				$emptyEmailError = true;
			} else if ($countEmail > 80) {
				$longEmailError = true;
			} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,6}$/i", $sanitizeemail)) {
				$invalidEmailError = true;
			} else {
				$email = $sanitizeemail;
			}

			if ($sanitizemessage === '') {
				$emptyMessageError = true;
			} else if ($countMessage > $maxMessageChar) {
				$longMessageError = true;
			} else {
				$message = $sanitizemessage;
			}

			if ($sanitizesubject === '')  {
				$emptySubjectError = true;
			}

			if (
				!isset($emptyNameError)
				&& !isset($longNameError)
				&& !isset($emptyEmailError)
				&& !isset($longEmailError)
				&& !isset($invalidEmailError)
				&& !isset($emptyMessageError)
				&& !isset($longMessageError)
				&& isset($emptySubjectError)
				&& !empty($_POST['g-recaptcha-response'])
			) {
				$rsp = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . get_option('wa_recaptcha_secret_key') . '&response=' . $_POST['g-recaptcha-response'] .'&remoteip='. $_SERVER['REMOTE_ADDR']);
				$valid = json_decode($rsp, true);
				if ($valid["success"] == true) {
					$emailTo = get_option('wa_mail');
					$domain = strtoupper($_SERVER['HTTP_HOST']);
					$subject = '[' . $domain . '] From ' . $name;
					$body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Message: ' . $message;
					$headers = 'From: ' . $name . ' <wordpress@' . $_SERVER['SERVER_NAME'] . '>' . "\r\n" . 'Reply-To: ' . $email;
					$mail = wp_mail($emailTo, $subject, $body, $headers);
					if ($mail) {
						echo '<div class="info success">Thank you for contacting me! Your message has been sent. I&lsquo;ll respond your message within 2x24 hours.</div>';
						$emailSent = true;
					} else {
						echo '<div class="info danger">Message was not sent. There is a problem with the server right now. Please try again. If the problem still persist you could contact me directly via social media.</div>';
					}
				} else {
					echo '<div class="info danger">Invalid captcha.</div>';
				}
			} else {
				if (isset($emptyNameError)) {
					echo '<div class="info danger">Please enter your name.</div>';
				}

				if (isset($longNameError)) {
					echo '<div class="info danger">The name that you filled in the name form is too long. The name form should be no more than 50 characters.</div>';
				}

				if (isset($emptyEmailError)) {
					echo '<div class="info danger"> Please enter your email address.</div>';
				}

				if (isset($invalidEmailError)) {
					echo '<div class="info danger">You entered an invalid email format address. (e.g. yourname@domain.tld).</div>';
				}

				if (isset($longEmailError)) {
					echo '<div class="info danger">Your email address is too long. Use an email address which is no more than 80 characters.</div>';
				}

				if (isset($emptyMessageError)) {
					echo '<div class="info danger">Please enter a message.</div>';
				}

				if (isset($longMessageError)) {
					echo '<div class="info danger">Your message is too long. Message should be no more than' . $maxMessageChar . 'characters.</div>';
				}

				if (!isset($emptySubjectError)) {
					echo '<div class="info danger">SPAMMER!</div>';
				}

				if (empty($_POST['g-recaptcha-response'])) {
					echo '<div class="info danger">Please check the captcha.</div>';
				}
			}
		} elseif ($_SESSION['rand'] != $_POST['randcheck']) {
			echo '<div class="info danger">Please fill the form and check the captcha</div>';
		}
	}
	?>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<form action="" method="post">
		<fieldset>
			<div class="contact-form">
				<div class="contact-form-input">
					<label for="sname">Name<span>&#42;</span></label>
					<input id="sname" name="sname" type="text" placeholder="Please enter your name here." maxlength="50" value="<?php if (isset($_POST['sname']) && !isset($emailSent)) { echo $sanitizename; } else { echo ''; } ?>" required>
				</div>
				<div class="contact-form-input">
					<label for="email">E-Mail<span>&#42;</span></label>
					<input id="email" name="email" type="email" placeholder="Please enter your e-mail address here." maxlength="80" value="<?php if (isset($_POST['email']) && !isset($emailSent)) { echo $sanitizeemail; } else { echo ''; } ?>" required>
				</div>
				<div class="contact-form-input">
					<label for="message">Message<span>&#42;</span></label>
					<textarea id="message" name="message" placeholder="Please enter your message here." maxlength="<?php echo $maxMessageChar; ?>" rows="11" required><?php if (isset($_POST['message']) && !isset($emailSent)) { echo $sanitizemessage; } else { echo ''; } ?></textarea>
				</div>
				<div class="hidden-form">
					<label>If you see this, leave this form field blank.</label>
					<input name="subject" type="text" tabindex="-1" autocomplete="off">
				</div>
				<?php
				if (isset($_POST['submit'])) {
					if ($countMessage > $maxMessageChar - 1) {
						$color = 'text-danger';
					} elseif ($countMessage < $maxMessageChar && $countMessage > $maxMessageChar * (90 / 100)) {
						$color = 'text-warning';
					} else {
						$color = 'text-light';
					}
				} else {
					$color = 'text-light';
				}
				?>
				<div id="messagecharcounter" class="<?php echo $color; ?>">
					<span id="typedchar"><?php if (isset($_POST['message']) && !isset($emailSent)) { echo $countMessage; } else { echo '0'; } ?> / <?php echo $maxMessageChar; ?></span>
				</div>
				<script>
				const messageElement = document.querySelector("#message");
				const characterCounterElement = document.querySelector("#messagecharcounter");
				const typedCharElement = document.querySelector("#typedchar");
				const maxChar = <?php echo $maxMessageChar; ?>;
				messageElement.addEventListener("input", e => {
					const typedChar = messageElement.value.length;
					if (typedChar > maxChar) {
						return false;
					}
					typedCharElement.textContent = typedChar + " / " + maxChar;
					if (typedChar > maxChar - 1) {
						characterCounterElement.classList = "text-danger";
					} else if (typedChar < maxChar && typedChar > maxChar * (90 / 100)) {
						characterCounterElement.classList = "text-warning";
					} else if (typedChar < maxChar - ((maxChar * (10 / 100)) - 1)) {
						characterCounterElement.classList = "text-light";
					}
				});
				</script>
				<div class="bottom-form">
					<div class="g-recaptcha brochure__form__captcha" data-sitekey="<?php echo get_option('wa_recaptcha_site_key'); ?>"></div>
					<div class="form-submit">
						<?php 
						$rand = rand();
						$_SESSION['rand'] = $rand;
						?>
						<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
						<button type="submit" aria-label="Submit Button" name="submit" value="Send" class="btn btn-primary">Send Message</button>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
<?php
} else {
	echo '<div class="info danger">Failed to create contact form.</div>';
	echo '<div class="info danger">Please set your reCAPTCHA site key, secret key and add your email address in Theme Settings.</div>';
}
