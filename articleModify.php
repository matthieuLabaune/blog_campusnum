<?php
include 'config.php';
include 'functions.php';


?>

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