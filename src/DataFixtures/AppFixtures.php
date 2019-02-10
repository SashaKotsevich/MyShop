<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use phpDocumentor\Reflection\Types\Integer;


class AppFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();

    }

    public function load(ObjectManager $manager)
    {
        $this->loadProducts($manager);
    }

    public function loadProducts(ObjectManager $manager)
    {
        for ($i = 0; $i < 900; $i++) {
            $product = new Product();
            $product->setName($this->faker->text(50));
            $product->setDescription($this->faker->text(800));
            $product->setDate($this->faker->dateTime);
            $product->setCount($this->faker->numberBetween(1,30));
            $product->setPrice($this->faker->numberBetween(10,300));
            $product->setImage((($i%2)>0)?"/images/image1.png":"/images/image2.png");
            $manager->persist($product);
        }

        $manager->flush();
    }
}
