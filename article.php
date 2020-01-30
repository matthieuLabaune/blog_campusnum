<?php
include 'config.php';
include 'functions.php';

$num_article = $_GET['id'];

//debug($num_article);
$article = articleView($bdd, $num_article);
$comments = commentsArticle($bdd, $num_article);

$categorie = getCategorie($bdd, $num_article);
$comments_count = null;
//debug($categorie);
?>

<h1><?= $article['title'] ?></h1>
<hr>
<p><?= $article['text'] ?></p>

<strong> Auteur : </strong> <i> <?= $article['forname'] ?> <?= $article['lastname'] ?> </i>
- <strong> Catégorie
    : </strong> <i> <?= $categorie['nom'] ?> </i>
<hr>

<?php foreach ($comments as $comment): ?>
<?php $comments_count = ?>
    <p><?= $comment['text'] ?></p>
    <p><i> Commentaire de <?= $comment['forname'] ?> <?= $comment['lastname'] ?> posté
            le <?= $comment['created_at'] ?></i></p>
    <hr>
<?php endforeach; ?>

</br>
<a href="./">Accueil</a> |
<a href="category.php?name=<?= $categorie['nom'] ?>">Afficher les articles de la catégorie</a> |
<a href="articleModify.php?id=<?= $num_article ?>">Modifier l'article</a> |
<a href="articleDelete.php?id=<?= $num_article ?>">Supprimer l'article</a> |
<a href="commentCreate.php?id=<?= $num_article ?>">Ajouter un commentaire</a>

