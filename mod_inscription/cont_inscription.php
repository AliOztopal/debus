<?php
include_once 'vue_inscription.php';
include_once './mod_connexion/vue_connexion.php';
include_once 'modele_inscription.php';

if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');

class Cont_Inscription
{
	private $modele;
	private $vue;
	private $vue_connexion;

	public function __construct()
	{
		$this->vue = new Vue_inscription();
		$this->vue_connexion = new Vue_Connexion();
		$this->modele = new Modele_inscription();
	}

	public function registerUser()
	{
		if (isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['email']) && isset($_POST['confirm_mdp'])) {
			// Verification si les champs sont vides
			if (!$this->checkIfEmpty()) {
				$this->vue->form_register("Veuillez renseigner tous les champs");
				return;
			}

			if (!$this->modele->checkAvailableEmail($_POST['email'])) {
				$this->vue->form_register("Email déjà utilisé");
				return;
			}

			if ($this->checkPasswords()) {
				$hasError = $this->modele->checkRegister($_POST['pseudo']) == 0 ? false : true;
				if ($hasError == true) {
					// Compte déjà existant
					$this->vue->form_register("Compte déjà existant");
				} else {
					// Compte "libre", on peut faire l'inscription
					$account = array("pseudo" => $_POST['pseudo'], "mdp" => $_POST['mdp'], "email" => $_POST['email']);
					$this->modele->register($account);
					$this->vue_connexion->form_connexion("");
				}
				return;
			}

			$this->vue->form_register("Les deux mots de passe ne correspondent pas");
		} else {
			$this->vue->form_register("");
		}
	}

	public function checkPasswords()
	{
		// verifie que les deux mots de passe ne concordent pas.
		$mdp1 = $_POST['mdp'];
		$mdp2 = $_POST['confirm_mdp'];
		if ($mdp1 == $mdp2) {
			return true;
		} else {
			return false;
		}
	}

	public function checkIfEmpty()
	{
		$mdp = $_POST['mdp'];
		$email = $_POST['email'];
		$pseudo = $_POST['pseudo'];
		$liste = array($mdp, $email, $pseudo);
		foreach ($liste as $value) {
			if (empty($value)) {
				return false;
			}
		}
		return true;
	}
}
