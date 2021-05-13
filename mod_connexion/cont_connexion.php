<?php
include_once 'vue_connexion.php';
include_once 'modele_connexion.php';

if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');

class Cont_Connexion
{
	private $modele;
	private $vue;
	private $vue_accueil;

	public function __construct()
	{
		$this->vue = new Vue_Connexion();
		$this->modele = new Modele_Connexion();
	}

	public function connexionUser()
	{
		$message = "";

		if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
			// Verification si les champs sont vides
			if (empty($_POST['pseudo']) || empty($_POST['mdp'])) {
				$this->vue->form_connexion("Veuillez renseigner tous les champs");
				return;
			}

			$pseudo = $_POST['pseudo'];
			$hasError = $this->modele->login($pseudo, $_POST['mdp']) == 1 ? false : true;
			if ($hasError == true) {
				// Mauvais login
				$this->vue->form_connexion("Mauvais pseudo ou mot de passe");
			} else {
				// Bon login
				//$this->initSession($pseudo);
				$_SESSION['pseudo'] = $pseudo;
				$this->redirectAccueil();
			}
		} else {
			$this->vue->form_connexion($message);
		}
	}

	function redirectAccueil()
	{
		// TODO Ajouter la vue à l'accueil quand ce sera fait
		$this->vue->retour_accueil();
	}

	function deconnexion()
	{
		$_SESSION = array();
		session_destroy();
	}
}
