<?php
$dsn = 'mysql:host=localhost;dbname=alten;charset=UTF8';
$user = 'root';
$pass = '';

$pdo = new PDO($dsn, $user, $pass);

$sql = "SELECT id, first_name, last_name FROM contact LIMIT 100";

$stmt = $pdo->query($sql);

$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($contacts as $c) {
    // echo $c['id'] . ' - ' . $c['first_name'] . ' ' . $c['last_name'] . "\n";
    echo "$c[id] - $c[first_name] $c[last_name]\n";
}