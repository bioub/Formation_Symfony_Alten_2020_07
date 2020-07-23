<?php

/*
 * Exercice
 * 1 - Créer une classe BankAccount avec 2 propriétés
 * - owner (type string) : propriétaire du compte
 * - balance (type double) : solde du compte
 * Prévoir une valeur par défaut à 0 pour balance
 * 2 - Ajouter les getters / setters sauf setBalance
 * 3 - Créer des méthodes credit($amount) et debit($amount)
 * qui mettront à jour le solde
 * 4 - Dans credit et debit interdire les montants négatifs
 *
 * Le programme suivant doit être fonctionnel
 */

require_once 'classes/BankAccount.php';

try {
    $account = new BankAccount;

    $account->setOwner('Jean');

    echo "Balance : " . $account->getBalance() . "\n"; // 0
    echo "Owner : " . $account->getOwner() . "\n"; // Jean

    $account->credit(1000);
    $account->debit(200);

    echo "Balance : " . $account->getBalance() . "\n"; // 800
}
catch (Exception $e) {
    echo 'Erreur : ' .$e->getMessage() . "\n";
}