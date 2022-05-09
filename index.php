<?php

// Contrôleur frontal : instancie un routeur pour traiter la requête entrante

require 'Framework/Routeur.php';


if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || 
	strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false) {

	$chaine = explode("/", ltrim($_SERVER["REQUEST_URI"], '/'));

	$controleur = isset($chaine[0]) ? $chaine[0] : null;
	$action = isset($chaine[1]) ? $chaine[1] : null;
	$id = isset($chaine[2]) ? $chaine[2] : null;

	if (strpos($id, '?') !== false) {
		$id = intval(substr($id, 0, strpos($id, '?')));
	}

	$_GET['controleur'] = htmlEntities($controleur);
	$_GET['action'] = htmlEntities($action);
	$_GET['id'] = htmlEntities($id);
}



$routeur = new Routeur();
$routeur->routerRequete();


