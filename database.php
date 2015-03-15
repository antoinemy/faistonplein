<?php

	/* Database */
	$host = "localhost";
	$user = "root";
	$password = "root";
	$nombd = "faistonplein";

	/* Liaison Database */
	$liaisonbd = mysqli_connect($host, $user, $password) or die ("Impossible de se connecter");
	mysqli_select_db($liaisonbd, $nombd);

    $dbh = new PDO("mysql:dbname=".$nombd.";host=".$host, $user, $password);

?>