<?php
if(isset($_POST['submit'])) {
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

	if(!empty($_POST['g-recaptcha-response'])){
		$secret = get_option( 'wa_recaptcha' );
		$ip = $_SERVER['REMOTE_ADDR'];
		$captcha = $_POST['g-recaptcha-response'];
		$rsp = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha .'&remoteip='.$ip);
		$array = json_decode($rsp, TRUE);
		if($array["success"]) {
		}
	} else {
		echo '<div class="p-3 mb-2 bg-danger rounded-1"><i class="fa-solid fa-triangle-exclamation"></i> Please check the captcha.</div>';
	}

	if(!isset($emptyNameError) && !isset($emptyEmailError) && !isset($invalidEmailError) && !isset($emptyCommentError) && !empty($_POST['g-recaptcha-response'])) {
		$emailTo = get_option( 'wa_mail' );;
		$subject = '[wiryawanadipa.com] From '.$name;
		$body = 'Name: ' . $name . "\n\n" . 'Email:' . $email . "\n\n" . 'Comments:' . $comments;
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
		echo '<div class="p-3 mb-2 bg-success rounded-1">Thank you for contacting me! Your message has been sent. I&lsquo;ll respond to you within 2x24 hours</div>';
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
	}
}
?>
<div class="col-12 py-4">
	<script src="https://www.google.com/recaptcha/api.js?hl=en" async defer></script>
	<div id="content" role="main">
		<form action="" id="contactForm" method="post">
			<fieldset>
				<div class="form-group mb-4">
					<div class="col-12">
						<input id="cf-name" name="contactName" type="text" placeholder="Please enter your full name here." class="form-control" value="<?php if( isset( $_POST['contactName'] ) ){ echo esc_attr($_POST['contactName']);} else { echo '';} ?>" >
					</div>
				</div>
				<div class="form-group mb-4">
					<div class="col-12">
						<input id="cf-email" name="email" type="email" placeholder="Please enter your e-mail address here." class="form-control" value="<?php if( isset( $_POST['email'] ) ){ echo esc_attr($_POST['email']);} else { echo '';} ?>" >
					</div>
				</div>
				<div class="form-group mb-4">
					<div class="col-12">                   
						<textarea class="form-control" id="comments" placeholder="Please enter your message here." name="comments" rows="10" class="form-control" ><?php if( isset( $_POST['comments'] ) ){ echo esc_attr($_POST['comments']);} else { echo '';} ?></textarea>
					</div>
				</div>
				<div class="form-group mb-4">
					<div class="col-12">
						<div class="g-recaptcha brochure__form__captcha" data-sitekey="<?php echo get_option( 'wa_recaptcha' ); ?>"></div>
					</div>
				</div>
				<div class="form-group mb-4">
					<div class="col-12">
						<button type="submit"  name="submit" value="Send" class="btn btn-primary">Send Message</button>
					</div>
				</div>
			</fieldset>
		</form>       
	</div>
</div>