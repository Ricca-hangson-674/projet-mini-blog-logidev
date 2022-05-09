<?php

require_once 'Framework/Modele.php';

/**
 * Modélise un utilisateur du blog
 */
class Utilisateur extends Modele {

    /**
     * Vérifie qu'un utilisateur existe dans la BD
     * 
     * @param string $login Le login
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($email)
    {
        $sql = "SELECT id FROM nrh_utilisateur WHERE email=?";
        $utilisateur = $this->executerRequete($sql, array($email));
        return ($utilisateur->rowCount() == 1);
    }

    /**
     * Renvoie un utilisateur existant dans la BD
     * 
     * @param string $login Le login
     * @return mixed L'utilisateur
     * @throws Exception Si aucun utilisateur ne correspond aux paramètres
     */
    public function getUtilisateur($email)
    {
        $sql = "SELECT id as idUtilisateur, email, mot_passe as motPasse 
            FROM nrh_utilisateur WHERE email=?";
            
        $utilisateur = $this->executerRequete($sql, array($email));

        if ($utilisateur->rowCount() == 1)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }

    /** Renvoie la liste des utilisateurs du blog
     * 
     * @return PDOStatement La liste des utilisateurs
     */
    public function getUtilisateurs()
    {
        $sql = "SELECT id as idUtilisateur, email, mot_passe as motPasse 
            FROM nrh_utilisateur";
            
        $utilisateurs = $this->executerRequete($sql);

        return $utilisateurs;
    }

    /**
     * Ajout un utilisateur
     */
    public function ajouterUtilisateur($email, $motPasse)
    {
        $sql = 'INSERT INTO nrh_utilisateur(email, mot_passe)'
            . ' VALUES(?, ?)'; 

        $this->executerRequete($sql, array($email, password_hash($motPasse, PASSWORD_DEFAULT)));
    }

}

