<?php

include('BddAccess.php');
include('Session.php');
session_start();

class Connexion {
	
	// Attributs
	private $password;
	private $email;
	private $objSession;
	private $refBddAccess;
	
	// Constructeur
	public function __construct() {
		// Creation de l'objet BddAccess
		$this->refBddAccess = new BddAccess();
		
		// Se connecter a la BDD
		$this->refBddAccess->connect('mysql:host=localhost;dbname=agenceinterim');
	}
	
	// Methodes 
	public function recupereInfosConnexion(){
		
		// Recuperation des donnees du formulaire
		// de connexion (email et password)
		$this->email = $_POST['email'];
		$this->password = $_POST['mdp'];
		
		// Creation de l'objet Session et initialiser
		// les variables session
		$this->objSession = new Session();
		//$this->objSession->initVariablesSession();
		
		// Enregistrement de l'objet Session cree
		// dans la variable $_SESSION afin que l'objet
		// Session soit connu de l'objet ConsultOffres
		$_SESSION['session'] = $this->objSession;
		
		// Interroger la BDD pour verifier si l'interimaire
		// est bien enregistre dans la base
		$req = 'Select count(*) from interimaires where email='."'".$this->email ."'".' and mdp='."'".$this->password."'";	
		$exist = $this->refBddAccess->estEnregistre($req);
		
		if($exist) {
			// Envoi sur la page des offres
			echo "Vous pouvez aller sur la page consultation des offres";
            
			header('Location: index.php?page=consultOffres');
		}
		else {
			echo "vous devez vous enregistrer..";
			// Envoi sur la page d'enregistrement
			header('Location: index.php?page=enregistrement');
		}
	}
}

// Instructions de demarrage
$conx = new Connexion();
$conx->recupereInfosConnexion();

?>