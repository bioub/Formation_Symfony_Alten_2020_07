<?php


namespace Ajc\Logger;

use Ajc\Writer\WriterInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class Logger implements LoggerInterface
{
    protected $writer;

    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    use LoggerTrait;

    public function log($level, $message, array $context = array())
    {
        // [14:50:04] Error : Erreur à la connection
        $heure = date('H:i:s');
        $this->writer->write("[$heure] $level: $message");
    }
}