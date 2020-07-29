<?php

namespace App\Twig;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AlertExtension extends AbstractExtension
{
    /** @var Session */
    protected $session;

    /**
     * AlertExtension constructor.
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }


    public function getFunctions(): array
    {
        return [
            new TwigFunction('alert', [$this, 'alert'], ['is_safe' => ['html']]),
            new TwigFunction('alertFlash', [$this, 'alertFlash'], ['is_safe' => ['html']]),
        ];
    }

    public function alert($message, $type = 'success', $closeable = true)
    {
        $html = "<div class=\"alert alert-$type\">";
        $html .= $message;

        if ($closeable) {
            $html .= "<button class=\"close\" data-dismiss=\"alert\">" .
                     "<span>&times;</span>" .
                     "</button>";
        }

        $html .= "</div>";

        return $html;
    }

    public function alertFlash($type = 'success', $closeable = true)
    {
        if (!$this->session->getFlashBag()->has($type)) {
            return '';
        }

        $message = implode($this->session->getFlashBag()->get($type), '<br>');

        return $this->alert($message, $type, $closeable);
    }
}
