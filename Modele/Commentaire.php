<?php

require_once 'Framework/Modele.php';

/**
 * Modélise un commentaire du blog 
 */
class Commentaire extends Modele {

// Renvoie la liste des commentaires associés à un Article
    public function getCommentaires($idArticle) {
        $sql = 'SELECT nrh_commentaire.id as id, nrh_commentaire.date_creation as dateCreation,'
                . ' nrh_commentaire.contenu as contenu,'
                . ' nrh_utilisateur.email as auteur,'
                . ' nrh_article.titre as titre'
                . ' FROM nrh_commentaire'
                . ' INNER JOIN nrh_utilisateur ' 
                . ' ON nrh_commentaire.auteur_id = nrh_utilisateur.id'
                . ' INNER JOIN nrh_article ' 
                . ' ON nrh_commentaire.article_id = nrh_article.id'
                . ' WHERE nrh_commentaire.article_id=?'
        ;
        $commentaires = $this->executerRequete($sql, array($idArticle));

        return $commentaires;
    }

    /**
     * Ajout commentaire
     */
    public function ajouterCommentaire($auteur, $contenu, $idArticle) {
        $sql = 'INSERT INTO nrh_commentaire(auteur_id, contenu, article_id)'
            . ' VALUES(?, ?, ?)';

        $this->executerRequete($sql, array($auteur, $contenu, $idArticle));
    }
    
    /**
     * Renvoie le nombre total de commentaires
     * 
     * @return int Le nombre de commentaires
     */
    public function getNombreCommentaires()
    {
        $sql = 'SELECT COUNT(*) as nbCommentaires FROM nrh_commentaire';

        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne

        return $ligne['nbCommentaires'];
    }
    
    /**
     * Supprimer un commentaire
     */
    public function supprimerCommentaire($idCommentaire)
    {
        $sql = 'DELETE FROM nrh_commentaire WHERE '
            . ' WHERE id=?'
            ;

        $this->executerRequete($sql, array($idCommentaire));
    }
}