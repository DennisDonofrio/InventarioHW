<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		require('../Model/SanitizeData.php');
		require('../Model/User.php');
		require('../View/register.php');

		$campi = "<p style='color:red;'>Completare tutti i campi</p>";
		$password = "<p style='color:red;'>Le password immesse non corrispondono</p>";
		$user = new User();

		if(!empty($_POST['name']) &&
			!empty($_POST['surname']) &&
			!empty($_POST['email']) &&
			filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) &&
			!empty($_POST['pass1']) &&
			!empty($_POST['pass2'])){
			try{
				$user->setIsAdmin(isset($_POST['is_admin']) ? 1 : 0);
				$user->setName(SanitizeData::saniData($_POST['name']));
				$user->setSurname(SanitizeData::saniData($_POST['surname']));
				$user->setEmail(SanitizeData::saniData($_POST['email']));
				$user->setPass1(SanitizeData::saniData($_POST['pass1']));
				$user->setPass2(SanitizeData::saniData($_POST['pass2']));
				$user->createUser();
			}catch(Exception $e){
				echo "<p style='color:red;'>" . $e->getMessage() . "</p>";
			}
		}else{
			echo $campi;
		}

	}else{
		require('../View/register.php');
	}
?>