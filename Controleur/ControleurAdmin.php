<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';

/**
 * Contrôleur des actions d'administration
 */
class ControleurAdmin extends ControleurSecurise
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
        $nbArticles = $this->article->getNombreArticles();

        $articles = $this->article->getArticles();

        $nbCommentaires = $this->commentaire->getNombreCommentaires();

        $login = $this->requete->getSession()->getAttribut("login");

        $this->genererVue(
            array(
                'articles' => $articles,
                'nbArticles' => $nbArticles, 
                'nbCommentaires' => $nbCommentaires, 
                'utilisateur' => $login
            ), 
            null,
            'back'
        );
    }

}

