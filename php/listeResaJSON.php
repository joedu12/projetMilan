<?php
	// Connecte à la base de données
	require "../inc/config.php";

	// Recherche les réservations et le nom des client associés
	$requete = "SELECT CONCAT(nom,' ',prenom) as title,
				dateArrivee as start,
				dateDepart as end
				FROM Reservation
				LEFT JOIN Client
        		ON fk_client = id_client
				ORDER BY id_resa";
	$resultat = $conn->query($requete);

	// Encode au format JSON
	echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
?>