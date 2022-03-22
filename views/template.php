<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">

	
	<?php
	//Compteur de vues accueil footer
	$monfichier = fopen('compteur.txt', 'r+');
 
	$pages_vues = fgets($monfichier); // On lit la première ligne (nombre de vues)
	$pages_vues += 1; // On augmente de 1 ce nombre de pages vues
	fseek($monfichier, 0); // On remet le curseur au début du fichier
	fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues
 
	fclose($monfichier); 
	?>

	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="public/common-css/bootstrap.css" rel="stylesheet">

	<link href="public/common-css/ionicons.css" rel="stylesheet">


	<link href="public/layout-1/css/styles.css" rel="stylesheet">

	<link href="public/layout-1/css/responsive.css" rel="stylesheet">

</head>
<body >

	<header>
		<div class="container-fluid position-relative no-side-padding">

			<a href="http://localhost/blog-mvc-master/" class="logo"><img src="public/images/logos.png" alt="Logo Image"></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="/">Accueil</a></li>
				<li><a href="viewListPost.php">Blog</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="login.php">Se connecter</a></li>
			</ul><!-- main-menu -->

			<div class="src-area">
				<form>
					<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input class="src-input" type="text" placeholder="Type of search">
				</form>
			</div>

		</div><!-- conatiner -->
	</header>
	<?php if(isset($_SESSION["error"])): ?>
		<p class="alert alert-danger"><?= $_SESSION["error"] ?></p>
		
		<?php unset($_SESSION["error"]); endif; ?>

  <?= $content ?>






	<footer>

		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<a class="logo" href="http://localhost/blog-mvc-master/"><img src="public/images/logos.png" alt="Logo Image"></a>
						<p class="ion-eye" class="copyright"> - Cette page a été vue <?php echo $pages_vues;?> fois !</p>
						<p class="copyright">Maxime Schubas 2022. All rights reserved. ©</p>
						<p class="copyright">Mes musiques <a href="https://soundcloud.com/maxime-schubas" target="_blank">>♫ Soundcloud ♫<</a></p>
						<ul class="icons">
							<li><a href="https://www.facebook.com/maxime.s.schubas/" target="_blank"><i class="ion-social-facebook-outline"></i></a></li>
							<li><a href="https://mobile.twitter.com/maks92i" target="_blank"><i class="ion-social-twitter-outline"></i></a></li>
							<li><a href="https://www.twitch.tv/maks92i" target="_blank"><i class="ion-social-twitch-outline"></i></a></li>
							<li><a href="https://github.com/Maxdev92" target="_blank"><i class="ion-social-github-outline"></i></a></li>
						</ul>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
						<div class="footer-section">
						<h4 class="title"><b>CATEGORIES</b></h4>
						<ul>
							<li><a href="#">ESPACE</a></li>
							<li><a href="#">SANTE</a></li>
							<li><a href="#">MUSIQUE</a></li>
						</ul>
						<ul>
							<li><a href="#">SPORT</a></li>
							<li><a href="#">DESIGN</a></li>
							<li><a href="#">VOYAGE</a></li>
						</ul>
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<h4 class="title"><b>SUBSCRIBE</b></h4>
						<div class="input-area">
							<form>
								<input class="email-input" type="text" placeholder="Enter your email">
								<button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
							</form>
						</div>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
		</div><!-- container -->
	</footer>


	<!-- SCIPTS -->

	<script src="public/common-js/jquery-3.1.1.min.js"></script>

	<script src="public/common-js/tether.min.js"></script>

	<script src="public/common-js/bootstrap.js"></script>

	<script src="public/common-js/scripts.js"></script>

</body>
</html>
