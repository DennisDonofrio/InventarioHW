<?php
	class DeleteUser extends Controller{
		function __construct(){
			parent::__construct();
		}

        /**
         * Funzione che viene richiamata di default.
         */
		function index(){
            $this->getUsers();
            //var_dump($this->view->users);
			$this->view->render('deleteuser/index');
		}

        /**
         * Inserisce nella variabile users gli utenti presenti nel database.
         */
        function getUsers(){
            $model = new User_Model();
            $this->view->users = $model->getUsers();
        }

        /**
         * Mostra la pagina per eliminare un utente.
         */
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