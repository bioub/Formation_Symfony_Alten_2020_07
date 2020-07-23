<?php
// Superglobables
// (variables globales, accessibles depuis n'importe quelle fonction)
var_dump($_SERVER);

// Query String parsée
var_dump($_GET); // query string web.php?id=3 => id=3

// POST/PUT/PATCH (Body de la requête parsée)
var_dump($_POST);

// Pas une très bonne pratique
// Fusion de $_GET et $_POST
var_dump($_REQUEST);

// Fichiers uploadés
var_dump($_FILES);

// Cookies
var_dump($_COOKIE);

// Variable d'environnement (du serveur)
var_dump($_ENV);
