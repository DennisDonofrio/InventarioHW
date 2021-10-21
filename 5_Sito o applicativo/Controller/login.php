<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		require('../Model/Login.php');

		if(isset($_POST['username']) && isset($_POST['password'])){
			$login = new Login($_POST['username'], $_POST['password']);
			$login->logIn();
		}else{
			require('../View/login.php');
		}

		/*if(strlen($_POST['username']) >= 3 && strlen($_POST['password']) > 0){
			$username = $_POST['username'];
			if($pos = strpos($username, '.')){
				require('../Model/hash.php');
				$name = substr($username, 0, $pos);
				$password = $_POST['password'];
				$hash2 = new Hash($password);
				$hash2->cipherPassword('sha256', $name);
				$hash = $hash2->getCipherPass();
				$sql = "SELECT * FROM user WHERE username='$username' AND hash_password='$hash'";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					echo "bravo utente giusto";
				}else{
					require('../View/login.php');
					echo "<br>utente o password errati";
				}
			}else{
				require('../View/login.php');
				echo "<br>utente o password errati";
			}
		}*/
	}else{
		require('../View/login.php');
	}
?>