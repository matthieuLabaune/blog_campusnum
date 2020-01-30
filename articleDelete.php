<?php
include 'config.php';
include 'functions.php';

$num_article = $_GET['id'];
$donnees_article = articleView($bdd, $num_article);

if (isset($_POST)) {
    $article_delete = articleDelete($bdd, $num_article);
    if ($article_delete) {
        header('Location: /blog/', true, 302);
        exit;
    } else {
        echo 'dont work, the base of donnéeee dont work, shit ! sorry';
    }
}


?>

<a href="./">Accueil</a>
<a href="articleModify.php?id=<?= $num_article ?>">Modifier l'article</a>

<h2><?= $donnees_article['title'] ?></h2>
<?= 'Auteur : <i>' . $donnees_article['forname'] . ' ' . $donnees_article['lastname'] . '</i>'; ?>
<?= '<p>' . $donnees_article['text'] . '</p>'; ?>

<form method="POST" action="">
    <input type="hidden" name="id" value=""/>
    <input type="submit" value="Supprimer"/>
</form>

<?//=$error_delete ?>