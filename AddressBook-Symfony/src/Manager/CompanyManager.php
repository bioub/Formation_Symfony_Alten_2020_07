<?php


namespace App\Manager;


use App\Repository\CompanyRepository;

class CompanyManager
{
    /** @var CompanyRepository */
    protected $companyRepository;

    /**
     * CompanyManager constructor.
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function findAll() {
        return $this->companyRepository->findBy([], null, 100);
    }

    public function find($id) {
        return $this->companyRepository->find($id);
    }
}