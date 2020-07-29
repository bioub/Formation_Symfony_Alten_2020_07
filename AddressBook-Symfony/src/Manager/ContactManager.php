<?php


namespace App\Manager;


use App\Entity\Company;
use App\Entity\Contact;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr;
use Doctrine\Persistence\ManagerRegistry;

class ContactManager
{

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

    public function findAll()
    {
        $repo = $this->doctrine->getRepository(Contact::class); // lire des entités
        return $repo->findBy([], ['lastName' => 'ASC', 'firstName' => 'ASC'], 100); // SELECT cols FROM contact LIMIT 100;
    }

    public function find($id)
    {
        $repo = $this->doctrine->getRepository(Contact::class);
        return $repo->find($id);
    }

//    public function findWithCompany($id) {
//        /** @var EntityManager $manager */
//        $manager = $this->doctrine->getManager();
//        $qb = $manager->createQueryBuilder();
//        $query = $qb
//            ->select()
//            ->from(Contact::class, 'c')
//            ->leftJoin(Company::class, 'cmp')
//            ->where('c.id = :contactId')
//            ->getQuery();
//
//        $query->setParameter('contactId', $id);
//
//        return $query->execute()->getOneOrNullResult();
//    }

    public function findWithCompany($id)
    {
        /** @var EntityManager $manager */
        $manager = $this->doctrine->getManager();

        $dql = "SELECT c, cpm, s, g FROM App\\Entity\\Contact c 
                LEFT JOIN c.company cpm
                LEFT JOIN c.superior s
                LEFT JOIN c.groups g
                WHERE c.id = :contactId";

        return $manager->createQuery($dql)
            ->setParameter('contactId', $id)
            ->getOneOrNullResult();
    }

    public function save($entity)
    {
        $manager = $this->doctrine->getManager();
        $manager->persist($entity);
        $manager->flush();
    }

    public function remove($entity)
    {
        $manager = $this->doctrine->getManager();
        $manager->remove($entity);
        $manager->flush();
    }
}