<?php require_once('./requete/config.php') ?>
<?php require_once('./requete/get_toys.php') ?>
<?php require_once('./template/_toy.php') ?>

<?php require_once('./template/_header.php') ?>
<?php require_once('./template/_navbar.php') ?>

<?php 

//on récupère l'id passé dans l'url
$toy_id = intval($_GET['toy_id']); //intval passe de string à integer
//on apelle la fonction
get_toy_by_id($toy_id)
?>

<?php require_once('./template/_footer.php') ?>