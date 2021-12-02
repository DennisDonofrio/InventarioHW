<?php
	class Inventory_Model extends Model{
		function __construct(){

		}

        function getTypes(){
			require 'libs/Connection.php';
			$sql = "SELECT id, name FROM type;";
			$result = $conn->query($sql);
			$out = array();
			while($out[] = $result->fetch_assoc()){}
			return $out;
		}

		function getObject($typeid){
			require 'libs/Connection.php';
			$sql = "SELECT * FROM object WHERE type_id=$typeid AND active=1;";
			$result = $conn->query($sql);
			$out = array();
			while($out[] = $result->fetch_assoc()){}
			return $out;
		}
		
		function getNotActived(){
			require 'libs/Connection.php';
			$sql = "SELECT * FROM object WHERE active=0;";
			$result = $conn->query($sql);
			$out = array();
			while($out[] = $result->fetch_assoc()){}
			return $out;
		}

		function delete($id){
			require 'libs/Connection.php';
			$sql = "UPDATE object SET active=0 WHERE id=$id";
			$result = $conn->query($sql);
		}

		function modify($id){
			if(isset($_POST['class'])){
				if($_POST['class'] > 0){
					require 'libs/Connection.php';
					$sql = "UPDATE object SET class=" . $_POST['class'] . " WHERE id=$id";
					$result = $conn->query($sql);
					return true;
				}else{
					throw new Exception('Number of class not valid');
				}
			}
		}
	}
?>