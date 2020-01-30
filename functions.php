<?php

/**
 * Fonction de debug
 * @param $var
 */
function debug($var)
{
    highlight_string("<?php\n\n" . var_export($var, true) . ";\n?>");
}

// Fonction doit retourner les 10 derniers articles du blog avec Authors
/**
 * @param PDO $ma_bdd
 * @return array
 */
function articleIndex(PDO $ma_bdd): array
{
    //Requête SQL
    $query = $ma_bdd->query('SELECT articles.id, title, text, lastname, forname, created_at 
FROM articles 
INNER JOIN authors 
ON articles.auteurs_id = authors.id 
ORDER BY created_at DESC');
    $reponse = $query->fetchAll(PDO::FETCH_ASSOC);
    return $reponse;
}

// Fonction articleView() qui a pour paramètre le numéro de l'article RETURN article et auteur
/**
 * @param PDO $ma_bdd
 * @param int $numero_article
 * @return array
 */
function articleView(PDO $ma_bdd, int $numero_article): array
{
    $query = $ma_bdd->query("SELECT articles.id, title, text, lastname, forname, created_at, importance, auteurs_id FROM articles INNER JOIN authors ON articles.auteurs_id = authors.id WHERE articles.id ='$numero_article'");
    $reponse = $query->fetch(PDO::FETCH_ASSOC);
    return $reponse;
}


/**
 * @param PDO $ma_bdd
 * @param int $numero_article
 * @return array
 */
function commentsArticle(PDO $ma_bdd, int $numero_article): array
{
    $query = $ma_bdd->query("SELECT * FROM comments INNER JOIN authors ON comments.authors_id = authors.id WHERE comments.articles_id = '$numero_article'");
    $reponse = $query->fetchAll(PDO::FETCH_ASSOC);
    return $reponse;
}

//Fonction articleCreate() avec paramètres les champs de la table article nécessaires à la création du formulaire

/**
 * @param PDO $ma_bdd
 * @param string $titre
 * @param string $texte
 * @param int $importance
 * @param int $id_author
 * @return bool
 */
function articleCreate(PDO $ma_bdd, string $titre, string $texte, int $importance, int $id_author)
{
    $query = $ma_bdd->prepare('INSERT INTO articles (title, text, importance, auteurs_id)
    VALUES (:title, :text, :importance,:auteurs_id)');
    $state = $query->execute(array(
        'title' => $titre,
        'text' => $texte,
        'importance' => $importance,
        'auteurs_id' => $id_author
    ));
    return $state;
}

//Fonction articleModify() avec paramètres les champs de la table article nécessaires à la modification du formulaire
/**
 * @param PDO $ma_bdd
 * @param $titre
 * @param $texte
 * @param $importance
 * @param $id_author
 * @param $numero_article
 * @return bool
 */
function articleModify(PDO $ma_bdd, $titre, $texte, $importance, $id_author, $numero_article)
{
    $query = $ma_bdd->prepare('UPDATE articles SET title = :newtitle, text = :newtext, importance=:newimportance,auteurs_id = :newauteurs_id 
WHERE articles.id=' . $numero_article);
    $state = $query->execute(array(
        'newtitle' => $titre,
        'newtext' => $texte,
        'newimportance' => $importance,
        'newauteurs_id' => $id_author
    ));
    return $state;
}

//Fonction articleDelete() avec comme parametre le numero de l'article
/**
 * @param PDO $ma_bdd
 * @param int $numero_article
 * @return bool
 */
function articleDelete(PDO $ma_bdd, int $numero_article): bool
{
    $query = $ma_bdd->query('DELETE FROM articles WHERE articles.id=' . $numero_article);
    $state = $query->execute();
    return $state;
}

//Fonction categoryArticle() avec comme paramètre le nom de la catégorie
/**
 * @param PDO $ma_bdd
 * @param $categorie
 * @return array
 */
function categoryArticle(PDO $ma_bdd, $categorie)
{
    $query = $ma_bdd->query('SELECT title, text, importance 
FROM articles 
INNER JOIN correspondance ON articles.id = correspondance.articles_id 
INNER JOIN categories ON correspondance.categories_id = categories.id 
WHERE nom="' . $categorie . '"');
    $reponse = $query->fetchALL(PDO::FETCH_ASSOC);
    return $reponse;
}

//Fonction getCategory() pour trouver la catégorie d'un article depuis l'id de l'article
/**
 * @param PDO $ma_bdd
 * @param int $id_article
 * @return mixed
 */
function getCategorie(PDO $ma_bdd, int $id_article)
{
    $query = $ma_bdd->query('SELECT nom 
FROM categories 
INNER JOIN correspondance ON categories.id = correspondance.categories_id
INNER JOIN articles ON correspondance.articles_id = articles.id
WHERE articles.id=' . $id_article);
    $reponse = $query->fetch(PDO::FETCH_ASSOC);
    return $reponse;
}

// Fonction commentCreate pour créer des commentaires paramètres (bdd, id articles)

/**
 * @param PDO $ma_bdd
 * @param int $id_article
 * @param string $texte
 * @param int $id_author
 * @return bool
 */
function commentCreate(PDO $ma_bdd, int $id_article, string $texte, int $id_author)
{
    $query = $ma_bdd->prepare('INSERT INTO comments (articles_id, text, authors_id)
    VALUES (:articles_id, :text, :auteurs_id)');
    $state = $query->execute(array(
        'articles_id' => $id_article,
        'text' => $texte,
        'auteurs_id' => $id_author
    ));
    return $state;
}
