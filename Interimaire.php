<?php 

class Interimaire {
	
	// Attributs
	private $nom;
	private $prenom;
	private $age;
	private $email;
	private $mdp;
	private $confirmMdp;
	
	// Methodes
	// Constructeur
	public function __construct($name, $pren, $old,
								$mail, $pass) {
				$this->nom = $name;
				$this->prenom = $pren;
				$this->age = $old;
				$this->email = $mail;
				$this->mdp =$pass;
	}
	
	// Getters
	public function getNom() {
		return $this->nom;
	}
	
	public function getPrenom() {
		return $this->prenom;
	}
	
	public function getAge() {
		return $this->age;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function getMdp() {
		return $this->mdp;
	}
}
?>