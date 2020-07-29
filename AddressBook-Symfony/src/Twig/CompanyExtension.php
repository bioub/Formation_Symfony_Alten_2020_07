<?php

namespace App\Twig;

use App\Manager\CompanyManager;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CompanyExtension extends AbstractExtension
{
    /** @var CompanyManager */
    protected $companyManager;

    /** @var UrlGeneratorInterface */
    protected $generator;

    /** @var RequestStack */
    protected $requestStack;

    /**
     * CompanyExtension constructor.
     * @param CompanyManager $companyManager
     * @param UrlGeneratorInterface $generator
     * @param RequestStack $requestStack
     */
    public function __construct(CompanyManager $companyManager, UrlGeneratorInterface $generator, RequestStack $requestStack)
    {
        $this->companyManager = $companyManager;
        $this->generator = $generator;
        $this->requestStack = $requestStack;
    }


    public function getFunctions(): array
    {
        return [
            new TwigFunction('companyItems', [$this, 'companyItems'], ['is_safe' => ['html']]),
        ];
    }

    public function companyItems()
    {
        $request = $this->requestStack->getCurrentRequest();

        $companies = $this->companyManager->findAll();

        $html = '';

        foreach ($companies as $company) {
            $link = $this->generator->generate('app_contact_listbycompany', ['company' => $company->getId()]);

            $classActive = $request->getRequestUri() === $link ? 'active' : '';

            $html .= <<<STR
<a class="dropdown-item $classActive" href="$link">{$company->getName()}</a>
STR;
        }

        return $html;
    }
}
