<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Service\FakeProductGenerator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use phpDocumentor\Reflection\Types\Integer;



class AppFixtures extends Fixture
{
    private $faker;
    private $imageGenerator;

    public function __construct(FakeProductGenerator $fakeProductGenerator)
    {
        $this->faker = Factory::create();
        $this->imageGenerator=$fakeProductGenerator;

    }

    public function load(ObjectManager $manager)
    {
        $this->loadProducts($manager);
    }

    public function loadProducts(ObjectManager $manager)
    {
        for ($i = 0; $i < 900; $i++) {
            $product = new Product();
            $product->setName($this->faker->text(15));
            $product->setDescription($this->faker->text(800));
            $product->setManufaturer($this->faker->company());
            $product->setSize($this->faker->numberBetween(20,50));
            $product->setDate($this->faker->dateTime);
            $product->setCount($this->faker->numberBetween(1,30));
            $product->setPrice($this->faker->numberBetween(100,1000));
            $product->setImage($this->imageGenerator->getRandomImage());
            $manager->persist($product);

        }

        $manager->flush();
    }
}
