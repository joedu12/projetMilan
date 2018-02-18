<!DOCTYPE html>
<html lang="fr">
  <head>
	<meta charset="UTF-8">
	<title>Le Château de Milan</title>
    <meta name="keywords" content="château, hôtel, reservation, milan, luxe, avis">
    <meta name="description" content="Le Château de Milan vous propose ses nombreuses chambres de luxe au meilleur prix.">
    <link rel="icon" href="img/favicon.ico">
  	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <?php require "inc/header.php"; ?>
	<div id="contenu">
		<div id="carousel">
			<figure>			
				<img src="img/chambre-1.jpg" alt="Chambre 1">
				<img src="img/chambre-2.jpg" alt="Chambre 2">
				<img src="img/chambre-3.jpg" alt="Chambre 3">
				<img src="img/chambre-4.jpg" alt="Chambre 4">
			</figure>
		</div>
		<section>
			<header>
			  <h1>Les chambres :</h1><hr/>
			</header>
<?php
  require "inc/config.php";

  $result = $conn->prepare('SELECT * FROM Chambre');
  $result->execute();

  while ($data = $result->fetch()) {
    $html = '<article>';
    $html .= '<h2>' . $data['nom'] . '</h2>';
    $html .= '<p>' . $data['description'] . '</p>';
    $html .= '<p>' . $data['capacite'] . ' personnes</p>';
    $html .= '<p>' . $data['tarif'] . ' €</p>';
    $html .= '</article>';
    echo $html;
  }
  $conn = null;
?>
		</section>
    	<?php require "inc/footer.php"; ?>
	</div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
    <script defer src="js/fontawesome-all.min.js"></script>
  </body>
</html>