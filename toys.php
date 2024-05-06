
<?php require_once('./requete_sql/connexion.php') ?>
<?php require_once('./requete_sql/functions_sql.php') ?>
<?php require_once('./template/functions_html.php') ?>

<?php require_once('./template/_header.php') ?>
<?php require_once('./template/_navbar.php') ?>
<?php 

//Récupération du brand_id par le formulaire 
$brand_id = empty($_POST['brand']) ? 0 : $_POST['brand'];

//Récupération du filtre order par l'url
$order = empty($_GET['order']) ? '' : $_GET['order'];// si la variable order est vide alors on met rien sinon on met la valeur de order


?>
<h1>Accueil</h1>

<form method="POST">
  <select name="brand">
    <option value="0">Toutes les marques</option>
    <?php get_all_brands() ?>
  </select>
  <input type="submit" value="OK">
</form>

<div class=" d-flex flex-wrap justify-content-center">
<?php get_all_toys($brand_id, $order) ?>
</div>
<?php require_once('./template/_footer.php') ?>