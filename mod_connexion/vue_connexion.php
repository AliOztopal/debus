<?php
if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');

class Vue_Connexion
{
	public function __construct()
	{
	}

	function form_connexion($messageErreur)
	{

		if (strlen($messageErreur) > 0) {
			echo "
				<div id=\"connexion_error\">
					<span> $messageErreur </span>
				</div>
			";
		}
		echo "
			
			<div id=\"connexion_content\">
				<span>Se connecter sur Debus</span>
				<div id=\"connexion_form\">
					<form action=\"index.php?modules=connexion\" method=\"post\">
						<span>Pseudo <input type=\"text\" name=\"pseudo\" /></span>
						<span>Mot de passe <input type=\"password\" name=\"mdp\" /></span>
						<input type=\"submit\" value=\"Connexion\">
					</form>
				</div>
				<div id=\"connexion_inscription\">
					<a href=\"index.php?modules=inscription\">S'inscrire sur Debus</a>
				</div>
			</div>
		";
	}

	function retour_accueil()
	{
		echo "
			<form method=\"POST\" action=\"index.php?modules=accueil\">
				<input type=\"submit\" name=\"addUser\" value=\"Acceder au Site !\">
			</form>
			<form method=\"POST\" action=\"index.php?modules=connexion&action=disconnect\">
				<input type=\"submit\" value=\"Deconnexion\">
			</form>
		";
	}
}
