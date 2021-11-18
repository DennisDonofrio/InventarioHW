<?php
	class Hash{
		private $plainPass;
		private $cipherPass;

		/**
		 * @param String $plainPass -> password not encrypted
		 */
		public function __construct($plainPass){
			$this->plainPass = $plainPass;
		}

		/**
		 * Questa funzione permette di fare l'hash della password.
		 * 
		 * @param String $algorithm -> algorithm with which it encrypts the password
		 * @param String $salt -> salt for the password
		 */
		public function cipherPassword($algorithm, $salt){
			$this->cipherPass = hash($algorithm, hash($algorithm, $salt . $this->plainPass));
		}

		/**
		 * Questa funzione permette di ottenere l'hash della password.
		 * 
		 * @return String -> password encrypted
		 */
		public function getCipherPass(){
			return $this->cipherPass;
		}
	}
?>