<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Article.php';

/**
 * Contrôleur des actions d'administration
 */
class ControleurAdminArticle extends Controleur // ControleurSecurise
{
    private $article;

    /**
     * Constructeur 
     */
    public function __construct()
    {
        $this->article = new Article();
    }

    public function index()
    {
        $this->genererVue(
            [], 
            null,
            'back'
        );
    }

}

