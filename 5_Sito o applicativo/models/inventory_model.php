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

		function getSingleObject($id){
			require 'libs/Connection.php';
			$sql = "SELECT * FROM object WHERE id='$id';";
			$result = $conn->query($sql);
			$out = array();
			while($out[] = $result->fetch_assoc()){}
			return $out;
		}

		function getClassroom(){
			require 'libs/Connection.php';
			$sql = "SELECT * FROM classroom;";
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
					if(isset($_POST['reserved'])){
						$user_id = '"' . $_SESSION['id'] . '"';
						$date = '"' . date('Y-m-d') . '"';
					}else{
						$null = 'null';
					}
					require 'libs/Connection.php';
					$sql = "UPDATE object SET classroom_number=" . $_POST['class'] . ", riservation_data=" . (isset($date) ? $date : 'null') . ", user_id=" . (isset($user_id) ? $user_id : $null) . " WHERE id=$id";
					$result = $conn->query($sql);
					return true;
				}else{
					throw new Exception('Number of class not valid');
				}
			}
		}

		function add(){
			if(!empty($_POST['description']) &&
			!empty($_POST['serial_number']) &&
			isset($_POST['class']) &&
			isset($_POST['type'])){
				require 'libs/Connection.php';
				$sql = "INSERT INTO object(description, serial_number, type_id, classroom_number, active)
				values('" . $_POST['description'] . "', '" . $_POST['serial_number'] . "', " . $_POST['type'] . ", " . $_POST['class'] . ", 1);";
				$result = $conn->query($sql);
				return true;
			}else{
				throw new Exception('Complete all fields');
				return false;
			}
		}
	}
?>