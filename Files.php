<!DOCTYPE html>

<HTML>

	<HEAD>
		<TITLE>   Ma page 
		</TITLE>
	</HEAD>
	
	<BODY>
	<p>  <STRONG> Bienvenu sur ma page de transfert fichier </STRONG></p>
	
	<?php
		// Nom du fichier d'origine
		$file = $_FILES['fic']['name'];
		
		// Taille du fichier
		$size = $_FILES['fic']['size'];
		
		// Type de fichier
		$type = $_FILES['fic']['type'];
		
		// Nom du fichier sur le serveur
		$temp = $_FILES['fic']['tmp_name'];
		
		
		echo $file ."  ". $size . "  " .$type . "  " . $temp ."<br>";
		
		// Recuperation d'informations sur le fichier
		$infos = pathinfo($_FILES['fic']['name']);
		
		echo $infos['dirname'] . "<br>";
		echo $infos['basename']. "<br>";
		echo $infos['extension']. "<br>";
		
		$ext = $infos['extension'];
		$extAuto = array('doc', 'jpeg', 'gif', 'png', 'rtf', 'pdf','txt');
		
		if(in_array($ext,$extAuto)) {
			
			echo "extension autorise...<br>";
			//Copie du fichier
			$destination = "C:\\temp2\\fic1." .$ext;
			move_uploaded_file($temp,$destination );
			$error = $_FILES['fic']['error'];
			
			echo "Erreur = " .$error  ."<br>";
			
			// Traitement sur le fichier recu
			// Ouvrir le fichier recu avec la
			// fonction fopen()
			$file = fopen($destination, 'r');
			
			// Lecture de la 1ere ligne du fichier
			$ligneLue = fgets($file);
			echo "La 1ere ligne est :". $ligneLue ."<br>";
			
			// Lecture du reste du fichier
			while(!feof($file)) {
				$ligneLue = fgets($file);
				echo "La ligne courrante est :". $ligneLue ."<br>";
			}
			
			echo "Fichier lu totalement!!";
			
			// Fermeture du fichier
			fclose($file);
			
			// 2eme Partie
			// Ecriture dans un fichier
			// Ouverture d'un fichier en mode ecriture
			$fileEcr = fopen("C:\\Temp2\\toto.txt", 'w');
			
			// Ecriture de la chaine "aaaaaaabbbbb"
			fputs($fileEcr, "aaaaaaabbbbb");
			
			fclose($fileEcr);
			
			// Creation d'un fichier HTML
			$fileHtml = fopen("C:\\Temp2\\MonHtml.html", 'w');
			
			// Remplir le fichier avec les balises HTML
			fputs($fileHtml, "<!DOCTYPE html> \n");
			fputs($fileHtml, "<html> \n");
			fputs($fileHtml, "	<head> \n");
			fputs($fileHtml, "		<title> Mon fichier HTML </title>\n");
			fputs($fileHtml, "	</head> \n");
			fputs($fileHtml, "	<body> \n");
			fputs($fileHtml, "		<p> Voila!! </p>\n");
			fputs($fileHtml, "	</body> \n");
			fputs($fileHtml, "</html> \n");
		}
		else {
			echo "cet extension de fichier n'est pas autorise...<br>";
		}
		
	?>
	
	
	</BODY>
</HTML>