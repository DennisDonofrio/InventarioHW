<?php
	class Register extends Controller{
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$this->view->render('register/index');
		}

		function register(){
			try{
				$register = new Register_Model();
				$register->register();
				$this->view->render('register/success');
			}catch(Exception $e){
				$this->view->render('header', 1);
				$this->view->render('register/index', 1);
				echo $e->getMessage();
				$this->view->render('footer', 1);
			}
		}
	}
?>