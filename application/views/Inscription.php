<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="<?php echo site_url("assets/js/AjaxInscription.js") ; ?>"defer></script>
	<link rel="stylesheet" href="<?php echo site_url("assets/css/Style.css") ; ?>">
	<title>Sign In</title>
</head>
<body>
	<section>
			<!-- inscription -->
        <div class="contain">
			<div class="contain-left filter-project-item" data-project="inscription">
				<h1>E-Takalo</h1>
				<h4>Please fill your detail to access your account.</h4>
				<form id="inscription" method="post">
					<input type="text" name="name"  placeholder="Username" required>
					<input type="email" name="emailnew"  placeholder="Email" required>
					<input type="password" name="mdpnew"  placeholder="Password" required>
					<input  type="submit" value="Inscription">
				</form>
				<span class="google">
					<img src="<?php echo site_url("assets/images/google.svg") ; ?> " alt="">Sign whith google
				</span>
				<span class="sign filter-btn" data-project="login">
                    <a href="Begin">Log in</a>
				</span>
			</div>
			<div class="contain-right">
				<img src="<?php echo site_url("assets/images/image.svg")  ; ?>" alt="">
			</div>
		</div>
	</section>
</body>
</html>