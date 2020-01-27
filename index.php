<?php
include 'config.php';
include 'functions.php';

$articles = articleIndex($bdd);

foreach ($articles as $article) {
    echo '<h2>'.$article['title'].'</h2>';
    echo '<p>'.$article['text'].'</p>';
    echo '<i>Article de ' .$article['forname'].  ' ' . $article['lastname'] . ' rédigé le ' . $article['created_at'] . '.</i> <hr>' ;
}


//var_dump($liste_articles);



