<?php
	class DeleteUser extends Controller{
		function __construct(){
			parent::__construct();
		}

		function index(){
            $this->getUsers();
            //var_dump($this->view->users);
			$this->view->render('deleteuser/index');
		}

        function getUsers(){
            $model = new User_Model();
            $this->view->users = $model->getUsers();
        }

        function deleteUser(){
            $model = new User_Model();
            try{
                if($model->deleteUser()){
                    $this->view->render('deleteuser/success');
                }
            }catch(Exception $e){
                $this->view->render('header', 1);
				$this->view->render('deleteuser/index', 1);
				echo $e->getMessage();
                $this->view->render('footer', 1);
            }
        }
	}
?>