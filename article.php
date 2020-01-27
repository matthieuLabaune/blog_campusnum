<?php
include 'config.php';
include 'functions.php';

$num_article = '1';

$articles = articleView($bdd, $num_article);

//foreach ($articles as $article) {
//    echo '<h2>' . $article['title'] . '</h2>';
//}

var_dump($articles);