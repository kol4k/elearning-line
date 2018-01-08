<!doctype html>
<html lang="en" class="fullscreen-bg">
	
<!-- Mirrored from demo.thedevelovers.com/dashboard/klorofilpro-v1.6/html/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Jan 2018 07:40:40 GMT -->
<head>
		<title>Register | Klorofil Pro - Bootstrap Admin Dashboard Template</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- VENDOR CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/vendor/themify-icons/css/themify-icons.css">
		<!-- MAIN CSS -->
		<link rel="stylesheet" href="assets/css/main.min.css">
		<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
		<link rel="stylesheet" href="assets/css/demo.min.css">
		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
		<!-- ICONS -->
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
		<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	</head>
	<body>
		<!-- WRAPPER -->
		<div id="wrapper">
			<div class="vertical-align-wrap">
				<div class="vertical-align-middle">
					<div class="auth-box register">
						<div class="content">
							<div class="header">
								<div class="logo text-center">
									<!-- <img src="assets/img/logo-dark.png" alt="Klorofil Logo"> -->
								</div>
								<p class="lead">Create an account</p>
							</div>
							<form class="form-auth-small" method="POST" action="{{ Route('register') }}">
								<div class="form-group">
									<label for="signup-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Your email">
								</div>
								<div class="form-group">
									<label for="signup-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
								<div class="bottom">
									<span class="helper-text">Already have an account? <a href="page-login.html">Login</a></span>
								</div>
							</form>
							<div class="separator-linethrough">
								<span>OR</span>
							</div>
							<button class="btn btn-signin-social"><i class="fa fa-facebook-official facebook-color"></i> Sign in with Facebook</button>
							<button class="btn btn-signin-social"><i class="fa fa-twitter twitter-color"></i> Sign in with Twitter</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END WRAPPER -->
	</body>

<!-- Mirrored from demo.thedevelovers.com/dashboard/klorofilpro-v1.6/html/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Jan 2018 07:40:40 GMT -->
</html>