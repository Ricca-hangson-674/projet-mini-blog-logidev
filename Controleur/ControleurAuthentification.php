<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';

/**
 * Contrôleur gérant la connexion au site
 */
class ControleurAuthentification extends Controleur
{
    private $utilisateur;

    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    public function index() 
    {
        $this->genererVue([], 'connexion', 'auth');
    }

    public function connexion()
    {
        $this->genererVue([], null, 'auth');
    }

    public function inscription()
    {
        $this->genererVue([], null, 'auth');
    }

    public function connecter()
    {
        if ($this->requete->existeParametre("email") && $this->requete->existeParametre("mdp")) {
            $email = $this->requete->getParametre("email");
            $mdp = $this->requete->getParametre("mdp");

            if ($this->utilisateur->connecter($email, $mdp)) {
                $utilisateur = $this->utilisateur->getUtilisateur($email, $mdp);

                $this->requete->getSession()->setAttribut("idUtilisateur",
                        $utilisateur['id']);

                $this->requete->getSession()->setAttribut("login", $utilisateur['email']);

                $this->rediriger("admin");
            } else {
                $this->genererVue(
                    array('msgErreur' => 'email ou mot de passe incorrects'),
                    "index"
                );
            }
        }
        else
            throw new Exception("Action impossible : email ou mot de passe non défini");
    }

    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("accueil");
    }

}
