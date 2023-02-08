<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="<?php echo site_url("assets/js/Ajax.js") ; ?>"defer></script>
	<link rel="stylesheet" href="<?php echo site_url("assets/css/Style.css") ; ?>">
	<title>Log In</title>
</head>
<body>
	<!-- login -->
	<section>
		<div class="contain filter-project-items">
			<div class="contain-left filter-project-item" data-project="login">
				<h1>E-Takalo</h1>
				<h4>Please fill your detail to access your account.</h4>
				<form id="run" method="post">
					<input type="email" name="email"  placeholder="Username">
					<input type="password" name="mdp"  placeholder="Password">
					<input  type="submit" value="connexion">
				</form>
				<span class="google">
					<img src="<?php echo site_url("assets/images/google.svg") ; ?> " alt="">Sign whith google
				</span>
				<span class="sign filter-btn" data-project="inscription">
					Don't have an account ?  <a href="InscriptionLo"> Sign up</a>
				</span>
			</div>
			<!-- inscription -->
			<div class="contain-right">
				<img src="<?php echo site_url("assets/images/image.svg")  ; ?>" alt="">
			</div>
		</div>
	</section>
</body>
</html>