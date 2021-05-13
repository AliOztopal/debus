<?php
if (!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');
class Connexion
{
	protected static $bdd;

	public static function init_connexion()
	{
		//SABRINA
		/*$host='localhost';
			$dbname='debus';
			$username='user2'; 
			$password='user';
			$port='5432';*/

		//AMINE 
		/*	$host="127.0.0.1";
			$dbname="Debus";
			$username="user1"; 
			$password="user";
			$port="5432";
		*/
		
		//ALI
		$host = 'localhost';
		$dbname = 'Debus';
		$username = 'Nouuxs';
		$password = 'user';
		$port = '5432';
	
		$dns = "pgsql:host=$host;port=$port;dbname=$dbname;user=$username;password=$password";
		self::$bdd = new PDO($dns);
	}
}
