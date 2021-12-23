<?php
	class Iframe extends Controller{
		function __construct(){
			parent::__construct();
		}

        /**
         * Funzione che viene richiamata di default.
         */
		function index(){
			$this->view->render('inventory/iframe', 1);
		}

        /**
         * Questo metodo stampa il contenuto dell'iframe nella pagina
         * principale dell'inventario.
         */
        function getObject($typeid = 0){
            $this->view->archive = false;
            if($typeid > 0){
                $model = new Inventory_Model();
                $this->view->objects = $model->getObject($typeid);
                $this->index();
            }else if($typeid == -1){
                $this->view->archive = true;
                $model = new Inventory_Model();
                $this->view->objects = $model->getNotActived();
                $this->index();
            }else{
                $this->view->render("inventory/usage", 1);
            }
        }
	}
?>