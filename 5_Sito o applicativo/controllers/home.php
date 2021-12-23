<?php
	class Home extends Controller{
		function __construct(){
			parent::__construct();
		}

		/**
         * Funzione che viene richiamata di default.
         */
		function index(){
			if(isset($_SESSION['id'])){
				$this->view->render('home/index');
			}else{
				$this->view->locate('login');
			}
		}

		/**
		 * Questo metodo riceve le richieste e in base al contenuto della
		 * variabile POST decide cosa fare.
		 */
		function action(){
			if(isset($_POST['inventariohw'])){
				$this->view->locate('inventory/getPage/0');
			}else if(isset($_POST['gestioneutenti'])){
				$this->view->render('home/manageUsers');
			}else if(isset($_POST['add'])){
				$this->view->locate('register');
			}else if(isset($_POST['modify'])){
				$this->view->locate('modifyuser');
			}else if(isset($_POST['delete'])){
				$this->view->locate('deleteuser');
			}
		}
	}
?>