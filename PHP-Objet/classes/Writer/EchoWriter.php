<?php


namespace Ajc\Writer;


class EchoWriter implements Writer
{
    public function write($message) {
        echo $message . "\n";
    }
}