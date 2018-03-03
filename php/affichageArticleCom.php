<?php

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
      "contenu" => $message,
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
    $html = '<h1>Plat du jour</h1>';
      $html  .= '<header>';
        $html .= '<img src="img/blog/' . $article['id_blog'] . '.jpg" alt="' . $article['titre'] . '"/>';
        $html .= '<h2>' . $article['titre'] . '</h2>';
        $html .= '<time>' . $article['date'] . '</time>';
        $html .= '<p>' . $article['courte_description'] . '</p>';
        $html .= $article['contenu'];
        $html .= '</header>';
        $html .= '<hr/>';
      while ($commentaire = $result->fetch()) {
        $html .= '<section class="commentaire">';
          $html .= '<time>' . $commentaire['date'] . '</time>';
          $html .= '<p class="pseudo">' . $commentaire['pseudo'];
          $html .= '<p>' . $commentaire['contenu'] . '</p>';
        $html .= '</section>';
      }
    $html  .= '</article>';
    echo $html;
?>

    <form class= "blog" action="blog.php?id=<?= $article['id_blog'] ?>" accept-charset="UTF-8" method="POST">
      <label for="pseudo">Pseudo</label>
      <input type="text" id="pseudo" name="pseudo" required>

      <label for="mail">Émail.</label>
      <input type="email" id="mail" name="mail" required>

      <label for="message">Message</label>
      <textarea id="message" name="message" rows="3" placeholder="Écrivez votre commentaire ici." required></textarea>

      <div class="boutons">
        <button type="reset">Annuler</button>
        <button type="submit">Envoyer</button>
      </div>
    </form>

<?php
  } ?>
