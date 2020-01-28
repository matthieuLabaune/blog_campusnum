<?php
include 'config.php';
include 'functions.php';

$num_article = $_GET['id'];

$articles = articleView($bdd, $num_article);
$comments = commentsArticle($bdd, $num_article);
?>
    <a href="./">Accueil</a>
    <a href="articleModify.php?id=">Modifier l'article</a>
    <a href="articleDelete.php?id=">Supprimer l'article</a>

    <h2><?= $articles['title'] ?></h2>
<?= 'Auteur : <i>' . $articles['forname'] . ' ' . $articles['lastname'] . '</i>'; ?>
<?= '<p>' . $articles['text'] . '</p>'; ?>

    <hr>
<?php foreach ($comments as $comment): ?>
    <h4> Commentaire de <?= $comment['forname'] ?> <?= $comment['lastname'] ?> posté
        le <?= $comment['created_at'] ?></h4>
    <p><?= $comment['text'] ?></p>
<?php endforeach; ?>