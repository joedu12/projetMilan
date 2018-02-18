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
           <!-- <article class= "chambre">
                <img src="img/confort2.jpg" alt="confort2">
                <div class="descrption">
                    <h2>Chambre tout confort 2 personnes</h2>
                    <p>Chambre d'hôtel de luxe et tout confort, avec un grand lit double, un combiné baignoire-douche, buffet petit déjeuner compris.</p>
                    <p>25m²</p>
                    <p>2 personnes</p>
                    <p>70.50 €</p>
                </div>
            </article>
            <article class= "chambre">
                <img src="img/confort2.jpg" alt="confort2">
                <div class="description">
                    <h2>Chambre tout confort 4 personnes</h2>
                    <p>Chambre d'hôtel de luxe avec un grand lit double et deux lits simples, combiné baignoire-douche, buffet petit déjeuner compris.</p>
                    <p>29m²</p>
                    <p>4 personnes</p>
                    <p>75 €</p>
                </div>
            </article>
            <article class= "chambre">
                <img src="img/confort2.jpg" alt="confort2">
                <div class="descrption">
                    <h2>Chambre d’hôtel 5 personnes</h2>
                    <p>Chambre d'hôtel cosy et fonctionnelle avec douche en toilettes, boxsprings, deux lits surélevés et petit-déjeuner compris.</p>
                    <p>23m²</p>
                    <p>5 personnes</p>
                    <p>75.50 €</p>
                </div>
            </article>
            <article class= "chambre">
                <img src="img/confort2.jpg" alt="confort2">
                <div class="descrption">
                    <h2>Suite Blanche-Neige 4 personnes</h2>
                    <p>Suite féerique avec un miroir enchanté, deux lits doubles, une combiné baignoire-douche, un coin salon avec des fauteuils royaux et un buffet petit déjeuner copieux.</p>
                    <p>53m²</p>
                    <p>4 personnes</p>
                    <p>100 €</p>
                </div>
            </article>-->
<?php
  require "inc/config.php";

  $result = $conn->prepare('SELECT * FROM Chambre');
  $result->execute();

  while ($data = $result->fetch()) {
    $html = '<article class="chambre">';
    $html .= '<img src="img/chambre-' . $data['id'] . '.jpg">';
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
