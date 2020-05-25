<?php 
	require_once($_SERVER["DOCUMENT_ROOT"] . "/../backend/includes.php");
	
	// If the user is logged in, redirect them to their dashboard from the landing page
	if (isset($_SESSION["user"]))
	{
		redirect("/my/dashboard");
	}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<?php
			build_header("Landing");
		?>
		<meta property="og:title" content="<?php echo(ENVIRONMENT["PROJECT"]["NAME"]); ?>"/>
		<meta property="og:image" content="<?php echo(get_server_host()); ?>/html/img/backdrops/default_compressed.png"/>
		<meta property="og:image:type" content="image/png"/>
		<meta property="og:description" content="<?php echo(ENVIRONMENT["PROJECT"]["NAME"]); ?> is a recreation of a very popular online brick building game. Only <?php echo(ENVIRONMENT["PROJECT"]["NAME"]); ?> allows you to relive childhood memories, create amazing games, and have fun all at the same time. Sign up now!"/>
	</head>
	<body>
		<?php
			build_js();
			build_navigation_bar();
		?>

		<script type="text/javascript" src="<?php echo(get_server_host()); ?>/html/js/register.min.js" async defer></script>
		<script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script type="text/javascript">grecaptcha.execute()</script>

		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center text-md-left mb-5">
                    <h1><img src="/html/img/logos/2016/full.png" class="img-fluid" width="500" alt="<?php echo(ENVIRONMENT["PROJECT"]["NAME"]); ?>"/></h1><hr/>
					<h6 style="line-height: 1.5em"><?php echo(ENVIRONMENT["PROJECT"]["NAME"]); ?> is a recreation of a very popular online brick building game. Only <?php echo(ENVIRONMENT["PROJECT"]["NAME"]); ?> allows you to relive childhood memories, create amazing games, and have fun all at the same time.</h6><br>
					<div class="embed-container"><iframe src="https://www.youtube.com/embed/LTnMKjXEnMY" frameborder="0" allowfullscreen></iframe></div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header purple accent-3 white-text">
							Create an account
						</div>

						<div class="card-body mx-4">
							<form id="register-form">
								<div class="md-form">
									<i class="material-icons prefix grey-text active">person</i>
									<input type="text" id="username" name="username" class="register-input form-control mb-1" required="required">
									<label for="username">Username</label>
									<span class="font-small grey-text mb-1" style="margin-left: 2.5rem">Please choose an appropriate username.</span>
								</div>
								
								<div class="md-form">
									<i class="material-icons prefix grey-text">email</i>
									<input type="email" id="email" name="email" class="register-input form-control mb-1" required="required">
									<label for="email">E-Mail address</label>
									<span class="font-small grey-text mb-1" style="margin-left: 2.5rem">Give us a valid E-Mail address; this will be used for verification.</span>
								</div>
								
								<div class="md-form">
									<i class="material-icons prefix grey-text">vpn_key</i>
									<input type="password" id="password" name="password" class="register-input form-control mb-1" required="required">
									<label for="password">Password</label>
									<span class="font-small grey-text mb-1" style="margin-left: 2.5rem">Passwords are hashed via <a href="https://en.wikipedia.org/wiki/Argon2">Argon2</a>.</span>
								</div>
								
								<div class="md-form">
									<i class="material-icons prefix grey-text">vpn_key</i>
									<input type="password" id="confirmed_password" name="confirmed_password" class="register-input form-control" required="required">
									<label for="confirmed_password">Confirm password</label>
								</div>

								<?php
									if (ENVIRONMENT["PROJECT"]["INVITE_ONLY"]):
								?>

								<div class="md-form mb-4 mt-1">
									<i class="material-icons prefix grey-text">fingerprint</i>
									<input type="text" id="invite_key" name="invite_key" class="register-input form-control mb-1" required="required">
									<label for="invite_key">Invite key</label>
									<span class="font-small grey-text mb-1" style="margin-left: 2.5rem"><?php echo(ENVIRONMENT["PROJECT"]["NAME"]); ?> is currently invite only.</span>
								</div>

								<?php
									endif;
								?>

								<div class="g-recaptcha" data-sitekey="<?php echo(ENVIRONMENT["GOOGLE"]["RECAPTCHA"]["PUBLIC_KEY"]); ?>" data-size="invisible"></div>
								
								<div class="form-check">
									<input type="checkbox" class="register-checkbox form-check-input" id="13confirm" required="required">
									<label class="form-check-label" for="13confirm">I am 13 years old or older</label>
								</div>

								<div class="form-check">
									<input type="checkbox" class="register-checkbox form-check-input" id="read_documents" required="required">
									<label class="form-check-label" for="read_documents">I have read and agree to the <a href="/about/terms-of-service">Terms of Service</a> and the <a href="/about/privacy-policy">Privacy Policy</a></label>
								</div>
								
								<br>
							
								<div class="text-center mb-2 mt-0 pt-0">
									<button type="submit" id="submit" class="register-input btn purple-gradient accent-1 btn-block btn-rounded z-depth-1a waves-effect waves-light" name="submit">Sign Up</button>
								</div>
							</form>
						</div>

						<div class="modal-footer mx-5 pt-3 mb-1">
							<p class="font-small grey-text d-flex justify-content-end">Already a member? <a href="/login" class="blue-text ml-1"> Login</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
			build_footer();
		?>
	</body>
</html>