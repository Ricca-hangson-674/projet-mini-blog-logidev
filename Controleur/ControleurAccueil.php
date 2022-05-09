<?php

require_once 'ControleurSecurise.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Article.php';

/**
 * Contrôleur gérant la page accueil front office au site
 */
class ControleurAccueil extends ControleurSecurise {

    private $article;

    public function __construct() {
        $this->article = new Article();
    }

    // Affiche la liste de tous les Articles du blog
    public function index() {

        $utilisateur = $this->requete->getSession()->getAttribut("login");
    	
        $articles = $this->article->getArticles();
        $this->genererVue(array('articles' => $articles, 'utilisateur' => $utilisateur));
    }

}

