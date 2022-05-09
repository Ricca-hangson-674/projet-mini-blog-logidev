<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';

/**
 * Contrôleur des actions d'administration
 */
class ControleurAdmin extends Controleur // ControleurSecurise
{
    private $article;
    private $commentaire;

    /**
     * Constructeur 
     */
    public function __construct()
    {
        $this->article = new Article();
        $this->commentaire = new Commentaire();
    }

    public function index()
    {
        $nbarticles = $this->article->getNombreArticles();

        $nbCommentaires = $this->commentaire->getNombreCommentaires();

        # $login = $this->requete->getSession()->getAttribut("login");
        $login = null;

        $this->genererVue(
            array(
                'nbarticles' => $nbarticles, 
                'nbCommentaires' => $nbCommentaires, 
                'login' => $login
            ), 
            null,
            'back'
        );
    }

}

