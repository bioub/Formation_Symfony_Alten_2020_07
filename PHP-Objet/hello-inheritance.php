<?php
require_once 'vendor/autoload.php';

$user = new \Ajc\Entity\User();
$user->setUsername('romain')->setPassword('123456');

$admin = new \Ajc\Entity\Admin();
$admin->setUsername('romain')->setPassword('123456')->setCanCreateUser(true);

// polymorphisme
function hello(\Ajc\Entity\User $user) {
    return "Hello " . $user->getUsername() . "\n";
}

echo hello($user); // Hello romain
echo hello($admin); // Hello romain