<?php
require_once 'classes/Entity/Contact.php';

$s1 = 'Jean'; // 1 allocation mémoire
$s2 = $s1; // passage par valeur
// $s2 = &$s1; // passage par référence
$s2 = 'Eric';
echo $s1 . "\n"; // Jean

$o1 = new \Ajc\Entity\Contact(); // 2 allocations mémoires
$o1->setFirstName('Jean');

$o2 = $o1; // passage par référence
// $o2 = clone $o1; // copie de la valeur

$o2->setFirstName('Eric');

echo $o1->getFirstName() . "\n"; // Eric

