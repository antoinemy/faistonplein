<?php

	header("Content-Type: text/xml; charset=UTF-8");
	require('googleMap.php');
	require('database.php');
	
	$map = new GoogleMapAPI('map');
	$map->setAPIKey('AIzaSyBT1WCVABSlr_hfqdriNXDvj6-adFIyrdY');
	
	if($_POST['type'] == "carburantStation"){
		$texte = "<?xml version=\"1.0\"?>\n";
	
		$req = "SELECT nomCar, prixCar FROM ftp_prixcarburant, ftp_carburant WHERE ftp_prixcarburant.idCar = ftp_carburant.idCar AND idSta = ".$_POST['idSta']." ORDER BY prixCar ASC";
		$req = mysqli_query($liaisonbd, $req);
		
		$texte .= "<station>\n";
		while ($row = mysqli_fetch_array($req, MYSQLI_ASSOC)) {
			$texte .= "<nomCar>".$row['nomCar']."</nomCar>\n<prixCar>".$row['prixCar']."</prixCar>";
		}
		$texte .= "\n</station>";
		
		mysqli_free_result($dep);
		mysqli_close($liaisonbd);
	}
	
	if($_POST['type'] == "carburant"){
		$req = "SELECT * FROM ftp_carburant";
		$req = mysqli_query($liaisonbd, $req);
		
		$texte .= "<carburant>\n";
		while ($row = mysqli_fetch_array($req, MYSQLI_ASSOC)) {
			$texte .= "\n<idCar>".$row['idCar']."</idCar>\n<nomCar>".$row['nomCar']."</nomCar>";
		}
		$texte .= "\n</carburant>";
		
		mysqli_free_result($dep);
		mysqli_close($liaisonbd);
	}
	
	if($_POST['type'] == "liste"){
		$req = "SELECT latSta, longiSta, adresseSta FROM ftp_station Sta GROUP BY latSta, longiSta, adresseSta ORDER BY adresseSta ASC";
		$req = mysqli_query($liaisonbd, $req);
		
		$ma_lattitude= $_POST['lat'];
		$ma_longitude= $_POST['long'];
		$distCercle = $_POST['dist'];
		
		$texte .= "<station>\n";
		$texte .= "<latSta>".$ma_lattitude."</latSta>\n<longiSta>".$ma_longitude."</longiSta>\n<distance>0</distance>\n<prixCar>0</prixCar><adresseSta>0</adresseSta>";
		while ($row = mysqli_fetch_array($req, MYSQLI_ASSOC)) {
			$distPoints = $map->geoGetDistance($ma_lattitude, $ma_longitude, $row['latSta'], $row['longiSta'], "K");
			if($distCercle >= $distPoints) {
				$texte .= "\n<latSta>".$row['latSta']."</latSta>\n<longiSta>".$row['longiSta']."</longiSta>\n<distance>".$distPoints."</distance>\n<adresseSta>".$row['adresseSta']."</adresseSta>";
			}
		}
		$texte .= "\n</station>";
		
		mysqli_free_result($dep);
		mysqli_close($liaisonbd);
	}
	
	if($_POST['type'] == "search"){
		$texte = "<?xml version=\"1.0\"?>\n";
	
		$req = "SELECT latVil, longVil, latSta, longiSta, prixCar ";
		$req .= "FROM ftp_station sta, ftp_ville vil, ftp_prixcarburant pri, ftp_carburant car ";
		$req .= "WHERE sta.id_ville = vil.idVil AND sta.idSta = pri.idSta AND pri.idCar = car.idCar ";
		if ($_POST['ville'] != "") {
			$req .= "AND vil.nomVil = '".$_POST['ville']."' ";
		}
		if($_POST['carb'] != 0) {
			$req .= "AND car.idCar = ".$_POST['carb']." ";
		}
		$req .= "AND sta.stationGonflage = ".$_POST['gonf']." ";
		$req .= "AND sta.automateCb = ".$_POST['cb'];
		$req = mysqli_query($liaisonbd, $req);
		
		$distCercle = $_POST['dist'];
		
		$texte .= "<station>\n";
		while ($row = mysqli_fetch_array($req, MYSQLI_ASSOC)) {
			$ville = "\n<latVil>".$row['latVil']."</latVil>\n<longVil>".$row['longVil']."</longVil>\n<distance>".$distCercle."</distance>\n<prixCar>0</prixCar>";
			$distPoints = $map->geoGetDistance($row['latVil'], $row['longVil'], $row['latSta'], $row['longiSta'], "K");
			if($distCercle >= $distPoints) {
				$texte .= "\n<latSta>".$row['latSta']."</latSta>\n<longiSta>".$row['longiSta']."</longiSta>\n<distance>".$distPoints."</distance>\n<prixCar>".$row['prixCar']."</prixCar>";
			}
		}
		$texte .= $ville;
		$texte .= "\n</station>";
		
		mysqli_free_result($dep);
		mysqli_close($liaisonbd);
	}
	
	if($_POST['type'] == "chargePointeurs"){
		$texte = "<?xml version=\"1.0\"?>\n";
	
		$req = "SELECT latSta, longiSta, adresseSta ";
		$req .= "FROM ftp_station Sta, ftp_ville Vil, ftp_prixcarburant Pri, ftp_carburant Car ";
		$req .= "WHERE Sta.id_ville = Vil.idVil AND Sta.idSta = Pri.idSta AND Pri.idCar = Car.idCar ";
		if ($_POST['page'] == "ville") {
			$req .= "AND Vil.latVil = '".$_POST['lat']."' AND Vil.longVil = '".$_POST['long']."' ";
		}
		if($_POST['carburant'] != 0) {
			$req .= "AND Car.idCar = ".$_POST['carburant']." ";
		}
		if($_POST['gonflage'] != 0) {
			$req .= "AND Sta.stationGonflage = ".$_POST['gonflage']." ";
		}
		if($_POST['carteBancaire'] != 0) {
			$req .= "AND Sta.automateCb = ".$_POST['carteBancaire']." ";
		}
		$req .= "GROUP BY latSta, longiSta, adresseSta";
		$req = mysqli_query($liaisonbd, $req);
		
		$latPosition = $_POST['lat'];
		$longPosition = $_POST['long'];
		$distCercle = $_POST['dist'];
		
		$texte .= "<station>\n";
		while ($row = mysqli_fetch_array($req, MYSQLI_ASSOC)) {
			$distPoints = $map->geoGetDistance($latPosition, $longPosition, $row['latSta'], $row['longiSta'], "K");
			if($distCercle >= $distPoints) {
				$texte .= "\n<latSta>".$row['latSta']."</latSta>\n<longiSta>".$row['longiSta']."</longiSta>\n<adresseSta>".$row['adresseSta']."</adresseSta>\n<distance>".$distPoints."</distance>";
			}
		}
		$texte .= "\n</station>";
		
		mysqli_free_result($dep);
		mysqli_close($liaisonbd);
	}
	
	if($_POST['type'] == "afficheStation") {
		$texte = "<?xml version=\"1.0\"?>\n";
	
		$req = "SELECT * FROM ftp_station, ftp_ville WHERE id_ville = idVil AND latSta = '".trim($_POST['lat'])."' AND longiSta = '".trim($_POST['long'])."'";
		$req = mysqli_query($liaisonbd, $req);
		
		$texte .= "<station>\n";
		while ($row = mysqli_fetch_array($req, MYSQLI_ASSOC)) {
			$texte .= "<idSta>".$row['idSta']."</idSta>\n
			<adresseSta>".$row['adresseSta']."</adresseSta>\n
			<latSta>".$row['latSta']."</latSta>\n
			<longiSta>".$row['longiSta']."</longiSta>\n
			<id_ville>".$row['id_ville']."</id_ville>\n
			<non_stop>".$row['non_stop']."</non_stop>\n
			<h_ouvert>".$row['h_ouvert']."</h_ouvert>\n
			<h_ferme>".$row['h_ferme']."</h_ferme>\n
			<saufjour>".$row['saufjour']."</saufjour>\n
			<stationGonflage>".$row['stationGonflage']."</stationGonflage>\n
			<automateCb>".$row['automateCb']."</automateCb>\n
			<cpSta>".$row['cpSta']."</cpSta>
			<nomVil>".$row['nomVil']."</nomVil>";	
		}
		$texte .= "\n</station>";
		
		mysqli_free_result($dep);
		mysqli_close($liaisonbd);
	}
	
	if($_POST['type'] == "autocomplete") {
		$texte = "<?xml version=\"1.0\"?>\n";
	
		$term = strtoupper(trim(strip_tags($_POST['term'])));
		$req = "SELECT idVil, nomVil, cpVil FROM ftp_ville";
		if(is_numeric($term)){
			$req .= " WHERE cpVil LIKE '%".$term."%'";
		}
		else {
			$req .= " WHERE nomVil LIKE '%".$term."%'";
		}
		$req = mysqli_query($liaisonbd, $req);
	    
	    $texte = "<?xml version=\"1.0\"?>\n";
	    $texte .= "<ville>\n";
	    while ($row = mysqli_fetch_array($req, MYSQLI_ASSOC)) {
	    	$texte .= "\n<idVil>".$row['idVil']."</idVil>\n<nomVil>".$row['nomVil']."</nomVil>";
	    }
	    $texte .= "\n</ville>";
	    
	    mysqli_free_result($dep);
		mysqli_close($liaisonbd);
	}
	
	if($_POST['login'] && $_POST['mdp'] && $_POST['mail'] && $_POST['carb']) {
		$login = $_POST['login'];
	    $mdp = md5($_POST['mdp']);
	    $mail = $_POST['mail'];
	    $carb = $_POST['carb'];
	    if($carb === "0") {
	        $carb = null;
	    }
	        
	    $requete = "SELECT loginCpt FROM ftp_compte Where loginCpt = '$login'";
	    $resultat = $dbh->query($requete);
	    if ($resultat->rowCount() == 0) {
	        $stmt = $dbh->prepare("INSERT INTO ftp_compte (loginCpt, mdpCpt, mailCpt, idCarb) VALUES (:login,:mdp,:mail,:carb)");
	        $stmt->bindParam(':login', $login);
	        $stmt->bindParam(':mdp', $mdp); 
	        $stmt->bindParam(':mail', $mail); 
	        $stmt->bindParam(':carb', $carb);
	        $stmt->execute();
	        $texte = "good";
	    }
	    else {
	        $texte = "compte déja existant";
		}
	}
	
	if($_POST['login'] && $_POST['mdp']) {
		$login = $_POST['login'];
	    $mdp = md5($_POST['mdp']);
	    
	    $requete = "SELECT loginCpt, mdpCpt FROM ftp_compte Where loginCpt = '$login' and mdpCpt = '$mdp'";
	    $resultat = $dbh->query($requete);
	    if ($resultat->rowCount() > 0) {
	        $texte = "true";
	    }
	    else {
	        $texte = "login ou mot de passe incorrect";
	        
	    }
	}
	
	echo $texte;
	
?>