<?php
try {
    $bdd = new PDO('mysql:host=localhost:3308;dbname=blog;charset=utf8', 'Matthieu', '1234');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

