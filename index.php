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
			 <div class="reservation">
                <?php require "inc/cadreResa.php"; ?>
			</div>
		</section>
	      <section>
              <div id="description">
                  <h1 class="titre">Bienvenue au Château de Milan <br/> 
                  Hôtel et Restaurant</h1><hr/>
                  <p>JOEVIN ET MARGAUX ONT LE PLAISIR DE VOUS ACCUEILLIR</p>
                    <div class="column">
                            <h2>Hotel <span class="chiffre">4****</span> en bord de mer pour votre séjours</h2>
                            <p>Le Château de Milan hôtel sur Canet-Plage situé sur le front de mer de Canet-en-Roussillon, vous accueille pour un séjour de détente à deux pas de la plage, à 20 minutes de voiture de l’aéroport de Perpignan-Rivesaltes et de la gare de Perpignan. Cet hôtel 4 étoiles est facilement accessible en taxi ou en bus. Les voyageurs qui arrivent en voiture disposent d’un parking public et gratuit hors saison, situé face à l’hôtel. Ses chambres spacieuses et baignées de lumière sont décorées dans le style « bord de mer » . L’hôtel met à votre disposition son salon d’affaires pour vos rencontres professionnelles.</p>
                    
                            <h2>Des chambres claires spacieuses</h2>
                            <p>De catégorie Classique ou Supérieure, nos chambres peuvent accueillir de 2 à 6 personnes et se dotent d’une salle de bain privative possédant des douches à l’italienne avec sèche-cheveux . Depuis la terrasse, vous profiterez d’une vue sur la mer ou sur l’Etang-Canigou. Un coffre-fort est disponible. Situées aux 4e, 5e et 6e étages de l’établissement, les chambres Supérieure offrent en prime le confort de peignoirs, de chaussons et de produits de toilette gratuits Algotherme. Dans ces dernières, vous bénéficierez également d’une machine Nespresso.</p>
                        
                            <h2>Petit-déjeuner et restauration</h2>
                            <p>Dès les premières heures de la journée, que vous souhaitiez profiter de notre salle à manger ensoleillée ou que vous préfériez savourer votre petit-déjeuner au lit, toutes les options sont permises. En buffet ou directement dans votre chambre, vous vous délecterez d’un délicieux assortiment de mets sucrés et salés.</p>
                            
                            <h2>Pour un sejour reussi</h2>
                            <p>Notre personnel parlant français, anglais, espagnol et allemand, vous accueille à la réception ouverte 24h/24 de notre hôtel près de l’aéroport de Perpignan. Pour satisfaire au mieux vos exigences, un business corner avec ordinateur, un service de bagagerie et de cireur, et une douche sont à votre disposition.</p>
                        
                            <h2>Détendez vous a deux pas de la plage</h2>
                            <p>Notre hôtel à Canet-en-Roussillon offre aussi bien des espaces de détente que de travail, ce qui en fait le lieu idéal où séjourner pour vos affaires comme pour vos loisirs. Organisez vos séminaires d’entreprises ou vos conférences dans le salon « le Sardinal », qui accueille de 15 à 25 personnes selon la disposition souhaitée (en U ou en théâtre). Pendant vos moments de pause, sirotez cocktails ou boissons fraîches dans notre bar ouvert de 7h à 2h, adonnez-vous aux nombreuses activités nautiques disponibles au port de Canet, ou détendez-vous sur la plage. Les animaux domestiques sont acceptés sous certaines conditions.</p>
                        <img src="img/hotel.jpg" alt="Hotel">
                  </div>

                </div>
              
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
