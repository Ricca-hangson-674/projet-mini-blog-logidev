<?php

require_once 'Framework/Modele.php';

/**
 * Modélise un article du blog
 */
class Article extends Modele {

    /** Renvoie la liste des Articles du blog
     * 
     * @return PDOStatement La liste des Articles
     */
    public function getArticles() {
        $sql = 'SELECT nrh_article.id as id, nrh_article.date_creation as dateCreation,'
                . ' nrh_article.titre as titre, nrh_article.contenu as contenu,'
                . ' nrh_utilisateur.email as auteur'
                . ' FROM nrh_article'
                . ' INNER JOIN nrh_utilisateur ' 
                . ' ON nrh_article.auteur_id = nrh_utilisateur.id'
                . ' ORDER by id desc'
        ;

        $articles = $this->executerRequete($sql);

        return $articles;
    }

    /** Renvoie les informations sur un article
     * 
     * @param int $id L'identifiant du article
     * @return array Le article
     * @throws Exception Si l'identifiant du article est inconnu
     */
    public function getArticle($idArticle) {
        $sql = 'SELECT nrh_article.id as id, nrh_article.date_creation as dateCreation,'
                . ' nrh_article.titre as titre, nrh_article.contenu as contenu,'
                . ' nrh_utilisateur.email as auteur'
                . ' FROM nrh_article'
                . ' INNER JOIN nrh_utilisateur ' 
                . ' ON nrh_article.auteur_id = nrh_utilisateur.id'
                . ' WHERE nrh_article.id=?'
        ;

        $article = $this->executerRequete($sql, array($idArticle));

        if ($article->rowCount() > 0)
            return $article->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun Article ne correspond à l'identifiant '$idArticle'");
    }

    /**
     * Renvoie le nombre total de Articles
     * 
     * @return int Le nombre de Articles
     */
    public function getNombreArticles()
    {
        $sql = 'SELECT count(*) as nbArticles FROM nrh_article';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne

        return $ligne['nbArticles'];
    }

    /**
     * Ajout un article
     */
    public function ajouterArticle($auteur, $titre, $contenu)
    {
        $sql = 'INSERT INTO nrh_article(auteur_id, titre, contenu)'
            . ' VALUES(?, ?, ?)';

        $this->executerRequete($sql, array($auteur, $titre, $contenu));
    }

    /**
     * Modifier un article
     */
    public function modifierArticle($idArticle, $auteur, $titre, $contenu)
    {
        $sql = 'UPDATE nrh_article SET auteur_id=?, titre=?, contenu=?'
            . ' WHERE id=?'
            ;

        $this->executerRequete($sql, array($auteur, $titre, $contenu, $idArticle));
    }

    /**
     * Supprimer un article
     */
    public function supprimerArticle($idArticle)
    {
        $sql = 'DELETE FROM nrh_article WHERE '
            . ' WHERE id=?'
            ;

        $this->executerRequete($sql, array($idArticle));
    }
}