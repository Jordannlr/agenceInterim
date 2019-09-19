<?php
include('Session.php');
//session_start();

class PostulePoste {
	
	// Attributs
	private $refObjSession;
	
	// Constructeur
	public function __construct() {
		
		// Recuperer la reference de l'objet Session
		$this->refObjSession = $_SESSION['session'];
		
		// Incrementer le nombre de candidatures
		//$this->refObjSession->incrementeNbCanditatures();
		
		//echo "Nb candidatures ".$this->refObjSession->getNbCanditatures();
		//echo "Nb consult ".$this->refObjSession->getNbConsult();
	}
	
	public function envoyerCookie() {
		
		setcookie('nbOffresConsultees', $_SESSION['nbConsult'], time()+365*24*3600);
		setcookie('nbOffresPostulees', $_SESSION['nbCandidature'], time()+365*24*3600);
	}
}

// Instructions de demarrage
$objPostule = new PostulePoste();

// Envoyer les cookies sur le poste utilisateur
$objPostule->envoyerCookie();

?>
