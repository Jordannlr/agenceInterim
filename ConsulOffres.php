<?php
include('BddAccess.php');
include('Session.php');

class ConsultOffres {
	
	// Attributs
	private $refBddAccess;
	private $refObjSession;
	
	// Constructeur
	public function __construct() {
		
		// Creation de l'objet BddAccess
		$this->refBddAccess = new BddAccess();
		
		// Se connecter a la BDD
		$this->refBddAccess->connect('mysql:host=localhost;dbname=agenceinterim');
		
		// Recuperer l'objet Session
		$this->refObjSession = $_SESSION['session'];
	}
	
	public function afficherOffres() {
		
		// Creation d'un tableau de colonnes specifiques
		// a rajouter lors du getResultat.
		$colSpecifiques = array();
		
		// Remplissage du tableau $colSpecifiques avec
		// les informations permettant de rajouter un href 
		// en 3 eme colonne.
		array_push($colSpecifiques, true, "<a href=", "postuler.php", "Postuler..");
		
		// Fournir $colSpecifiques a BddAccess
		$this->refBddAccess->ajouterColonnesSpecifiques($colSpecifiques);
		
		// Envoi de la requete
		$this->refBddAccess->consulter(null, "OffresEmploi");
		
		// Afichage des resultats
		$this->refBddAccess->getResultats();
		
		// Incrementer le nombre de consultations
		$this->refObjSession->incrementeNbConsult();
	}
}

// Instructions de demarrage

// Creation d l'objet ConsultOffres
$consult = new ConsultOffres();

// Afficher les offres
$consult->afficherOffres();

?>