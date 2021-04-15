<?php

namespace App\DataFixtures;

use App\Entity\Animation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;

class AnimationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR');

        foreach(range(0, 50) as $i) {
            $animation = new Animation();
            $animation->setStartDate($faker->dateTimeBetween());
            $animation->setEndDate($faker->dateTimeBetween());
            $animation->setTitle($faker->sentence(5));
            $animation->setCapacity($faker->randomNumber(2, true));
            $animation->setIsPublic($faker->boolean());

            $manager->persist($animation);
        }

        $manager->flush();

    }
}
