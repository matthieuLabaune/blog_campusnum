<?php
include 'config.php';
include 'functions.php';

?>

    <h1>Blogpress : l'actualité sous forme de blog !</h1>
    <a href="articleCreate.php">Ajouter un article</a>
    <hr>
    <hr>


<?php
$articles = articleIndex($bdd);

foreach ($articles as $article) {
    echo '<a href="article.php?id=' . $article['id'] . ' "><h2>' . $article['title'] . '  </h2></a>';
    echo '<p>' . $article['text'] . '</p>';
    echo '<i>Article de ' . $article['forname'] . ' ' . $article['lastname'] . ' rédigé le ' . $article['created_at'] . '.</i> <hr>';
}


//debug($articles);



