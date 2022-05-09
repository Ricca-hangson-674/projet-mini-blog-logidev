<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Article.php';

/**
 * Contrôleur des actions d'administration
 */
class ControleurAdminArticle extends ControleurSecurise
{
    private $article;

    /**
     * Constructeur 
     */
    public function __construct()
    {
        $this->article = new Article();
    }

    /**
     * Affichier le formulaire de creation d'un article
     */
    public function index()
    {
        $this->genererVue(
            [], 
            null,
            'back'
        );
    }

    /**
     * AJout un article
     */
    public function ajout()
    {
        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenu");

        if ($this->requete->getSession()->existeAttribut("idUtilisateur")) {
            $auteur = $this->requete->getSession()->getAttribut("idUtilisateur");

            $this->article->ajouterArticle($auteur, $titre, $contenu);

            $this->rediriger("admin", "index");
        }
    }

    /**
     * Affichier le formulaire d'edition d'une article
     */
    public function editer()
    {
        $article = null;

        $idArticle = intval($this->requete->getParametre("id"));

        if ($idArticle) {
            $article = $this->article->getArticle($idArticle);
        
            $this->genererVue(
                array(
                    'article' => $article, 
                    'utilisateur' => $this->requete->getSession()->getAttribut("login"),
                    'idUtilisateur' => $this->requete->getSession()->getAttribut("idUtilisateur")
                ), 
                'editer',
                'back'
            );
        }
    }

    public function mettreAjour()
    {
        $idArticle = intval($this->requete->getParametre("id"));
        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenu");

        if ($idArticle) {
            $auteur = $this->requete->getSession()->getAttribut("idUtilisateur");

            $this->article->modifierArticle($idArticle, $auteur, $titre, $contenu);
            
            $this->rediriger("admin", "index");
        }
    }

    public function supprimer()
    {
        if ($this->requete->existeParametre("id")) 
        {
            $id = $this->requete->getParametre("id");

            $this->article->supprimerArticle($id);
    
            $this->rediriger("admin", "index");
        }
    }


}

