<!DOCTYPE html>
<html>
	<head>
		<title> Debus - Bienvenue</title>
		<link rel="stylesheet" media="screen" type="text/css" href="./style/style.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="./style/style_accueil.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="./style/style_connexion.css" />
	</head>
	<body>
		<main>
			<!-- code PHP -->
			<?php
			session_start();
			define('CONST_INCLUDE', NULL);

			include_once "connexion.php";
			Connexion::init_connexion();

			$modules = isset($_GET['modules']) ? $_GET['modules'] : "connexion";
			switch ($modules) {

				case "accueil":
					include "./mod_" . $modules . "/mod_" . $modules . ".php";
					$modules = new Mod_Accueil();
					break;
				case "connexion":
					include "./mod_" . $modules . "/mod_" . $modules . ".php";
					$modules = new Mod_Connexion();
					break;
				case "inscription":
					include "./mod_" . $modules . "/mod_" . $modules . ".php";
					$modules = new Mod_Inscription();
					break;
				default:
					die("Erreur");
			}
			?>
		</main>
	</body>
	<!-- <footer>
		<p>Université Paris 8 - 2 rue de la Liberté - 93526 Saint-Denis cedex/ Tel: +33(0)1 49 40 67 89 Fax: +33(0)1 48 21 04 46</p>
	</footer> -->
</html>