<?php
include_once 'vue_inscription.php';
include_once "connexion.php";

if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');

class Modele_Inscription extends Connexion
{
	function __construct()
	{
		$this->vue = new Vue_Inscription();
	}

	function checkRegister($pseudo)
	{
		try {
			$requete = self::$bdd->prepare("SELECT count(pseudo) as \"Exist account\" FROM public.compte WHERE pseudo=?;");
			$requete->execute(array($pseudo));
			$res = $requete->fetch();
			return $res[0];
		} catch (PDOexception $e) {
			echo $e->getMessage() . $e->getCode();
		}
	}

	function register($account)
	{
		try {
			$mdp=password_hash( $account['mdp'],PASSWORD_DEFAULT);
			$requete = self::$bdd->prepare("INSERT INTO public.compte (pseudo, mdp, mail) VALUES (?,?,?);");
			$result = $requete->execute(array($account['pseudo'], $mdp, $account['email']));
			
		} catch (PDOexception $e) {
			echo $e->getMessage() . $e->getCode();
		}
	}

	function checkAvailableEmail($email)
	{
		try {
			$requete = self::$bdd->prepare("SELECT mail FROM public.compte WHERE mail = ?;");
			$result = $requete->execute(array($email));
			$res = $requete->fetch();
			return empty($res[0]);
		} catch (PDOexception $e) {
			echo $e->getMessage() . $e->getCode();
		}
	}
}
