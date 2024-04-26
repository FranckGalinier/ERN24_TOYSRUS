<?php require_once('./requete_sql/connexion.php') ?>
<?php require_once('./requete_sql/functions_sql.php') ?>
<?php require_once('./template/functions_html.php') ?>


<?php require_once('./template/_header.php')?>
<?php require_once('./template/_navbar.php')?>
<h1>JOUET PAR MARQUE</h1>
<div class=" d-flex flex-wrap justify-content-center">
<?php
//on récupère l'id passé dans l'url
$brand_id = intval($_GET['brand_id']); //intval passe de string à integer
//on apelle la fonction
get_toy_by_brand($brand_id);
?>
</div>
<?php require_once('./template/_footer.php')?>