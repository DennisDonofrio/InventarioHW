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

		/**
		 * Questa funzione è il costruttore che legge la variabile POST e la
		 * inserisce nelle variabili appropriate.
		 */
		function __construct(){
			if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email'])
				&& !empty($_POST['pass1']) && !empty($_POST['pass2'])){
                $this->name = $_POST['name'];
                $this->surname = $_POST['surname'];
                $this->email = $_POST['email'];
                $this->pass1 = $_POST['pass1'];
                $this->pass2 = $_POST['pass2'];
				if(isset($_POST['is_admin']) && $_POST['is_admin'] == "on"){
					$this->isAdmin = 1;
				}
            }else{
                throw new Exception("Compilare tutti i campi");
            }
		}

		/**
		 * Questa funzione è un getter.
		 */
		function getName(){
			return $this->name;
		}

		/**
		 * Questa funzione è un getter.
		 */
		function getSurname(){
			return $this->surname;
		}

		/**
		 * Questa funzione è un getter.
		 */
		function getEmail(){
			return $this->email;
		}

		/**
		 * Questa funzione è un getter.
		 */
		function getHashPassword(){
			return $this->hash_password;
		}

		/**
		 * Questa funzione setta l'attributo isAdmin.
		 */
		function setIsAdmin($isAdmin){
			$this->isAdmin = $isAdmin;
		}

		/**
		 * Questa funzione setta l'attributo name.
		 */
		function setName($name){
			if(strlen($name) >= 3){
				$this->name = $this->toUpperCase($name);
			}else{
				throw new Exception("Inserire un nome valido");
				
			}
		}

		/**
		 * Questa funzione setta l'attributo surname.
		 */
		function setSurname($surname){
			if(strlen($surname) >= 3){
				$this->surname = $this->toUpperCase($surname);
			}else{
				throw new Exception("Inserire un cognome valido");
			}
		}

		/**
		 * Questa funzione setta l'attributo email.
		 */
		function setEmail($email){
			$this->email = strtolower($email);
		}

		/**
		 * Questa funzione setta l'attributo pass1.
		 */
		function setPass1($pass1){
			$this->pass1 = $pass1;
		}

		/**
		 * Questa funzione setta l'attributo pass2.
		 */
		function setPass2($pass2){
			$this->pass2 = $pass2;
		}

		/**
         * Questa funzione permette di confrontare 2 password.
         */
		function isPasswordEquals(){
			return strcmp($this->pass1, $this->pass2);
		}

		/**
         * Questa funzione permette di passare una parola e riottenerla con la prima lettera
         * maiuscola e tutte le altre in minuscolo.
         */
		function toUpperCase($word){
			strtolower($word);
			return strtoupper($word[0]) . substr($word, 1, strlen($word) - 1);
		}

		/**
		 * Questa funzione permette di registrare un utente effettuando dei controlli
		 * di sicurezza come la complessità della password.
		 */
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
						$sql = "INSERT INTO user (is_admin, name, surname, username, email, hash_password) 
						values('".$this->isAdmin."','".$this->name."', '".$this->surname."', '".$this->username.
						"', '".$this->email."', '".$this->hash_password."');";
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

