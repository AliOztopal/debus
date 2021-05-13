<?php
include_once 'vue_Accueil.php';
include_once 'modele_Accueil.php';

if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');

class Cont_Accueil
{

	private $modele;
	private $vue;



	public function __construct()
	{

		$this->vue = new Vue_Accueil();
		$this->modele = new Modele_Accueil();
	}

	public function getAffichageAccueil()
	{
		$this->vue->getAccueil();
	}

	public function timeLine(){
		$debus=$this->modele->timeLine();// recup les debus de nos abonnées nou même inclus
		$this->vue->afficherTimeLine($debus);
	}

	public function postD()
	{
		$contenue=$_REQUEST["contenue"];
		$id_account=$_SESSION["id_account"];
		$tab=array("id_account"=>$id_account, "contenue"=>$contenue);
		$this->modele->posterDebus($tab);
	}

	public function commentD()
	{
		$this->modele->commenterUnDebus();
	}
}
