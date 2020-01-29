<?php
include 'config.php';
include 'functions.php';

$category_name = $_GET['name'];
//debug($category_name);
$articles_par_categorie = categoryArticle($bdd, $category_name);
//debug($articles_par_categorie);
?>
<a href="./">Accueil</a>
 <h1>Articles de la catégorie "<i><?=$category_name?></i>"</h1>

<?php
foreach ($articles_par_categorie as $article) {
    echo '<h2>' . $article['title'] . '</h2>';
    echo '<p>'. $article['text'] . '</p> <hr>';
}
?>

