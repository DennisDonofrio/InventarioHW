<?php
	class ModifyUser extends Controller{

        private $modifyuser;

		function __construct(){
			parent::__construct();
		}
		
		/**
		 * Questa funzione è la funzione di default che viene chiamata.
		 */
		function index(){
			if(!empty($_SESSION['id'])){
				$this->view->render('headerAdmin', 1);
				$this->view->render('modifyuser/first', 1);
				$this->modifyuser = new ModifyUser_Model();
				echo $this->modifyuser->getUsers();
				$this->view->render('modifyuser/last', 1);
				$this->view->render('footer', 1);
			}else{
				$this->view->render('login/index');
				echo "session not started";
			}
		}

		/**
		 * Questa funzione permette di modificare un utente.
		 */
		function modifyuser(){
			try{
				$this->modifyuser = new ModifyUser_Model();
				// call modifyuser method in modifyuser class
                $this->modifyuser->modifyuser();
				$this->view->render('modifyuser/success');
			}catch(Exception $e){
                $this->view->render('headerAdmin', 1);
				$this->view->render('modifyuser/first', 1);
                echo $this->modifyuser->getUsers();
                $this->view->render('modifyuser/last', 1);
				echo $e->getMessage();
                $this->view->render('footer', 1);
			}
		}
	}
?>