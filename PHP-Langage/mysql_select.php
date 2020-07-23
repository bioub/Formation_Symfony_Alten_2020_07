<?php
$dsn = 'mysql:host=localhost;dbname=alten;charset=UTF8';
$user = 'root';
$pass = '';

$pdo = new PDO($dsn, $user, $pass);

$sql = "SELECT id, first_name, last_name FROM contact LIMIT 100";

$stmt = $pdo->query($sql);

$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
/*
 * [
 *   ['id' => 1, 'first_name' => 'Romain', 'last_name' => 'Bohdanowicz'],
 *   ['id' => 2, 'first_name' => 'Jean', 'last_name' => 'Dupont'],
 * ]
 */

foreach ($contacts as $c) {
    // echo $c['id'] . ' - ' . $c['first_name'] . ' ' . $c['last_name'] . "\n";
    echo "$c[id] - $c[first_name] $c[last_name]\n";
}