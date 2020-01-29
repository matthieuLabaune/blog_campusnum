<?php
include 'config.php';
include 'functions.php';
$num_article = $_GET['id'];
//debug($num_article);
$donnees_article = articleView($bdd, $num_article);
//debug($donnees_article);

if (!empty($_POST)) {
    $resultat = articleModify($bdd, $_POST['titre'], $_POST['text'], $_POST['importance'], $_POST['auteur'], $num_article);
    header('Location: /blog/article.php?id=' . $num_article, true, 302);
    }


?>
<a href="./">Accueil</a>
<a href="articleDelete.php?id=<?=$num_article?>">Supprimer l'article</a>

<form method="post">
    <div class="label">Titre</div>
    <input type="text" name="titre" value="<?= $donnees_article['title'] ?>"/>
    <div class="label">Texte</div>
    <textarea name="text" placeholder="Entrez votre texte"
              rows="5"
              cols="40"><?= $donnees_article['text'] ?></textarea>
    <div class="label">Importance (de 0 à 5)</div>
    <input type="text" name="importance" value="<?= $donnees_article['importance'] ?>"/>
    <div class="label">Identification auteur</div>
    <input type="text" name="auteur" value="<?= $donnees_article['auteurs_id'] ?>"/>
    <button type="submit">Valider l'article</button>
</form>