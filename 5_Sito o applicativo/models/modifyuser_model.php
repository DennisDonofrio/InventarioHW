<?php
    class ModifyUser_Model{

        private $name;
        private $surname;
        private $username;
        private $email;
        private $pass1;
        private $pass2;
        private $hash_password;

        function __construct(){
            
        }

        function getUsers(){
            require 'libs/Connection.php';
            $sql = "SELECT username FROM user;";
            $result = $conn->query($sql);
            $out = "<select name='username'>";
            while($row = $result->fetch_assoc()) {
                $out .= "<option value='".$row['username']."'>".$row['username']."</option>";
            }
            $out .= "</select>";
            return $out;
        }

        function isPasswordEquals(){
			return strcmp($this->pass1, $this->pass2);
		}

		function toUpperCase($word){
			strtolower($word);
			return strtoupper($word[0]) . substr($word, 1, strlen($word) - 1);
		}

        function getVariables(){
            if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])){
                $this->username = $_POST['username'];
                $this->email = $_POST['email'];
                $this->pass1 = $_POST['pass1'];
                $this->pass2 = $_POST['pass2'];
            }else{
                throw new Exception("Email o password non inseriti");
            }
        }

		function modifyuser(){
			require 'libs/Connection.php';
			require 'libs/Hash.php';
            $this->getVariables();
            //echo $this->pass1;
			if($this->isPasswordEquals() == 0){
				$strongRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/";
				if(preg_match($strongRegex, $this->pass1)){
                    $sql = "SELECT name, surname FROM user WHERE username='".$this->username."'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        //var_dump($row);
                        $this->name = $row['name'];
                        $this->surname = $row['surname'];
                    }

					$hp = new Hash($this->pass1);
					$hp->cipherPassword("sha256", strtolower($this->name));
					$this->hash_password = $hp->getCipherPass();
					$this->username = strtolower($this->name.".".$this->surname);

                    $sql = "UPDATE user set email='".$this->email."', hash_password='".$this->hash_password."' WHERE username='".$this->username."';";
                    $result = $conn->query($sql);
				}else{
					throw new Exception("Complessità password non valida");
				}
			}else{
				throw new Exception("Le due password non corrispondono");
			}
		}
    }
?>