<?php
	class ModifyUser extends Controller{

        private $modifyuser;

		function __construct(){
			parent::__construct();
		}
		
		function index(){
            $this->view->render('header', 1);
			$this->view->render('modifyuser/first', 1);
            $this->modifyuser = new ModifyUser_Model();
            echo $this->modifyuser->getUsers();
            $this->view->render('modifyuser/last', 1);
            $this->view->render('footer', 1);
		}

		function modifyuser(){
			try{
				$this->modifyuser = new ModifyUser_Model();
                $this->modifyuser->modifyuser();
				$this->view->render('modifyuser/success');
			}catch(Exception $e){
                $this->view->render('header', 1);
				$this->view->render('modifyuser/first', 1);
                echo $this->modifyuser->getUsers();
                $this->view->render('modifyuser/last', 1);
				echo $e->getMessage();
                $this->view->render('footer', 1);
			}
		}
	}
?>