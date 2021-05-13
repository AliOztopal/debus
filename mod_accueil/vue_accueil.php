<?php
if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');

class Vue_Accueil
{
	public function __construct()
	{
	}

	function getAccueil()
	{
		echo "<html>

			<body>
			<p>DEBUS.</p>
			<nav>
				<ul>
					<li><a href=\"index.php?modules=accueil\">Accueil</a></li>
					<li><a href=\"index.php?modules=actu\">Actualités</a></li>
					<li><a href=\"index.php?modules=notifs\">Notifs</a></li>
					<li><a href=\"index.php?modules=profil\">Profil</a></li>
					<li><a href=\"index.php?modules=connexion&action=disconnect\">Deconnexion</a></li>
				</ul>
			</nav>

			<form action=\"index.php?modules=accueil&action=poster\" method=\"POST\">
				Postez votre debus :<br />
				<textarea name=\"contenue\" rows=\"10\" cols=\"50\"></textarea>
				<button action=\"index.php?modules=accueil&action=poster\" method=\"POST\">Poster</button>
			</form>

			</body>
			<html>
		";
	}
	// parcours la liste de debus concernant l'utilsateur et les affiche, à ameliorer
	function afficherTimeLine($debus){
		foreach ($debus as $key => $value) {
			echo "<br>".$value["contenue"];
		}
	}

	// function bouttonDebus()
	// {
	// 	echo "<form method=\"POST\" action=\"index.php?mode=accueil\">
	// 	<input type=\"submit\" name=\"addUser\" value=\"Acceder au Site !\">
	// 	</form>";
	// }

	// function debuspost()
	// {
	// 	echo "<form method=\"POST\" action=\"index.php?modules=accueil\">Postez votre debus :<br />
	// 	<textarea name=\"commentaire\" rows=\"10\" cols=\"50\"></textarea>
	// 	<button>Poster</button>";
	// }
}
