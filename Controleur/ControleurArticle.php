<?php

require_once 'ControleurSecurise.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';
/**
 * Contrôleur des actions liées aux articles
 */
class ControleurArticle extends ControleurSecurise {

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
        
            $this->genererVue(
                array(
                    'article' => $article, 
                    'commentaires' => $commentaires,
                    'utilisateur' => $this->requete->getSession()->getAttribut("login"),
                    'idUtilisateur' => $this->requete->getSession()->getAttribut("idUtilisateur")
                )
            );
        }
    }

    // Ajoute un commentaire sur un Article
    public function commenter() {
        $idArticle = $this->requete->getParametre("id");
        $contenu = $this->requete->getParametre("contenu");

        if ($this->requete->getSession()->existeAttribut("idUtilisateur")) {
            $auteur = $this->requete->getSession()->getAttribut("idUtilisateur");

            $this->commentaire->ajouterCommentaire($auteur, $contenu, $idArticle);

            // Exécution de l'action par défaut pour réafficher l'article
            $this->executerAction("index");
        }
    }

    public function supprimerCommentaire()
    {
        if ($this->requete->existeParametre("id")) 
        {
            $id = $this->requete->getParametre("id");

            $commentaire = $this->commentaire->getCommentaire($id);

            $this->commentaire->supprimerCommentaire($id);
    
            // Exécution de l'action par défaut pour réafficher l'article
            $this->rediriger("article", "index", $commentaire['idArticle']);
        }
    }
}

