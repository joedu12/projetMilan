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
  	<header>
      <nav class="menu-horisontal">
  			<a href="#" onclick="ouvrirMenu()" class="btn-ouvrir"><img src="img/menu.svg" alt="Menu"/></a>
  			<a href="index.html" class="logo">Le Château de Milan</a>
        <a href="hotel.html" class="liens">Hôtel</a>
        <a href="blog.php" class="actif">Blog</a>
        <a href="contact.html" class="liens">Contact</a>
        </nav>
  		<nav id="menu-vertical" class="menu-vertical">
  			<a href="#" onclick="fermerMenu()" class="btn-fermer">&times;</a>
  			<a href="index.html">Accueil</a>
  			<a href="hotel.html">Hôtel</a>
        <a href="blog.php">Blog</a>
        <a href="contact.html">Contact</a>
  		</nav>
    	</header>
	<div id="contenu">
		<section class="blog"> 
<?php
  require "inc/config.php";

  /*
   * Ajoute un commentaire si le formulaire est renseigné
   */
  if(!empty($_POST["pseudo"]) && !empty($_GET["id"])) {
    extract($_POST);

    $req = $conn->prepare('INSERT INTO Commentaire (pseudo, mail, contenu, fk_blog)
                           VALUES (:pseudo, :mail, :contenu, :fk_blog)');

    $req->execute(array(
      "pseudo" => $pseudo,
      "mail" => $mail,
      "contenu" => $contenu,
      "fk_blog" => $_GET["id"]
    ));

    echo "Commentaire créé avec succès !<br/>";
  }

  /*
   * Affiche un article et ses commentaires
   */
  if(!empty($_GET["id"])) {
    $result = $conn->prepare('SELECT * FROM Blog WHERE id_blog = ?');
    $result->execute([$_GET["id"]]);
    $article = $result->fetch();

    $result = $conn->prepare('SELECT * FROM Commentaire WHERE fk_blog = ?');
    $result->execute([$_GET["id"]]);

    $html  = '<article>';
      $html  .= '<header>';
        $html .= '<img src="img/' . $article['id_blog'] . '.jpg"/>';
        $html .= '<h2>' . $article['titre'] . '</h2>';
        $html .= '<time>' . $article['date'] . '</time>';
        $html .= '<p>' . $article['courte_description'] . '</p>';
        $html .= '<p>' . $article['contenu'] . '</p>';
        $html .= '<hr/>';
      $html .= '</header>';
      while ($commentaire = $result->fetch()) {
        $html .= '<section class="commentaire">';
          $html .= '<time>' . $commentaire['date'] . '</time>';
          $html .= '<p class="pseudo">' . $commentaire['pseudo'];
          $html .= '<span> (' . $commentaire['mail'] . ')</span></p>';
          $html .= '<p>' . $commentaire['contenu'] . '</p>';
        $html .= '</section>';
      }
    $html  .= '</article>';
    echo $html;
?>

    <form action="blog.php?id=<?= $article['id_blog'] ?>" accept-charset="UTF-8" method="POST">
      <label for="pseudo">Pseudo</label>
      <input type="text" id="pseudo" name="pseudo">

      <label for="mail">Émail.</label>
      <input type="email" id="mail" name="mail">

      <label for="contenu">Message</label>
      <textarea id="contenu" name="contenu" rows="3" placeholder="Écrivez votre commentaire ici."></textarea>

      <div class="boutons">
        <button type="reset">Annuler</button>
        <button type="submit">Envoyer</button>
      </div>
    </form>
<?php
  }

  /*
   * Affiche la liste des articles
   */
  if (empty($_GET["id"])) {
    // numéro de page par défaut
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1); 

    // nombre d'articles par page
    $limite = 2;

    // numéro du premier enregistrement
    $debut = ($page - 1) * $limite;

    $result = $conn->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM Blog
    	LIMIT :limite OFFSET :debut');
    $result->bindValue('debut', $debut, PDO::PARAM_INT);
    $result->bindValue('limite', $limite, PDO::PARAM_INT);
    $result->execute();

	// Permet de récupérer le nombre d'articles
	$resultNbRow = $conn->query('SELECT found_rows()');
	$nbArticles = $resultNbRow->fetchColumn();

	// articles
    while ($data = $result->fetch()) {
      $html = '<header>';
        $html .= '<a href="blog.php?id=' . $data['id_blog'] . '">';
          $html .= '<img src="img/' . $data['id_blog'] . '.jpg"/>';
          $html .= '<h2>' . $data['titre'] . '</h2>';
          $html .= '<time>' . $data['date'] . '</time>';
        $html .= '</a>';
        $html .= '<p>' . $data['courte_description'] . '</p>';
      $html .= '<hr/></header>';

      echo $html;
    }

    // liens
	$nbPages = ceil($nbArticles / $limite);
	echo '<div class="numero-page">';
	if($page > 1) {
    	echo '<a href="?page=' . ($page - 1) . '">Page précédente</a> -';
    }
    for($i = 1; $i <= $nbPages; $i++) {
    	echo ' <a href="?page=' . $i . '">';
    	if($i == $page) { echo '<b>' . $i . '</b></a>'; }
		else            { echo $i . '</a>'; }
	}
	if($page < $nbPages) {
    	echo  ' - <a href="?page=' . ($page + 1) . '">Page suivante</a>';
	}
	echo '</div>';
  }
  $conn = null;
?>
		</section>
		<footer>Créé par Margaux SARTIEAUX et Joévin SOULENQ.</footer>
	 </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
