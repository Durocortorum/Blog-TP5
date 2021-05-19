<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Projet 5 - BLOG PHP</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

	<link href="public/common-css/bootstrap.css" rel="stylesheet">

	<link href="public/common-css/ionicons.css" rel="stylesheet">

	<link href="public/layout-1/css/styles.css" rel="stylesheet">

	<link href="public/layout-1/css/responsive.css" rel="stylesheet">

</head>

<body>

	<header>
		<div class="container-fluid position-relative no-side-padding">

			<a href="#" class="logo">MON BLOG</a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="Accueil">Home</a></li>
				<?php if (isset($_SESSION['id'])) {
				?>
					<li><a href="User">Mon Profil</a></li>

					<?php
					if ($_SESSION['admin'] == "true") {
					?>
						<li><a href="user&admin=true">Liste Users</a></li>
						<li><a href="commentaire">Commentaires</a></li>
					<?php
					}
					?>
					<?php
					if ($_SESSION['redacteur'] == "true") {
					?>
						<li><a href="newPost">Nouveau Post</a></li>
						<li><a href="post&admin=true">Liste Posts</a></li>
					<?php
					}
					?>
					<li><a href="connexion&disconnect=true">Déconnexion</a></li>
				<?php
				} else {
				?>
					<li><a href="Connexion">Connexion</a></li>
					<li><a href="Inscription">Inscription</a></li>
				<?php
				}
				?>
			</ul>

		</div>
	</header>

	<?= $content ?>

	<footer style=" background-color:#EDF3F3">
		<div class="container" style="width:80%; background-color:#EDF3F3">
			<div class="row">
				<div class="col-lg-12 col-md-6">
					<div class="footer-section text-center">
						<p>Tous droits réservés</p>

						<ul class="icons">
							<li><a href="https://www.facebook.com/DescotesMichel"><i class="ion-social-facebook-outline"></i></a></a></li>
							<li><a href="https://twitter.com/home"><i class="ion-social-twitter-outline"></i></a></li>
							<li><a href="https://www.instagram.com/?hl=fr"><i class="ion-social-instagram-outline"></i></a></li>
							<li><a href="https://www.linkedin.com/in/michel-descotes-92ab0157//?hl=fr"><i class="ion-social-linkedin-outline"></i></a></li>
							<li><a href="https://github.com/Durocortorum"><i class="ion-social-github-outline"></i></a></li>
						</ul>

					</div>
				</div>
				<div class="col-lg-12 col-md-6">
					<div class="footer-section p-2 text-center">

						<h4 class="title"><b>Contactez-Nous</b></h4>
						<form method="post" action="Accueil">

							<input class="text-input" name="nom_prenom" type="text" placeholder="NOM et Prénom"><br><br>

							<input class="email-input" name="email" type="text" placeholder="E-mail"><br><br>

							<textarea name="message" placeholder="Message..." cols="40"></textarea><br><br>
							<button class="submit-btn btn btn-primary shadow-sm" type="submit" name="form_button">Envoyer</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- SCRIPTS -->

	<script src="public/common-js/jquery-3.1.1.min.js"></script>

	<script src="public/common-js/tether.min.js"></script>

	<script src="public/common-js/bootstrap.js"></script>

	<script src="public/common-js/scripts.js"></script>

</body>

</html>