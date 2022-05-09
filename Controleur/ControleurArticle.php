<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';
/**
 * Contrôleur des actions liées aux articles
 */
class ControleurArticle extends Controleur {

    private $article;
    private $commentaire;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->article = new Article();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un Article
    public function index() {
        $article = null;
        $commentaires = [];

        $idArticle = intval($this->requete->getParametre("id"));

        if ($idArticle) {
            $article = $this->article->getArticle($idArticle);
    
            $commentaires = $this->commentaire->getCommentaires($idArticle);
        }

        #$utilisateur = $this->requete->getSession()->existeAttribut("idUtilisateur");
        
        $this->genererVue(
            array(
                'article' => $article, 
                'commentaires' => $commentaires,
                #'utilisateur' => $utilisateur
            )
        );
    }

    // Ajoute un commentaire sur un Article
    public function commenter() {
        $idArticle = $this->requete->getParametre("id");
        $contenu = $this->requete->getParametre("contenu");
        
        $auteur = $this->requete->getSession()->existeAttribut("idUtilisateur");
        #$auteur = $this->requete->getParametre("auteur");
        
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idArticle);
        
        // Exécution de l'action par défaut pour réafficher la liste des Articles
        $this->executerAction("index");
    }
}

