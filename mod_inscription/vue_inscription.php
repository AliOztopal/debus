<?php
if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');

class Vue_Inscription
{

	public function __construct(){}

	function form_register($messageErreur)
	{
		if (strlen($messageErreur) > 0) {
		echo "
				<div id=\"connexion_error\">
					<span> $messageErreur </span>
				</div>
			";
		}
		echo "
			<form action=\"index.php?modules=inscription\" method=\"post\">
				<span>Pseudo : <input type=\"text\" name=\"pseudo\" /></span>
				<span>Email : <input type=\"email\" name=\"email\" /></span>
				<span>Mot de passe : <input type=\"password\" name=\"mdp\" /></span>
				<span>Confirmer mot de passe : <input type=\"password\" name=\"confirm_mdp\" /></span>
				<input type=\"submit\" value=\"S'inscrire\">
			</form>
		";
	}
}
