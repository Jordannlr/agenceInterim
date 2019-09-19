<?php

class BddAccess {
	
	// Attributs
	
	// Objet PDO
	private $pdo;
	private $resultat;
	
	private $colonneSpecifPresente;
	private $typeColonneSpecifique;
	private $fichierCible;
	private $nomLien;
	private $listeColonnes;
	
	// Constructeur
	public function __construct() {
		
		$this->colonneSpecifPresente = false;
		$this->listeColonnes = "";
	}
	
	public function connect($cheminBdd) {
		
		try {
			$this->pdo = new PDO($cheminBdd, 'root', 'root');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e) {
			echo "Erreur : " . $e->getMessage() . "<br/>";
			die();
		}
	}
		
	public function enregistrerObjet($objInterim) {
		
		try {
			// Insertion du message dans la table
			$requete = $this->pdo->prepare('insert into interimaires (nom, prenom, age, email, mdp) values(?,?,?,?,?)');
			$requete->execute(array($objInterim->getNom(),$objInterim->getPrenom(),
							    $objInterim->getAge(), $objInterim->getEmail(), 
								$objInterim->getMdp()));
		}
		catch (PDOException $e) {
			echo "Erreur : " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public function estEnregistre($req) {
		
		$resultat = $this->pdo->query($req);
		$col = $resultat->fetch();
					
		if($col[0]>=1){
			return true;
		}
		else {
			return false;
		}			
	}
	
	public function setColSpecifPresent($present) {
		$this->colonneSpecifPresente = $present;
	}
	
	public function settypeColSpecif($typeCol) {
		$this->typeColonneSpecifique = $typeCol;
	}
	
	public function setFichierCible($ficCible) {
		$this->fichierCible = $ficCible;
	}
	
	public function setNomLien($nomLien) {
		$this->nomLien = $nomLien;
	}
	
	public function setListeColonnes($listeCol) {
		$this->listeColonnes = $listeCol;
	}
	
	public function inserer($num, $solde, $name) {
		
		$ins = $this->pdo->prepare("insert into compte (numCompte,solde,nom) values(?,?,?)"); 
		$ins->execute(array( $num, $solde, $name));
	}
	
	public function consulter($typeRequete, $table) {
		
		try {
			if($typeRequete == null) {
				// Requete select *
				$this->resultat = $this->pdo->query('Select * from ' .$table);
			}
			else {
				// Requete select avec criteres
			}
		}
		catch (PDOException $e) {
			echo "Erreur : " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public function getResultats() {
		
		// Effectuer un explode de la liste des noms de colonnes 
		$tabNomCol = explode(":", $this->listeColonnes);
		
		//echo "taille tabNomCol=" .count($tabNomCol) ."<br>";
		echo "taille tabNomCol=" .sizeof($tabNomCol) ."<br>";
			
		echo '<table border="3">';
		echo "<tr>";
		
		$tailleTab = sizeof($tabNomCol);
		
		// Parcours du tableau $tabNomCol
		$i=0;
		while($i < $tailleTab) {
			echo "<td width=''>" .$tabNomCol[$i] ."</td>";
			$i++;
		}
		
		if($this->colonneSpecifPresente) {
			echo "<td width=''> liens</td>";
		}
		echo "</tr>";
		
		while ($ligne = $this->resultat->fetch()) {
			
			// Parcours du tableau $tabNomCol
			$i=0;
			echo "<tr>";
			while($i < $tailleTab) {
				echo "<td>" . $ligne[$tabNomCol[$i]] ."</td>" ;
				$i++;
			}
			
			/*
			echo "<tr><td>" . $ligne[$tabNomCol[0]] ."</td>";
			echo "<td>" . $ligne[$tabNomCol[1]] ."</td>" ;
			echo "<td>" .$ligne[$tabNomCol[2]] ." </td>";
			*/
			if($this->colonneSpecifPresente) {
				//echo ' <a href=" '.$this->fichierCible .'"> Ceci est un lien 1</a> ';
				echo "<td>".'<a href="'.$this->fichierCible. '"' .'> <input type= "button" name="Répondre" value="' .$this->nomLien .'"/> </a><br>'." </td>";
			}
			echo"</tr>";
		}
		echo "</table>";
		echo "<br>";
	}
	
	public function saveParamsComplementaires($tabInfos) {
		
		$i=0;
		while($i < sizeof($tabInfos)) {
			echo $tabInfos[$i] . " ";
			$i++;
		}
		// Creation de la requete UPDATE
		try {
			echo "taille tabInfos= ".sizeof($tabInfos);
			
			/*
			$update = $this->pdo->prepare("update interimaires set niveauetudes=?, tel=?, profession=?, ville=? where email=?"); 
			$update->execute(array($tabInfos[0], $tabInfos[1],$tabInfos[2],
									$tabInfos[3], $tabInfos[4]));
			*/
			/*
			$update = $this->pdo->prepare("update interimaires set niveauetudes= :name, tel= :phone, profession= :prof, ville= :town where email= :mail"); 
			$update->execute(array('name' =>$tabInfos[0], 
								   'phone' => $tabInfos[1],
								   'prof' => $tabInfos[2],
									'town' => $tabInfos[3],
									'mail' => $tabInfos[4]));
			
			*/
			
			echo "contenu de tabInfos[0]:".$tabInfos[0]."%<br>";
			echo "contenu de tabInfos[1]:".$tabInfos[1]."%<br>";
			echo "contenu de tabInfos[2]:".$tabInfos[2]."%<br>";
			echo "contenu de tabInfos[3]:".$tabInfos[3]."%<br>";
			echo "contenu de tabInfos[4]:".$tabInfos[4]."%<br>";
			

			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$req = "update interimaires set niveauetudes='$tabInfos[0]', tel='$tabInfos[1]', profession='$tabInfos[2]', ville='$tabInfos[3]' where email='$tabInfos[4]'";
			//$req = "update interimaires set niveauetudes='cinq' where email='uuu@gmail.fr'";
			echo "taille tabInfos4=".strlen($tabInfos[4]);
			echo "req update =". $req;
			$nblignesModif = $this->pdo->exec($req);
			
			echo "nb lignes modif= ".$nblignesModif;
			if ($nblignesModif == 0) {
				print_r($this->pdo->errorInfo());
			}	
        }
		catch (PDOException $e) {
			echo "Erreur : " . $e->getMessage() . "<br/>";
			die();
		}
    }
}

?>