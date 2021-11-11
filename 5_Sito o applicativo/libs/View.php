<?php
	class View{
		function __construct(){
			//echo "This is the view<br />";
		}

		public function render($name, $noInclude = false){

			/**
			 * $level = 0 --> user not authenticated
			 * $level = 1 --> user base
			 * $level = 2 --> user admin
			 */

			$level = 0;
			if(isset($_SESSION['isAdmin'])){
				$level = $_SESSION['isAdmin'] + 1;
			}
			if($noInclude){
				require 'views/' . $name . '.php';
			}else if ($level == 0){
				require 'views/header.php';
				require 'views/' . $name . '.php';
				require 'views/footer.php';
			}else if ($level == 1){
				require 'views/headerBase.php';
				require 'views/' . $name . '.php';
				require 'views/footer.php';
			}else if ($level == 2){
				require 'views/headerAdmin.php';
				require 'views/' . $name . '.php';
				require 'views/footer.php';
			}else{
				require 'views/header.php';
				require 'views/' . $name . '.php';
				require 'views/footer.php';
			}
		}
	}
?>