<?php

namespace App\Controller;

use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/companies")
 */
class CompanyController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function list()
    {
        $repo = $this->getDoctrine()->getRepository(Company::class);

        $companies = $repo->findBy([], null, 100);

        return $this->render('company/list.html.twig', [
            'companies' => $companies,
        ]);
    }


    /**
     * @Route("/{company}/", requirements={"companyId": "[1-9][0-9]*"})
     */
    public function show(Company $company)
    {
        return $this->render('company/show.html.twig', [
            'company' => $company,
        ]);
    }
}
