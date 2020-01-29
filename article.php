<?php
include 'config.php';
include 'functions.php';

$num_article = $_GET['id'];
//debug($num_article);
$article = articleView($bdd, $num_article);
$comments = commentsArticle($bdd, $num_article);

$categorie = getCategorie($bdd, $num_article);
//debug($categorie);
include 'header.php';
?>

<div class="card border-dark mb-3">
    <div class="card-body text-dark">
        <h1 class="card-title"> <?= $article['title'] ?></h1>
        <hr>
        <p class="card-text"><?= $article['text'] ?></p>
    </div>
    <div class="card-footer"><strong> Auteur : </strong> <i> <?= $article['forname'] ?> <?= $article['lastname'] ?> </i>
        - <strong> Catégorie
            : </strong> <i> <?= $categorie['nom'] ?> </i>
    </div>
</div>

<?php foreach ($comments as $comment): ?>

        <p><?= $comment['text'] ?></p>
        <p class="text-secondary text-lg-right font-italic"> Commentaire de <?= $comment['forname'] ?> <?= $comment['lastname'] ?> posté
            le <?= $comment['created_at'] ?></p>
<hr>
<?php endforeach; ?>

</br>
<a href="./">Accueil</a>
<a href="category.php?name=<?= $categorie['nom'] ?> ">Afficher les articles de la catégorie</a>
<a href="articleModify.php?id=<?= $num_article ?>">Modifier l'article</a>
<a href="articleDelete.php?id=<?= $num_article ?>">Supprimer l'article</a>

