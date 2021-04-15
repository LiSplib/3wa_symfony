<?php

namespace App\DataFixtures;

use App\Entity\Adherent;
use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;

class AppFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR');

        foreach(range(0, 50) as $i) {
            $employee = new Employee();
            $employee->setEmail($faker->email());
            $employee->setFirstName(($faker->firstname()));
            $employee->setLastName(($faker->lastName()));
            $employee->setOffice($faker->regexify());
            $employee->setPhoneNumber($faker->phoneNumber());
            $employee->setPassword($faker->regexify());

            $manager->persist($employee);
        }

        foreach(range(50, 199) as $i) {
            $adherent = new Adherent();
            $adherent->setEmail($faker->email());
            $adherent->setFirstName($faker->firstName());
            $adherent->setLastName($faker->lastName());
            $adherent->setPhoneNumber($faker->phoneNumber());
            $adherent->setPassword($faker->regexify('[a-Za-z0-9@&_§%=]{20}'));
            $manager->persist($adherent);
        }

        $manager->flush();

    }
}
