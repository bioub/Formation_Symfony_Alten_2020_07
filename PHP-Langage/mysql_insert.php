<?php
if ($argc < 3) {
    echo "Il faut utiliser ce programme comme ceci : php mysql_insert.php PRENOM NOM\n";
    exit(1);
}
$firstName = $argv[1];
$lastName = $argv[2];

$dsn = 'mysql:host=localhost;dbname=alten;charset=UTF8';
$user = 'root';
$pass = '';

$pdo = new PDO($dsn, $user, $pass);

// Faille de sécurité (Injection SQL possible)
$sql = "INSERT INTO contact (first_name, last_name) 
        VALUES('$firstName', '$lastName')";

$result = $pdo->exec($sql);

echo "$result contact créé\n";