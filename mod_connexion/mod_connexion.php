<?php
include_once 'cont_connexion.php';
if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');
class Mod_Connexion
{
	function __construct()
	{
		$controler = new cont_Connexion();
		
		if (isset($_GET['action']) && $_GET['action'] == 'disconnect') {
			$controler->deconnexion();	
		}

		if (isset($_SESSION['pseudo'])) {
			$controler->redirectAccueil();
		} else  {
			$controler->connexionUser();
		}
	}
}
