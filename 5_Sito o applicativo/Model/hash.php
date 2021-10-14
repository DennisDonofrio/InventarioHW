<?php
	class Hash{
		private $plainPass;
		private $cipherPass;

		public function __construct($plainPass){
			$this->plainPass = $plainPass;
		}

		public function cipherPassword($algoritm, $salt){
			$this->cipherPass = hash($algoritm, hash($algoritm, $salt . $this->plainPass));
		}

		public function getCipherPass(){
			return $this->cipherPass;
		}
	}
?>