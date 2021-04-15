<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\CD;
use App\Entity\DVD;
use App\Entity\Journal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;

class MediaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR');

        foreach(range(0, 50) as $i) {
            $book = new Book();
            $book->setPages($faker->randomNumber());

            $book->setTitle($faker->sentence(5));
            $book->setSupport(($faker->randomElement(['electronique', 'papier',])));
            $book->setAcquisitionDate($faker->dateTimeBetween());
            $book->setGenre(($faker->randomElement(['SF', 'Polar','Fantastique', 'Biographie', 'Thriller'])));
            $book->setCote($$faker->regexify('[A-Z]{2}[0-9]{3}'));
            $book->setIllustration($faker->imageUrl(360, 360, 'author'));
            $book->setPresentation($faker->paragraph(2));

            $manager->persist($book);
        }

        foreach(range(50, 100) as $i) {
            $cd = new CD();
            $cd->setPlages($faker->numberBetween(1, 20));
            $cd->setDuration($faker->time('H_i_s'));

            $cd->setTitle($faker->sentence(5));
            $cd->setSupport(($faker->randomElement(['electronique', 'cd',])));
            $cd->setAcquisitionDate($faker->dateTimeBetween());
            $cd->setGenre(($faker->randomElement(['Rap', 'Classique','Funk', 'Reggae', 'Techno'])));
            $cd->setCote($$faker->regexify('[A-Z]{2}[0-9]{3}'));
            $cd->setIllustration($faker->imageUrl(360, 360, 'musique'));
            $cd->setPresentation($faker->paragraph(2));

            $manager->persist($cd);
        }
        foreach(range(100, 150) as $i) {
            $dvd = new DVD();;
            $dvd->setFormat(($faker->randomElement(['Blue-Ray', '4K', 'VOD',])));
            $dvd->setDuration($faker->time('H_i_s'));
            $dvd->setBonus($faker->boolean());

            $dvd->setTitle($faker->sentence(5));
            $dvd->setSupport(($faker->randomElement(['electronique', 'dvd',])));
            $dvd->setAcquisitionDate($faker->dateTimeBetween());
            $dvd->setGenre(($faker->randomElement(['Action', 'Polar','Fantastique', 'Biographie', 'Thriller'])));
            $dvd->setCote($$faker->regexify('[A-Z]{2}[0-9]{3}'));
            $dvd->setIllustration($faker->imageUrl(360, 360, 'dvd'));
            $dvd->setPresentation($faker->paragraph(2));

            $manager->persist($dvd);
        }
        foreach(range(150, 200) as $i) {
            $journal = new Journal();
            $journal->setPeriodicite($faker->randomElement(['Mensuel', 'Trimestriel', 'Hebdomadaire','Quotidien']));
            $journal->setLanguage(($faker->randomElement(['Français', 'Anglais', 'Espagnol','Allemand'])));
            
            $journal->setTitle($faker->sentence(5));
            $journal->setSupport(($faker->randomElement(['electronique', 'papier',])));
            $journal->setAcquisitionDate($faker->dateTimeBetween());
            $journal->setGenre(($faker->randomElement(['Finance', 'Tech','Regionaux', 'Internationaux', 'Nature'])));
            $journal->setCote($$faker->regexify('[A-Z]{2}[0-9]{3}'));
            $journal->setIllustration($faker->imageUrl(360, 360, 'journaux'));
            $journal->setPresentation($faker->paragraph(2));

            $manager->persist($journal);
        }

        $manager->flush();
    }
}
