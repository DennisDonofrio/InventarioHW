<?php
	class Inventory extends Controller{
		function __construct(){
			parent::__construct();
		}

        /**
         * Funzione che viene richiamata di default.
         */
		function index(){
            $model = new Inventory_Model();
            $this->view->types = $model->getTypes();
            if(!isset($this->view->link)){
                $this->view->link = "0";
            }
			$this->view->render('inventory/showall');
		}

        /**
         * Imposta la variabile link a typeid e richiama la funzione index.
         */
        function getPage($typeid = 0){
            if(!empty($typeid) && ($typeid >= 0 || $typeid == -1)){
                require 'controllers/iframe.php';
                $controller = new Iframe();
            }
            $this->view->link = $typeid;
            $this->index();
        }

        /**
		 * Questo metodo riceve le richieste e in base al contenuto della
		 * variabile POST decide cosa fare.
		 */
        function action($id){
            if(isset($_POST['button'])){
                if($_POST['button'] == 'Delete'){
                    $this->view->id = $id;
                    $this->view->render('inventory/confirmDelete', 1);
                }else if($_POST['button'] == 'Modify'){
                    require 'controllers/iframe.php';
                    $model = new Inventory_Model();
                    $this->view->classroom = $model->getClassroom();
                    $this->view->object = $model->getSingleObject($id);
                    $this->view->render('inventory/modify', 1);
                }else if($_POST['button'] == 'Add'){
                    require 'controllers/iframe.php';
                    $model = new Inventory_Model();
                    $this->view->classroom = $model->getClassroom();
                    $this->view->types = $model->getTypes();
                    $this->view->render('inventory/add', 1);
                }
            }
        }

        /**
         * Questo metodo controlla se l'utente è veramente sicuro
         * di voler cancellare un elemento dall'inventario.
         */
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

        /**
         * Questo metodo permette la modifica di un elemento.
         */
        function modify($id){
            if(isset($_POST['Modify'])){
                $model = new Inventory_Model();
                try{
                    if($model->modify($id)){
                        $this->view->render('inventory/modified', 1);
                    }
                }catch(Exception $e){
                    $this->view->error = $e->getMessage();
                    $this->view->render('inventory/modify', 1);
                }
            }
        }

        /**
         * Questa funzione permette di aggiungere un elemento all'inventario.
         */
        function add(){
            try{
                $model = new Inventory_Model();
                if($model->add()){
                    $this->view->render('inventory/added', 1);
                }
            }catch(Exception $e){
                $this->view->error = $e->getMessage();
                $this->view->classroom = $model->getClassroom();
                $this->view->types = $model->getTypes();
                $this->view->render('inventory/add', 1);
            }
        }
	}
?>