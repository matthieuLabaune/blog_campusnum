<?php
include 'config.php';
include 'functions.php';

$articles = articleIndex($bdd);
//debug($articles);
?>
    <h1>Blogpress : l'actualité sous forme de blog !</h1>
    <a href="articleCreate.php">Ajouter un article</a>
    <hr>

<?php


foreach ($articles as $article) {
    echo '<a href="article.php?id=' . $article['id'] . ' "><h2>' . $article['title'] . '  </h2></a>';
    echo '<p>' . $article['text'] . '</p>';
    echo '<i>Article de ' . $article['forname'] . ' ' . $article['lastname'] . ' rédigé le ' . $article['created_at'] . '.</i> <hr>';
}
?>



<?php
//debug($articles);



