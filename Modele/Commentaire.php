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
                . ' nrh_utilisateur.id as idUtilisateur,'
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
        $sql = 'DELETE FROM nrh_commentaire WHERE id=?';

        $this->executerRequete($sql, array($idCommentaire));
    }

    public function getCommentaire($id)
    {
        $sql = 'SELECT id, nrh_commentaire.date_creation as dateCreation,'
                . ' nrh_commentaire.contenu as contenu,'
                . ' nrh_commentaire.article_id as idArticle,'
                . ' nrh_commentaire.auteur_id as idAuteur'
                . ' FROM nrh_commentaire'
                . ' WHERE id=?'
        ;

        $commentaire = $this->executerRequete($sql, array($id));

        if ($commentaire->rowCount() > 0)
            return $commentaire->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun Commentaire ne correspond à l'identifiant '$id'");
    }
}