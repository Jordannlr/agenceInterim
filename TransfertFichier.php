<?php
include("BddAccess.php");

class TransfertFichier {
	
	// Attributs
	private $refBddAccess;
	
	// Descripteur de fichier
	private $fileDescr;
	
	// Tableau destine a contenir les informations
	// interimaire a partir de niveauEtudes
	private $tabInfos;
	
	// Constructeur
	public function __construct() {
		
		$this->refBddAccess = new BddAccess();
		$this->refBddAccess->connect('mysql:host=localhost;dbname=agenceinterim');
		
		$this->tabInfos = array();
	}
	
	// Methodes
	public function recupereInfosCV() {
		
		// Nom du fichier d'origine
		$file = $_FILES['fic']['name'];
		
		// Nom du fichier sur le serveur
		$temp = $_FILES['fic']['tmp_name'];
		
		echo "fichier temp: ".$temp ."<br>";
		
		// Recuperation d'informations sur le fichier
		$infos = pathinfo($_FILES['fic']['name']);
		
		// Extension du fichier envoye
		$ext = $infos['extension'];
		
		$extAuto = array('doc', 'rtf', 'pdf','txt');
		
		// Test de l'extension du fichier recu
		if(in_array($ext,$extAuto)) {
			echo "extension autorise...<br>";
			
			// Si aucune erreur de chragement
			if($_FILES['fic']['error'] == 0) {
				
				echo "transfert ok!!! <br>";
				
				//Copie du fichier temporaire dans un fichier de
				// meme nom que celui recu
				//$destination = "C:\\CvInterimaires\\CV_" .$nom ."." .$ext;
				$destination = "C:\\CvInterimaires\\CV" ."." .$ext;
				
				echo "fichier destination: ".$destination ."<br>";
				
				// Accepter le fichier et lui changer de destination
				// et le traiter
				if(move_uploaded_file($temp, $destination)) {
					
					echo "fichier accepte!! <br>";
					
					// Ouverture du fichier destination
					// afin de recuperer les informations 
					// de l'interimaire
					$file = fopen($destination, 'r');
					
					// Lecture de la 1ere ligne du fichier pour
					// recuperer le nom de l'interimaire
					$ligneLue = fgets($file);
					//echo "La 1ere ligne est :". $ligneLue ."<br>";
					
					// Explode sur la ligne lue
					$tabLigne = explode(":",$ligneLue);
					$nom = $tabLigne[1];
					
					// Lecture de la 2eme ligneLue (sauter cette ligne)
					$ligneLue = fgets($file);
					
					// Lecture de la 3eme ligneLue (email)
					$ligneLue = fgets($file);
					
					// Explode sur la ligne de l'email
					$tabLigne = explode(":",$ligneLue);
					$email = $tabLigne[1];
					
					// Lecture du reste du fichier
					while(!feof($file)) {
						
						$ligneLue = fgets($file);
						echo $ligneLue ."<br>";
						
						// Explode sur la ligne lue
						$tabLigne = explode(":",$ligneLue);
						array_push($this->tabInfos, $tabLigne[1]);
					}
					
					// Inserer l'email dans $tabInfos
					array_push($this->tabInfos, $email);
					
					// Fermeture du fichier
					fclose($file);
					
					// Renommer le fichier
					$ficRenomme = "C:\\CvInterimaires\\CV" .$nom ."." .$ext;
					echo "fic renomme: ".$ficRenomme;
					//if(rename( $destination, $ficRenomme))
					if(rename( "C:\\CvInterimaires\\CV.txt", "C:\\CvInterimaires\\fic.txt"))
						echo "Fichier renomme!!<br>";
					else
						echo "renommage fichier a echoue!!<br>";
				}
				else {
					echo "fichier refuse!! <br>";
				}
			}
			else
				echo "probleme de transfert du fichier CV!! <br>";
		}
		
		// Envoyer les infos interimaires a BddAccess
		$this->refBddAccess->saveParamsComplementaires($this->tabInfos);
	}
}

// Instructions de demarrage
$objTransfFich = new TransfertFichier();

// Recuperer les informations du CV
$objTransfFich->recupereInfosCV();


?>