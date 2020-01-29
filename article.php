<?php
include 'config.php';
include 'functions.php';

$num_article = $_GET['id'];
//debug($num_article);
$article = articleView($bdd, $num_article);
$comments = commentsArticle($bdd, $num_article);
?>
    <a href="./">Accueil</a>
    <a href="articleModify.php?id=<?=$num_article?>">Modifier l'article</a>
    <a href="articleDelete.php?id=<?=$num_article?>">Supprimer l'article</a>

    <h2><?= $article['title'] ?></h2>
<?= 'Auteur : <i>' . $article['forname'] . ' ' . $article['lastname'] . '</i>'; ?>
<?= '<p>' . $article['text'] . '</p>'; ?>

    <hr>
<?php foreach ($comments as $comment): ?>
    <h4> Commentaire de <?= $comment['forname'] ?> <?= $comment['lastname'] ?> posté
        le <?= $comment['created_at'] ?></h4>
    <p><?= $comment['text'] ?></p>
<?php endforeach; ?>