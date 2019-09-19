<?php
include('Interimaire.php');
include('BddAccess.php');

class Enregistrement {
	
	// Attributs
	private $objInterimaire;
	private $refBddAccess;
	
	// Constructeur
	public function __construct() {
	}
	
	// Methodes
	public function creerBddAccess() {
		$this->refBddAccess = new BddAccess();
		$this->refBddAccess->connect('mysql:host=localhost;dbname=agenceinterim');
	}
	
	public function recupereInfosInterimaire() {
		
		// Controle de la coherence des mots de passe
		if($_POST['mdp'] == $_POST['confmdp']) {
			
			// Recuperer les variables $_POST
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$age = $_POST['age'];
			$mail = $_POST['email'];
			$mdp = $_POST['mdp'];
			
			// Creation de l'objet Interimaire
			$this->objInterimaire = new Interimaire($nom, $prenom, $age, $mail, $mdp);
			
			// Enregistrement de l'objet Interimaire en BDD
			$this->refBddAccess->enregistrerObjet($this->objInterimaire);
			
			// Envoi sur la page de connexion
			header('Location: index.php?page=connexion');
			
			// Envoi sur le formulaire de transfert de CV
		}
		
		else {
			echo "Mots de passe differents!! <br>";
		}
	}
}

// Instructons de demarrage
// Creation de l'objet Enregistrement
$enreg = new Enregistrement();

// Creation de BddAccess et connexion a la BDD
$enreg->creerBddAccess();

// Recuperer les donnees du formulaire
$enreg->recupereInfosInterimaire();

?>