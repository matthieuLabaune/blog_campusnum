<?php
include 'config.php';
include 'functions.php';

$num_article = $_GET['id'];
$donnees_article = articleView($bdd, $num_article);

if (isset($_POST)) {
    $article_delete = articleDelete($bdd, $num_article);
    if (!$article_delete){
        $error_delete = $bdd->errorInfo()[2];
    } if(isset($error_delete)){
        $error_delete_message = "Attention, vous ne pouvez pas supprimer cet article.";
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

<strong><?= $error_delete_message; ?></strong>