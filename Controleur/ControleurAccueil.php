<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Article.php';

/**
 * Contrôleur gérant la page accueil front office au site
 */
class ControleurAccueil extends Controleur {

    private $article;

    public function __construct() {
        $this->article = new Article();
    }

    // Affiche la liste de tous les Articles du blog
    public function index() {
    	
        $Articles = $this->article->getArticles();
        $this->genererVue(array('articles' => $Articles));
    }

}

