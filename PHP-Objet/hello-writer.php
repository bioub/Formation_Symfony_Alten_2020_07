<?php
//$handle = fopen('app.log', 'a');
//fwrite($handle, "Coucou 1\n");
//fwrite($handle, "Coucou 2\n");
//fwrite($handle, "Coucou 3\n");
//fwrite($handle, "Coucou 4\n");
//fclose($handle);

require_once 'vendor/autoload.php';

$writer = new \Ajc\Writer\EchoWriter();
$writer->write('Coucou 1');
$writer->write('Coucou 2');
$writer->write('Coucou 3');
$writer->write('Coucou 4');

function useWriter(\Ajc\Writer\WriterInterface $writer) {
    $writer->write('TEST');
}

useWriter($writer);