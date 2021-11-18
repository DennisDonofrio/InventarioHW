<?php
	class Register extends Controller{
		function __construct(){
			parent::__construct();
		}
		
		/**
		 * Questa funzione è la funzione di default che viene chiamata.
		 */
		function index(){
			if(!empty($_SESSION['id'])){
				$this->view->render('register/index');
			}else{
				$this->view->render('login/index');
			}
			
		}


		/**
		 * Questa funzione permette di registrare un nuovo utente.
		 */
		function register(){
			try{
				$register = new Register_Model();
				// call register method in register class
				$register->register();
				$this->view->render('register/success');
			}catch(Exception $e){
				$this->view->render('header', 1);
				$this->view->render('register/index', 1);
				// print the error
				echo $e->getMessage();
				$this->view->render('footer', 1);
			}
		}
	}
?>