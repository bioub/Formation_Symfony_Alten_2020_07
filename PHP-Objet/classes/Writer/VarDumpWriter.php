<?php


namespace Ajc\Writer;


class VarDumpWriter implements WriterInterface
{
    public function write($message) {
        var_dump($message);
    }
}