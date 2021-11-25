<?php

	// Use an autoloader
	require 'libs/Bootstrap.php';
	require 'libs/Controller.php';
	require 'libs/Model.php';
	require 'libs/View.php';

	require 'models/login_model.php';
	require 'models/register_model.php';
	require 'models/modifyuser_model.php';
	require 'models/user_model.php';
	require 'models/inventory_model.php';

	require 'config/paths.php';
	require 'config/database.php';

	$app = new Bootstrap();
?>