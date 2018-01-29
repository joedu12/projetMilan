<?php
	$server 	= 'localhost';
	$username   = '';
	$password   = '';
	$database   = '';

	try{
		$conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
	    echo "Erreur de connexion : " . $e->getMessage();
	}
?>
