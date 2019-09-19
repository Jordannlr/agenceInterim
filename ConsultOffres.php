<?php
include('Session.php');
include('BddAccess.php');
//session_start();


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
		
		// Indiquer que l'on va creer une colonne specifique
		$this->refBddAccess->setColSpecifPresent(true);
		
		// Indiquer le type de colonne (href)
		$this->refBddAccess->settypeColSpecif("href");
		
		// Indiquer le fichier cible du href
		$this->refBddAccess->setFichierCible("index.php?page=postulePoste");
		
		// Indiquer le nom du lien
		$this->refBddAccess->setNomLien("postuler..");
		
		// Envoi de la requete select * from OffresEmploi
		$this->refBddAccess->consulter(null, "OffresEmploi");
		
		// Donner la liste des noms de colonnes a afficher
		$this->refBddAccess->setListeColonnes("poste:ville:descriptif");
		
		// Afichage des resultats
		$this->refBddAccess->getResultats();
		
		// Incrementer le nombre de consultations
		//$this->refObjSession->incrementeNbConsult();
	}
}

// Instructions de demarrage

// Creation d l'objet ConsultOffres
$consult = new ConsultOffres();

// Afficher les offres
$consult->afficherOffres();

?>