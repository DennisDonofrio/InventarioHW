<?php
	class Home extends Controller{
		function __construct(){
			parent::__construct();
		}

		function index(){
			$this->view->render('home/index');
		}

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