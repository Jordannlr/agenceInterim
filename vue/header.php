<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="Styles/StyleSheet.css"/>
	<link rel="stylesheet" type="text/css" href="Header.html"/>
</head>
<body>
    <div id=wrapper>
		<div id="banner">	
		</div>
		
		<nav id="navigation">
			<ul id="nav">
				<li><a href="index.php">Accueil</a></li>
				<?php if (isset($_SESSION['session'])) { ?>
				    <li><a href="index.php?page=transfertFichier">Upload CV</a></li>
				    <li><a href="index.php?page=consultOffres">Offres d'emploi</a></li>
				    <li><a href="deconnexion.php">Se déconnecter</a></li>
				<?php } else { ?>
				    <li><a href="index.php?page=enregistrement">Enregistrement</a></li>
				    <li><a href="index.php?page=connexion">Connexion</a></li>
				<?php } ?>
			</ul>
		</nav>
