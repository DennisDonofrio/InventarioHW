<?php
	class Bootstrap{
		function __construct(){

			$url = isset($_GET['url']) ? $_GET['url'] : null;
			$url = rtrim($url, '/');
			$url = explode('/', $url);

			// if $url is empty, require the default controller
			if(empty($url[0])){
				require 'controllers/home.php';
				$controller = new Home();
				$controller->index();
				return false;
			}

			// check if the file at position 0 of $url extist
			// if exists it require file
			// else open login for who is not logged and open home for people logged in
			$file = 'controllers/' . $url[0] . ".php";
			if(file_exists($file)){
				require $file;
			}else{
				$view = new View();
				if(!empty($_SESSION['id'])){
					$view->render('home/index');
				}else{
					$view->render('login/index');
				}
				return false;
			}
			$controller = new $url[0];

			// if $url pos 1 is set, call method $url pos 1
			// and if is set also the parameter
			if(isset($url[2])){
				$controller->{$url[1]}($url[2]);
			}else if(isset($url[1])){
				$controller->{$url[1]}();
			}else{
				$controller->index();
			}
		}
	}
?>