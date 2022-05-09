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
        $this->executerAction("index");
    }

    public function inscription()
    {
        $this->genererVue([], null, 'auth');
    }

    public function connecter()
    {
        if (
            $this->requete->existeParametre("email") && 
            $this->requete->existeParametre("mot_passe")
        ) {
            $email = $this->requete->getParametre("email");
            $mdp = $this->requete->getParametre("mot_passe");

            if ($this->utilisateur->connecter($email)) {
                $utilisateur = $this->utilisateur->getUtilisateur($email);

                if (password_verify($mdp, $utilisateur['motPasse'])) {

                    $this->creerSession($utilisateur['idUtilisateur'], $utilisateur['email']);
    
                   // Exécution de l'action par défaut pour afficher la page d'accueil
                    $this->rediriger("accueil");
                } else {
                    $this->genererVue(
                        array('msgErreur' => 'email ou mot de passe incorrects'),
                        'connexion', 
                        'auth'
                    );
                }
            } else {
                $this->genererVue(
                    array('msgErreur' => 'email ou mot de passe incorrects'),
                    'connexion', 
                    'auth'
                );
            }
        }
        else {
            $this->genererVue(
                array('msgErreur' => 'email ou mot de passe non defini'),
                'connexion', 
                'auth'
            );
        }
            
    }

    public function creer()
    {
        if (
            $this->requete->existeParametre("email") && 
            $this->requete->existeParametre("mot_passe") && 
            $this->requete->existeParametre("mot_passe") == $this->requete->existeParametre("confirm_mot_passe")
        ) {
            $email = $this->requete->getParametre("email");
            $mdp = $this->requete->getParametre("mot_passe");
            $confirmMotPasse = $this->requete->getParametre("confirm_mot_passe");

            if ($mdp != $confirmMotPasse) {
                $this->genererVue(
                    array('msgErreur' => 'Action impossible : mot de passe incorret'),
                    'inscription', 
                    'auth'
                );
            }
    
            $this->utilisateur->ajouterUtilisateur($email, $mdp);

            $utilisateur = $this->utilisateur->getUtilisateur($email);

            if ($utilisateur) {
                $this->creerSession($utilisateur['idUtilisateur'], $utilisateur['email']);
                
                // Exécution de l'action par défaut pour afficher la page d'accueil
                $this->rediriger("accueil");
            }
        } else {
            
            $this->genererVue(
                array('msgErreur' => 'Action impossible : email ou mot de passe ou confirmer non défini'),
                'inscription', 
                'auth'
            );
        }
        
    }

    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("authentification");
    }

    private function creerSession($id, $email)
    {
        $this->requete->getSession()->setAttribut("idUtilisateur", $id);
    
        $this->requete->getSession()->setAttribut("login", $email);
    }

}
