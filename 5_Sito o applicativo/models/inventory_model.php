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
			$sql = "SELECT * FROM object WHERE type_id=$typeid;";
			$result = $conn->query($sql);
			$out = array();
			while($out[] = $result->fetch_assoc()){}
			return $out;
		}
	}
?>