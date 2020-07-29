<?php


namespace App\Manager;


use App\Entity\Contact;
use Doctrine\Persistence\ManagerRegistry;

class ContactManager {

    /** @var ManagerRegistry */
    protected $doctrine;

    /**
     * ContactManager constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function findAll() {
        $repo = $this->doctrine->getRepository(Contact::class); // lire des entités
        return $repo->findBy([], null, 100); // SELECT cols FROM contact LIMIT 100;
    }

    public function find($id) {
        $repo = $this->doctrine->getRepository(Contact::class);
        return $repo->find($id);
    }

    public function save($entity) {
        $manager = $this->doctrine->getManager();
        $manager->persist($entity);
        $manager->flush();
    }

    public function remove($entity) {
        $manager = $this->doctrine->getManager();
        $manager->remove($entity);
        $manager->flush();
    }
}