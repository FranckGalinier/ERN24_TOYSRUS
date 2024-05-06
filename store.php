<?php require_once('./requete_sql/connexion.php') ?>
<?php require_once('./requete_sql/functions_sql.php') ?>
<?php require_once('./template/functions_html.php') ?>


<?php require_once('./template/_header.php')?>
<?php require_once('./template/_navbar.php')?>
<?php
if(isset($_GET['store_id'])){ //si la valeur de store_id est définie
  $store_id = intval($_GET['store_id']);// on récupère l'id dans une variable
  get_title_store($store_id); // on récupère le nom du magasin 
  echo '<div class=" d-flex flex-wrap justify-content-center">';
  get_all_toys_by_store($store_id); // on récupère les jouets par magasin
  echo'</div>';
}


require_once('./template/_footer.php')?>

