<?php
	class Inventory extends Controller{
		function __construct(){
			parent::__construct();
		}

		function index(){
            $model = new Inventory_Model();
            $this->view->types = $model->getTypes();
            if(!isset($this->view->link)){
                $this->view->link = "0";
            }
			$this->view->render('inventory/showall');
		}

        function getPage($typeid = 0){
            if(!empty($typeid) && ($typeid >= 0 || $typeid == -1)){
                require 'controllers/iframe.php';
                $controller = new Iframe();
            }
            $this->view->link = $typeid;
            $this->index();
        }

        function action($id){
            if(isset($_POST['button'])){
                if($_POST['button'] == 'Delete'){
                    $this->view->id = $id;
                    $this->view->render('inventory/confirmDelete', 1);
                }else if($_POST['button'] == 'Modify'){
                    $this->view->id = $id;
                    $this->view->render('inventory/modify', 1);
                }else{

                }
            }
        }

        function confirmDelete($id){
            if(isset($_POST['button'])){
                if($_POST['button'] == 'Confirm'){
                    $model = new Inventory_Model();
                    $model->delete($id);
                    $this->view->render('inventory/deleted', 1);
                }else if($_POST['button'] == 'Back'){
                    require 'controllers/iframe.php';
                    $controller = new Iframe();
                    $controller->getObject(0);
                }else{
                    echo "Unknow button";
                }
            }
        }

        function modify($id){
            $model = new Inventory_Model();
            try{
                if($model->modify($id)){
                    $this->view->render('inventory/showall', 1);
                }
            }catch(Exception $e){
                $this->view->error = $e.getMessage();
            }
        }
	}
?>