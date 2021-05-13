<?php
include_once 'cont_Accueil.php';

if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');


class Mod_Accueil
{

	function __construct()
	{
		$controler = new Cont_Accueil();
		$controler->getAffichageAccueil();
		$controler->timeLine();
		if(isset($_GET["action"])){
			$action=$_GET["action"];
		}else{
			$action="accueil";
		}
		switch($action){
			case "poster": 
			$controler->postD();
			break;

			default: // l'action accueil est compris dedans
			break;
		}
	}
}
?>
