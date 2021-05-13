<?php
include_once 'cont_inscription.php';

if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
    
class Mod_Inscription
{
	function __construct()
	{
		$controler = new Cont_Inscription();
		
        $controler->registerUser();
	}
}
