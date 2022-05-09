<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Utilisateur.php';

/**
 * Contrôleur des actions d'administration
 */
class ControleurAdminUtilisateur extends ControleurSecurise
{
    private $utilisateur;

    /**
     * Constructeur 
     */
    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    public function index()
    {
        $utilisateurs = $this->utilisateur->getUtilisateurs();

        $this->genererVue(
            ['utilisateurs' => $utilisateurs], 
            null,
            'back'
        );
    }

}

