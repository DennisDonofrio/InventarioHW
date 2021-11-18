<?php
	class Login extends Controller{
		function __construct(){
			parent::__construct();
		}
		
		/**
		 * Questa funzione è la funzione di default che viene chiamata.
		 */
		function index(){
			$this->view->render('login/index');
		}

		function login(){
			try{
				$login = new Login_Model();
				if($login->login()){
					$this->view->render('home/index');
				}else{
					$this->view->render('header', 1);
					$this->view->render('login/index', 1);
					$this->view->render('login/error', 1);
					$this->view->render('footer', 1);
				}
			}catch(Exception $e){
				$this->view->render('header', 1);
				$this->view->render('login/index', 1);
				echo $e->getMessage();
				$this->view->render('footer', 1);
			}
		}
	}
?>