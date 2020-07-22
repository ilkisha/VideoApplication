<?php

namespace App\Tests\Utils;

use App\Utils\CategoryTreeFrontPage;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CategoryTest extends KernelTestCase
{
    protected function setUp()
    {
        $kernel = self::bootKernel();
        $urlGenerator = $kernel->getContainer()->get('router');
        $entityManager = $kernel->getContainer()->get('doctrine.orm.entity_manager');
        $obj = new CategoryTreeFrontPage($entityManager, $urlGenerator);
    }
}
