<?php
    session_start();
    class Login_Model{
        private $username = "";
        private $name = "";
        private $plainPass = "";
        private $cipherPass = "";

        function __construct(){
            if(!empty($_POST['username']) && !empty($_POST['password'])){
                if(strlen($_POST['username']) >= 3 && strlen($_POST['password']) >= 7){
                    $this->username = $_POST['username'];
                    $this->plainPass = $_POST['password'];
                }else{
                    throw new Exception("Username o password non corretti");
                }
            }else{
                throw new Exception("Username o password non inseriti");
            }
        }

        private function extractName(){
            $pos = $this->isUsernameValid();
            $this->name = substr($this->username, 0, $pos);
            return $this->name;
        }

        private function isUsernameValid(){
            if($pos = strpos($this->username, '.')){
                return $pos;
            }else{
                throw new Exception("Username non valido");
            }
        }

        /**
         * Return true if the login is done correctly.
         * Return false if the login is not done.
         */

        function login(){
            require 'libs/Hash.php';
            require 'libs/Connection.php';
            $this->extractName();
            $hash = new Hash($this->plainPass);
            $hash->cipherPassword("SHA256", $this->name);
            $this->cipherPass = $hash->getCipherPass();
            $sql = "SELECT * FROM user WHERE username='$this->username' AND hash_password='$this->cipherPass'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if($result->num_rows == 1){
                $_SESSION['id'] = $row['id'];
                $_SESSION['isAdmin'] = $row['is_admin'];
                ///////////var_dump($_SESSION);
                return true;
            }else{
                return false;
            }
        }
    }
?>