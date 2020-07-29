<?php


namespace Ajc\Writer;


class FileWriter implements WriterInterface
{
    protected $handle;

    public function __construct($filename, $mode)
    {
        $this->handle = fopen($filename, $mode);
    }

    public function write($message) {

        fwrite($this->handle, "$message\n");
    }

    public function __destruct()
    {
        fclose($this->handle);
    }
}