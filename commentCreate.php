<?php
include 'config.php';
include 'functions.php';

$num_article = intval($_GET['id']);

if (!empty($_POST)) {
    $resultat = commentCreate($bdd, $num_article, $_POST['text'], $_POST['auteur']);
    header('Location: /blog/article.php?id='. $num_article, true, 302);
}
//var_dump($resultat);
?>

<form action="" method="post">
    <div class="label">Texte</div>
    <textarea name="text" placeholder="Entrez votre commentaire"
              value=" "
              rows="5"
              cols="40"></textarea>
    <div class="label">Identification auteur</div>
    <input type="text" name="auteur" value=""/>
    <div class="label">Identification article</div>
    <input type="text" name="id_article" value="<?= $num_article ?>"/>
    <button type="submit">Valider l'article</button>
</form>

<a href="./">Accueil</a>