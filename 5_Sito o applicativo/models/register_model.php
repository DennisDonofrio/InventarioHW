<?php

	class Register_Model{
		private $isAdmin = 0;
		private $name = "";
		private $surname = "";
		private $username = "";
		private $email = "";
		private $pass1 = "";
		private $pass2 = "";
		private $hash_password = "";

		function __construct(){
			var_dump($_POST);
			if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])){
                $this->name = $_POST['name'];
                $this->surname = $_POST['surname'];
                $this->email = $_POST['email'];
                $this->pass1 = $_POST['pass1'];
                $this->pass2 = $_POST['pass2'];
				if($_POST['is_admin'] == "on"){
					$this->isAdmin = 1;
				}
            }else{
                throw new Exception("Compilare tutti i campi");
            }
		}

		function getName(){
			return $this->name;
		}

		function getSurname(){
			return $this->surname;
		}

		function getEmail(){
			return $this->email;
		}

		function getHashPassword(){
			return $this->hash_password;
		}

		function setIsAdmin($isAdmin){
			$this->isAdmin = $isAdmin;
		}

		function setName($name){
			if(strlen($name) >= 3){
				$this->name = $this->toUpperCase($name);
			}else{
				throw new Exception("Inserire un nome valido");
				
			}
		}

		function setSurname($surname){
			if(strlen($surname) >= 3){
				$this->surname = $this->toUpperCase($surname);
			}else{
				throw new Exception("Inserire un cognome valido");
			}
		}

		function setEmail($email){
			$this->email = strtolower($email);
		}

		function setPass1($pass1){
			$this->pass1 = $pass1;
		}

		function setPass2($pass2){
			$this->pass2 = $pass2;
		}

		function isPasswordEquals(){
			return strcmp($this->pass1, $this->pass2);
		}

		function toUpperCase($word){
			strtolower($word);
			return strtoupper($word[0]) . substr($word, 1, strlen($word) - 1);
		}

		function register(){
			require 'libs/Connection.php';
			require 'libs/Hash.php';

			if($this->isPasswordEquals() == 0){
				$strongRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/";
				if(preg_match($strongRegex, $this->pass1)){
					$hp = new Hash($this->pass1);
					$hp->cipherPassword("sha256", strtolower($this->name));
					$this->hash_password = $hp->getCipherPass();
					$this->username = strtolower("$this->name.$this->surname");

					$sql = "SELECT * FROM user WHERE username='$this->username'";
					$result = $conn->query($sql);
					if($result->num_rows == 0){
						$sql = "INSERT INTO user (is_admin, name, surname, username, email, hash_password) values('".$this->isAdmin."','".$this->name."', '".$this->surname."', '".$this->username."', '".$this->email."', '".$this->hash_password."');";
						$result = $conn->query($sql);
                        return true;
					}else{
						throw new Exception("Utente esistente");
					}
				}else{
					throw new Exception("Complessità password non valida");
				}
			}else{
				throw new Exception("Le due password non corrispondono");
			}
		}
	}
?>

