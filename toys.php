
<?php require_once('./requete_sql/connexion.php') ?>
<?php require_once('./requete_sql/functions_sql.php') ?>
<?php require_once('./template/functions_html.php') ?>

<?php require_once('./template/_header.php') ?>
<?php require_once('./template/_navbar.php') ?>

<h1>Accueil</h1>
<div class=" d-flex flex-wrap justify-content-center">
<?php get_all_toys() ?>
</div>
<?php require_once('./template/_footer.php') ?>