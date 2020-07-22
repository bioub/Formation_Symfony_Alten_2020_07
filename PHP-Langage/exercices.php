<?php
function showMax($nb1, $nb2) {
    if ($nb1 > $nb2) {
        echo "$nb1\n";
    } else {
        echo "$nb2\n";
    }
}

showMax(1, 2); // 2
showMax(3, 1); // 3

function showMaxArray($array) {
    echo max($array) . "\n";
}

showMaxArray([1, 5, 3, 6, 7]); // 7

function inverseArray($array) {
    return array_reverse($array);
}

var_dump(inverseArray([1, 2, 3, 4])); // [4, 3, 2, 1]

function inverseKeyValue($array) {
    return array_flip($array);
}

var_dump(inverseKeyValue(['France' => 'Paris'])); // ['Paris' => 'France']
