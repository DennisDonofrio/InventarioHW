<?php
	class Logout extends Controller{
		function __construct(){
			parent::__construct();
		}

		function index(){
            session_unset();
            session_destroy();
			$this->view->render('logout/index');
		}
	}
?>