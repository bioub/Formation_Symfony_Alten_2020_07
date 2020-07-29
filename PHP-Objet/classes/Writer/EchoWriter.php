<?php


namespace Ajc\Writer;


class EchoWriter implements WriterInterface
{
    public function write($message) {
        echo $message . "\n";
    }
}