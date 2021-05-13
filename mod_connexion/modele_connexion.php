<?php
include_once "vue_connexion.php";
include_once "connexion.php";

if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');

class Modele_Connexion extends Connexion
{
	function __construct()
	{
		$this->vue = new Vue_Connexion();
	}

	function login($pseudo, $unHashMdp)
	{
		try {
			$requete = self::$bdd->prepare("SELECT mdp FROM public.compte WHERE pseudo=?;");
			$requete->execute(array($pseudo));
			$res = $requete->fetch();
			$isValidPass = password_verify($unHashMdp, $res[0]);
			return $isValidPass;
		} catch (PDOexception $e) {
			echo $e->getMessage() . $e->getCode();
		}
	}
	// on commence une session pour y integrer les informations essentiels
	function initSession($pseudo)
	{
		try {
			$requete = self::$bdd->prepare("SELECT id_account FROM public.compte WHERE pseudo=?;");
			$requete->execute(array($pseudo));
			$res = $requete->fetch();
			$_SESSION["id_account"] = $res[0]; // on integre l'id du compte courant
		} catch (PDOexception $e) {
			echo $e->getMessage() . $e->getCode();
		}
	}
}
