<?php
	class User_Model extends Model{

		function __construct(){

		}

		function getUsers(){
			require 'libs/Connection.php';
			$sql = "SELECT username FROM user;";
			$result = $conn->query($sql);
			$out = array();
			while($out[] = $result->fetch_assoc()){}
			return $out;
		}

		function deleteUser(){
			if(!empty($_POST['username']) && !empty($_POST['checkUsername'])){
				if($_POST['username'] == $_POST['checkUsername']){
					require 'libs/Connection.php';
					$sql = "DELETE FROM user WHERE username='".$_POST['username']."';";
					$result = $conn->query($sql);
					return true;
				}else{
					throw new Exception("CheckUsername non corretto");
				}
			}else{
				throw new Exception("Username o CheckUsername non inseriti");
			}
		}
	}
?>