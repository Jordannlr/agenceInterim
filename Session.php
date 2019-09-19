<?php 

class Session {
	
	// Constructeur
	public function __construct() {
		$_SESSION['nbConsult'] = 0;
		$_SESSION['nbCandidature'] = 0;
	}
	
	// Methodes
	/*
	public function initVariablesSession() {
		$_SESSION['nbConsult'] = 0;
		$_SESSION['nbCandidature'] = 0;
	}
	*/
	public function incrementeNbConsult() {
		$_SESSION['nbConsult']++;
	}
	
	public function incrementeNbCanditatures(){
		$_SESSION['nbCandidature']++;
	}
	
	public function getNbCanditatures(){
		return $_SESSION['nbCandidature'];
	}
	
	public function getNbConsult(){
		return $_SESSION['nbConsult'];
	}
	
}

?>