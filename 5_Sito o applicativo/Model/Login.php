<?php
    class Login{
        private $username = "";
        private $name = "";
        private $plainPass = "";
        private $cipherPass = "";

        function __construct($username, $pass){
            if(strlen($username) >= 3 && strlen($pass) >= 7){
                $this->username = $username;
                $this->plainPass = $pass;
            }else{
                throw new Exception("Username o password non corretti");
            }
        }

        function extractName(){
            $this->isUsernameValid();
            $this->name = substr($this->username, 0, $pos);
            return $this->name;
        }

        function isUsernameValid(){
            if($pos = strpos($this->username, '.')){
                return pos;
            }else{
                throw new Exception("Username non valido");
            }
        }

        function logIn(){
            require 'hash.php';
            require 'connection.php';
            $hash = new Hash($this->plainPass);
            $hash->cipherPassword("SHA256", $this->name);
            $this->cipherPass = $hash->getCipherPass();
            $sql = "SELECT * FROM user WHERE username='$this->username' AND hash_password='$this->cipherPass'";
            echo $sql;
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                echo "utente corretto, accesso effettuato";
            }else{
                require('../View/login.php');
                echo "<br>utente o password errati";
            }
        }
    }
?>