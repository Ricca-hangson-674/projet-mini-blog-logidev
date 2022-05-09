<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Utilisateur.php';

/**
 * Contrôleur des actions d'administration
 */
class ControleurAdminUtilisateur extends Controleur // ControleurSecurise
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
        $this->genererVue(
            [], 
            null,
            'back'
        );
    }

}

