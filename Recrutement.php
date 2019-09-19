<?php 
include('BddAccess.php');

class Recrutement {
	
	// Attributs
	private $refBddAccess;
	private $nomVille;
	private $poste;
	
	// Constructeur
	public function __construct() {
		
		// Creation de l'objet BddAccess
		$this->refBddAccess = new BddAccess();
		
		// Se connecter a la BDD
		$this->refBddAccess->connect('mysql:host=localhost;dbname=agenceinterim');
	}
	
	// Methodes
	public function recupereInfosOffre() {
		
		// Recupere les valeurs des select
		// (listes deroulantes)
		$this->nomVille = $_POST['ville'];
		$this->poste = $_POST['poste']; 
		
		// Recherche des interimaires correspondant
		// au poste et a la ville selectionnes par
		// le recruteur
		
		// Creation d'un tableau de criteres
		$tabCriteres = array();
		
		// Creation d'un tableau contenant le nom 
		// des colonnes de la table interimaire
		$tabNomsColonnes = array();
		
		// Remplissage du tableau avec les criteres 
		// de recherche
		array_push($tabCriteres, $this->nomVille, $this->poste);
		
		// Remplissage du tableau de noms de colonnes
		// avec le nom des colonnes de la table interimaire
		array_push($tabNomsColonnes, 'ville', 'profession');
		
		$this->refBddAccess->rechercheAvecCriteres($tabNomsColonnes, $tabCriteres, "interimaires");
		
		// Recuperation des resultats de la requete
		$this->refBddAccess->getResultats();
	}
}

// Instructions de demarrage
// Creation de l'objet Recrutement
$recrut = new Recrutement();

// Recuperer les infos du formulaire
$recrut->recupereInfosOffre();
?>