<?php

namespace App\DataFixtures;

use App\Entity\Adherent;
use App\Entity\Employee;
use Faker\Factory as Faker;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AppFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR');

        foreach(range(0, 49) as $i) {
            $employee = new Employee();
            $employee->setEmail($faker->email());
            $employee->setFirstName($faker->firstName());
            $employee->setLastName($faker->lastName());
            $employee->setOffice($faker->regexify('[A-Z]{2}[0-9]{3}'));
            $employee->setPhoneNumber($faker->phoneNumber());
            $employee->setPassword($faker->password());
            $manager->persist($employee);
        }

        foreach(range(50, 199) as $i) {
            $adherent = new Adherent();
            $adherent->setAddress($faker->streetAdress());
            $adherent->setZipCode($faker->postcode());
            $adherent->setBirthday($faker->dateTimeBetween('-90 year', '-18 year'));
            $adherent->setEmail($faker->email());
            $adherent->setChildren($faker->randomDigit());
            $adherent->setRegistrationDate($faker->dateTimeBetween());
            $adherent->setUpToDateFee($faker->numberBetween(0,1));
            $adherent->setAvatar($faker->imageUrl(640, 480, 'human', true));
            $adherent->setFirstName($faker->firstName());
            $adherent->setLastName($faker->lastName());
            $adherent->setPhoneNumber($faker->phoneNumber());
            $adherent->setPassword($faker->regexify('[a-Za-z0-9@&_§%=]{20}'));
            $manager->persist($adherent);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        AppFixtures::class;
    }
}
