<?php
	class SanitizeData{
		private $data;
		public function __construct($data){
			$this->data = $data;
			$this->data = trim($this->data);
			$this->data = stripslashes($this->data);
			$this->data = htmlspecialchars($this->data);
			return $this->data;
		}

		public function getData(){
			return $this->data;
		}

		public static function saniData($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	}
?>