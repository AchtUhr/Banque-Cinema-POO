<?php

class Client{
    private $_nom;
    private $_prenom;
    private $_naissance;
    private $_ville;
    private $_compte = [];

    public function __construct($nom, $prenom, $naissance, $ville) {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_naissance = $naissance;
        $this->_ville = $ville;
    }

    public function getNom() { return $this->_nom; }
    public function getPrenom() { return $this->_prenom; }
    public function getNaissance() { return $this->_naissance; }
    public function getAge() {
        $naissance = new DateTime($this->_naissance);
        $present = new DateTime();
        $resultat = $present->diff($naissance);
        return "$resultat->y ans";
    }
    public function getVille() { return $this->_ville; }

    public function getInfos() {
        return "Infos du client : " . $this->getPrenom() . " " . $this->getNom() . " agé(e) de " . $this->getAge() . "<br>";
    }

    public function setNom($nom) { $this->_nom = $nom; }
    public function setPrenom($prenom) { $this->_prenom = $prenom; }
    public function setNaissance($naissance) { $this->_naissance = $naissance; }
    public function setVille($ville) { $this->_ville = $ville; }

    public function setCompte($compte) {
        $this->_compte[] = $compte;
    }

}
?>