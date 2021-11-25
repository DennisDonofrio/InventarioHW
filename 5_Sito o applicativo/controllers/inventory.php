<?php
	class Inventory extends Controller{
		function __construct(){
			parent::__construct();
		}

		function index(){
            $model = new Inventory_Model();
            $this->view->types = $model->getTypes();
            $this->view->link = "";
			$this->view->render('inventory/showall');
		}

        function getPage($typeid = 0){
            if(!empty($typeid) && $typeid >= 0){
                require 'controllers/iframe.php';
                $controller = new Iframe();
                $GLOBALS['dennis'] = $typeid;
            }
            $this->index();
        }
	}
?>