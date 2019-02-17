<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findByName($value)
    {
        return $this->createQueryBuilder('Product')
            ->where("Product.name LIKE :val")
            ->setParameter('val','%'.$value.'%')
            ->orderBy('Product.name','ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    public function allData()
    {
        return $this->createQueryBuilder('Product')
            ->orderBy('Product.name','ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    public function findProducts($page)
    {
        return $this->paginatorPrepare($this->createQueryBuilder('Product')
            ->orderBy('Product.name','ASC')
            ->setFirstResult(60 * ($page - 1))
            ->setMaxResults(60)
            ->getQuery()
            ,$page);


    }
    private function paginatorPrepare(Query $query,$page)
    {
        return $query
            ->setFirstResult(60 * ($page - 1))
            ->setMaxResults(60)
            ->getResult()
            ;
    }
    public function findByFilter($brand,$inStock,$minPrice,$maxPrice,$page)
    {
       //TODO create query with params;

    }


    public function productsCount()
    {
        return count($this->findAll());
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
