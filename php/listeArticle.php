<?php
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
          $html .= '<img src="img/blog/' . $data['id_blog'] . '.jpg" alt="' . $data['titre'] . '"/>';
          $html .= '<h2>' . $data['titre'] . '</h2>';
        $html .= '</a>';
          $html .= '<time>' . $data['date'] . '</time>';
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
