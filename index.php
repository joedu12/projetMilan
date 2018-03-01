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
		<section class="image-cover">
		  <h1 class="titre">Une de nos plus belles chambres</h1>
		  <div style="height: 70px;">
			<a href="#description"><span class="fleche-animee"></span></a>
		  </div>
			 <div id="reservation">
				<form class="flex-container" action="reservation.php" accept-charset="UTF-8" method="GET">
				   <div class="flex-item">
					<label for="dateArrivee"><strong>Date d'arrivée</strong></label>
					<input type="date" name="dateArrivee" id="dateArrivee" class="form-control">
				   </div>
				   <div class="flex-item">
					<label for="dateDepart"><strong>Date de départ</strong></label>
					<input type="date" name="dateDepart" id="dateDepart" class="form-control">
				   </div>
				   <div class="flex-item">
					<label for="personne"><strong>Personnes</strong></label>
						<select class="form-control" id="personne" name="personne">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
						</select>
				  </div>
				  <div class="flex-item">
					<button type="submit" class="form-control"><strong>Envoyer</strong></button>
				  </div>
				</form>
			</div>
		</section>
	      <section>
			  <h1 id="description">Description</h1><hr/>
			  <p>Listes de liens utiles à la réalisation du site internet :</p>
			  <ul>
				  <li><a href="https://www.efteling.com/fr/hotel/junior-suites/suites-junior">Images à récupérer (Efteling)</a></li>
				  <li><a href="https://aubergedubarrez.com/">Inspiration menu n°1</a></li>
				  <li><a href="http://www.hotel-segala-pleinciel.com/fr/musee-soulages">Inspiration menu n°2</a></li>
				  <li><a href="https://codepen.io/anon/pen/LedjJy">Scroll JQuery</a> -> OK</li>
				  <li><a href="https://www.youtube.com/watch?v=wpGNFGqNfdU">Menu responsive</a></li>
			  </ul>
			<p>Nous pouvons vous offrir de magnifiques chambres ! N'hésitez pas à nous <a href="contact.php">contacter</a> et nous vous recontacterons dans les plus brefs délais.</p>
			  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris in gravida sapien, sodales interdum massa. Maecenas ac facilisis neque, id placerat nibh. Vivamus eget elit a odio varius feugiat. Nunc volutpat, eros sit amet elementum elementum, massa tellus cursus dolor, ut fringilla nibh lacus id tellus.</p>
		</section>
		<section>
		<h2>Localisation</h2><hr>
			<p>Notre hôtel est située à Milan, une gare et un arrêt de bus se situent à proximité du château :</p>
		</section>
		<div id="carte"></div>
		<?php require "inc/footer.php"; ?>
	  </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
	<script defer src="js/fontawesome-all.min.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfB1Vyn80rYlpp168WcMZ25KJ0RURm148&callback=initMap">
    </script>

  </body>
</html>
