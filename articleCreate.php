<?php
include 'config.php';
include 'functions.php';

if (!empty($_POST)) {
    //filter_input()
    $resultat = articleCreate($bdd, $_POST['titre'], $_POST['text'], $_POST['importance'], $_POST['auteur']);
    if ($resultat) {
        $id_article_modif = $bdd->lastInsertId();
        if (is_string($id_article_modif)) {
            // ca a fonctionné !!!
            header('Location: /blog/article.php?id=' . $id_article_modif, true, 302);
            exit;
        } else {
            // Ca a merdé
            echo 'Désolé, la BDD marche pas !!!!!!';
        }
    } else {
        echo 'La raquette SeeeQuElllee na pas marchez !';
    }
} else {
    echo "Merci de remplir le formulaire pour ajouter un article";
}
//debug($_POST);
?>
<hr>
<form action="" method="post">
    <div class="label">Titre</div>
    <input type="text" name="titre" value=""/>
    <div class="label">Texte</div>
    <textarea name="text" placeholder="Entrez votre texte"
              value=" "
              rows="5"
              cols="40"></textarea>
    <div class="label">Importance (de 0 à 5)</div>
    <input type="text" name="importance" value=""/>
    <div class="label">Identification auteur</div>
    <input type="text" name="auteur" value=""/>
    <button type="submit">Valider l'article</button>
</form>

