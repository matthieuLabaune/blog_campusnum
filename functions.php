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
function articleIndex(PDO $ma_bdd)
{
    //Requête SQL
    $query = $ma_bdd->query('SELECT articles.id, title, text, lastname, forname, created_at FROM articles INNER JOIN authors ON articles.auteurs_id = authors.id ORDER BY created_at DESC');
    $reponse = $query->fetchAll(PDO::FETCH_ASSOC);
    return $reponse;
}

// Fonction articleView() qui a pour paramètre le numéro de l'article RETURN article et auteur
function articleView(PDO $ma_bdd, int $numero_article)
{
    $query = $ma_bdd->query("SELECT articles.id, title, text, lastname, forname, created_at FROM articles INNER JOIN authors ON articles.auteurs_id = authors.id WHERE articles.id ='$numero_article'");
    $reponse = $query->fetch(PDO::FETCH_ASSOC);
    return $reponse;
}

/**
 * Fonction commentsArticle() qui a pour paramètre le numéro de l'article RETURN commentaires de l'article et l'auteur du commentaire
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

function articleCreate(PDO $ma_bdd, string $titre, $texte, $importance, $id_author)
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
function articleModify(PDO $ma_bdd, $titre, $texte, $importance, $id_author, $numero_article)
{
    $query = $ma_bdd->prepare("UPDATE articles (title, text, importance, auteurs_id)
    SET (:title, :text, :importance,:auteurs_id) WHERE articles.id='$numero_article'");
    $state = $query->execute(array(
        'title' => $titre,
        'text' => $texte,
        'importance' => $importance,
        'auteurs_id' => $id_author
    ));
    return $state;
}