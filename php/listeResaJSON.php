<?php
	// Connecte à la base de données
	require "../inc/config.php";

	// Recherche les réservations
	$requete = "SELECT id_resa as title,
				dateArrivee as start,
				dateDepart as end
				FROM Reservation
				ORDER BY id_resa";
	$resultat = $conn->query($requete);

	// Encode au format JSON
	echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));

/*
Format souhaité :
events: [
{
	title: 'DELMONTEIL Patricia',
	url: 'client/client?id=1',
    start: '2018-03-12 10:00:00',
    end: '2018-03-18 10:00:00'
},
{
	title: 'DELRIEU David',
	url: 'client/client?id=2',
    start: '2018-03-19 10:00:00',
    end: '2018-03-25 10:00:00'
}
]

Format actuel :
[
  {
    "title": "1",
    "start": "2018-03-12 10:00:00",
    "end": "2018-03-18 10:00:00"
  },
  {
    "title": "2",
    "start": "2018-03-19 10:00:00",
    "end": "2018-03-25 10:00:00"
  }
]
*/
?>