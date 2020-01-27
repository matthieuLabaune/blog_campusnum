<?php

// Fonction doit retourner les 10 derniers articles du blog avec Authors
function articleIndex($ma_bdd)
{
    //Requête SQL
    $query = $ma_bdd->query('SELECT title, text, lastname, forname, created_at FROM articles INNER JOIN authors ON articles.auteurs_id = authors.id ORDER BY created_at DESC');
    $reponse = $query->fetchAll(PDO::FETCH_ASSOC);
    return $reponse;
}

// Fonction articleView() qui a pour paramètre le numéro de l'article RETURN article et auteur
function articleView($ma_bdd, $numero_article)
{
    $query = $ma_bdd->query("SELECT title, text, lastname, forname, created_at FROM articles INNER JOIN authors ON articles.auteurs_id = authors.id WHERE articles.id ='$numero_article'");
    $reponse = $query->fetch(PDO::FETCH_ASSOC);
    return $reponse;
}


// Fonction commentsArticle() qui a pour paramètre le numéro de l'article RETURN commentaires de l'article et l'auteur du commentaire