<?php
include_once"vue_Accueil.php";
if(!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');

class Modele_Accueil extends Connexion{

	function __construct(){
	}

	//Fonction qui insère dans la base de données dans la table debus (titre, contenu, date_debus,id_account )
	function posterDebus($tab){
		try{
		$requete=self::$bdd->prepare("INSERT INTO public.Debus (contenue, date_debus,id_account) VALUES (?,NOW(),?);"); // <== il manque vote + titre + position ?
		$requete->execute(array($tab['contenue'],$tab['id_account']));
		$res= $requete->fetch();// à enlever ?
		}
		catch(PDOexception $e){
			echo $e->getMessage(). $e->getCode();
		}	
	}

	// il faut recuperer les debus concernant l'utilisateur à travers une requete SQL 
	function timeLine(){
		try{
			$requete=self::$bdd->prepare("SELECT * from public.debus INNER JOIN public.abonner on (public.debus.id_account=public.abonner.id_account_compte) where public.abonner.id_account=? ORDER BY date_debus");
			$requete->execute(array($_SESSION['id_account']));
			$res= $requete->fetchAll();//<---- liste des debus
			return $res;
		}
		catch(PDOexception $e){
			echo $e->getMessage(). $e->getCode();
		}	
	}

	// idem id_debus
	function commenterUnDebus(){

	}	
}
