<?php
function dbConnect() {
    $dsn = 'mysql:host=localhost;dbname=alten;charset=UTF8';
    $user = 'root';
    $pass = '';

    return new PDO($dsn, $user, $pass);
}

function dbGetAllContacts($connect) {
    $sql = "SELECT id, first_name, last_name FROM contact LIMIT 100";

    $stmt = $connect->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}