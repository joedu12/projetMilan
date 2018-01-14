<!DOCTYPE html>
<html lang="fr">
  <head>
	<meta charset="UTF-8">
	<title>Le Château de Milan</title>
    <meta name="keywords" content="château, hôtel, reservation, milan, luxe, avis">
    <meta name="description" content="Le Château de Milan vous propose ses nombreuses chambres de luxe au meilleur prix.">
    <link rel="icon" href="img/favicon.ico">
  	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width">
  </head>
  <body>
  	<header>
        <nav><a href="index.html" class="logo">Le Château de Milan</a>
            <a href="tarifs.html" class="liens">Tarifs</a>
            <a href="liens-utiles.html" class="liens">Liens utiles</a>
            <a href="contact.html" class="actif">Contact</a>
        </nav>
    </header>
	<section>
        <header>
          <h1>Contact</h1><hr/>
        </header>
<?php
if(isset($_POST) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['mess']) && isset($_POST['formule'])){
  extract($_POST);
  if(!empty($formule) && !empty($tel) && !empty($email) && !empty($mess)){
    $mess=str_replace("\'","'",$mess);
    $destinataire="joevin.soulenq@gmail.com";
    $sujet="Nouveau client !";
    $msg="Un nouveau mail d'un client est arrivé : \n
Téléphone : $tel \n
Email : $email \n
Formule : $formule \n
Message : $mess";
    $entete="Form: $nom \n Replay-To: $email";
    mail($destinataire,$sujet,$msg,$entete);
    echo '<div>';
    echo "Merci &agrave; vous, un mail &agrave; &eacute;t&eacute; envoy&eacute; au g&eacute;rants !";
    echo '</div>';
  }
  else{
    echo '<div>';
    echo "Tout les champs n'ont pas &eacute;t&eacute; remplis, ";
    echo '<a href="" onClick="javascript:window.history.go(-1)">retour ?</a></div>';
  }
}
?>
	</section>
    <footer>Créé par Margaux SARTIEAUX et Joévin SOULENQ.
    </footer>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
