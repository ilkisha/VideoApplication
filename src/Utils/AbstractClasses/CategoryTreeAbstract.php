<?php

namespace App\Utils\AbstractClasses;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

abstract class CategoryTreeAbstract
{
    public $categoriesArrayFromDb;
    protected static $dbconnection;

    public function __construct(EntityManagerInterface $entityManager,
                                UrlGeneratorInterface $urlGenerator)
    {
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
        $this->categoriesArrayFromDb = $this->getCategories();
    }

    abstract public function getCategoryList(array $categories_array);

    private function getCategories() : array
    {
        if(self::$dbconnection){
            return self::$dbconnection;
        }
        else{
            $conn = $this->entityManager->getConnection();
            $sql = 'SELECT * FROM categories';
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

    }
}