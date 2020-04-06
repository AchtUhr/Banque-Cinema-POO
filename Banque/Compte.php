<?php
Class Compte{
    private $_libelle;
    private $_solde;
    private $_devise;
    private $_titulaire;

    public function __construct($libelle, $solde, $devise, $titulaire) {
        $this->_libelle = $libelle;
        $this->_solde =  $solde;
        $this->_devise = $devise;
        $this->_titulaire = $titulaire;

        $titulaire->setCompte($this);
    }

    public function getLibelle() {
        return $this->_libelle;
    }
    public function getSolde() {
        return $this->_solde;
    }
    public function getDevise() {
        return $this->_devise;
    }
    public function getTitulaire() {
        return $this->_titulaire;
    }

    public function debit($montant) {
        if ($this->_solde < $montant) {
            $resultat = "<br>Solde insuffisant";
            return $resultat;
        } else {
            $this->_solde -= $montant;
            $resultat = "<br>Le compte a bien été débité de $montant $this->_devise, il vous reste $this->_solde $this->_devise";
            return $resultat;
        }
    }

    public function credit($montant) {
        $this->_solde += $montant;
        $resultat = "<br>Le compte a bien été crédité de $montant $this->_devise, il vous reste $this->_solde $this->_devise";
        return $resultat;
    }

    public function getInfos() {
        $resultat = "Infos du compte bancaire : " . "$this->_libelle de ". $this->_titulaire->getPrenom() ." ". $this->_titulaire->getNom() . " avec un solde de " . $this->_solde . " " . $this->_devise . "<br>";
        return $resultat;
    }

    public function virement($destinataire, $montant) {
        $this->_solde -= $montant;
        $destinataire->_solde += $montant;
        $resultat =  "<br>Virement de $montant $this->_devise effectué entre le $this->_libelle et le $destinataire->_libelle <br>" . 
        "Nouveau solde du $this->_libelle : " . $this->getSolde() . "<br>Nouveau solde du $destinataire->_libelle : " . $destinataire->getSolde();
        
        return $resultat;
    }

}
?>