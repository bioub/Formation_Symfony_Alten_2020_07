<?php


namespace Ajc\Writer;


class VarDumpWriter implements Writer
{
    public function write($message) {
        var_dump($message);
    }
}