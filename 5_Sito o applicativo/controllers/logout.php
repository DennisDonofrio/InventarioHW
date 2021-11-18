<?php
	class Logout extends Controller{
		function __construct(){
			parent::__construct();
		}

		/**
		 * Questa funzione è la funzione di default che viene chiamata.
		 * Permette di eseguire il logout e cancellare la sessione.
		 */
		function index(){
            session_unset();
            session_destroy();
			$this->view->render('logout/index');
		}
	}
?>