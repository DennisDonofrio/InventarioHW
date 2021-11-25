<?php
	class Iframe extends Controller{
		function __construct(){
			parent::__construct();
		}

		function index(){
			$this->view->render('inventory/iframe', 1);
		}

        function getObject($typeid){
            if($typeid > 0){
                $model = new Inventory_Model();
                $this->view->objects = $model->getObject($typeid);
                $this->index();
            }else{
                $this->view->render("inventory/usage", 1);
            }
        }
	}
?>