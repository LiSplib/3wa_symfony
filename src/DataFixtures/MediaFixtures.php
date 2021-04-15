<?php

namespace App\DataFixtures;

use App\Entity\Animation;
use Faker\Factory;
use App\Repository\EmployeeRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MediaFixtures extends Fixture implements DependentFixtureInterface
{

    private $rep;

    public function __construct(EmployeeRepository $rep)
    {
        $this->rep = $rep;
    }

    public function load(ObjectManager $manager)
    {
        // $faker = Factory::create('fr_FR');

        // foreach (range(0, 50) as $i) {
        //     $animation = new Animation();
        // }

        // $manager->flush();
    }

    public function getDependencies()
    {
        AppFixtures::class;
    }

}