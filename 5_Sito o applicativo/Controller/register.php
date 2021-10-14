<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		require('../Model/connection.php');
		require('../View/register.php');
	}else{
		require('../View/register.php');
	}
?>