<?php
$names = ['Jean', 'Eric'];

function hello($name) {
    return "Hello $name\n";
}

foreach ($names as $n) {
    echo hello($n);
}
