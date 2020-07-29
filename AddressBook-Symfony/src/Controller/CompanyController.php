<?php

namespace App\Controller;

use App\Entity\Company;
use App\Manager\CompanyManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/companies")
 */
class CompanyController extends AbstractController
{
    /** @var CompanyManager */
    protected $companyManager;

    /**
     * CompanyController constructor.
     * @param CompanyManager $companyManager
     */
    public function __construct(CompanyManager $companyManager)
    {
        $this->companyManager = $companyManager;
    }

    /**
     * @Route("/")
     */
    public function list()
    {
        $companies = $this->companyManager->findAll();

        return $this->render('company/list.html.twig', [
            'companies' => $companies,
        ]);
    }


    /**
     * @Route("/{companyId}/", requirements={"companyId": "[1-9][0-9]*"})
     */
    public function show($companyId)
    {
        $company = $this->companyManager->find($companyId);

        if (!$company) {
            throw $this->createNotFoundException("Company $companyId not found");
        }

        return $this->render('company/show.html.twig', [
            'company' => $company,
        ]);
    }
}
