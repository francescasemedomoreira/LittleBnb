<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Image;
use App\Entity\Annonce;
use Cocur\Slugify\Slugify;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        // $slugify = new Slugify();
        
        for($i = 0; $i<50; $i++){
            $annonce = new Annonce();
            $annonce->setTitre($faker->sentence(mt_rand(5,10)))
                    // ->setSlug($slugify->slugify($annonce->getTitre()))
                    ->setPrix($faker->randomFloat(2))
                    ->setIntroduction($faker->paragraph(1, true))
                    ->setDescription($faker->paragraphs(mt_rand(2,5), true))
                    ->setImageCouverture('https://loremflickr.com/g/1000/350/building?random=' .$i)
                    ->setChambres($faker->randomDigitNotNull())
                    ->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-1 week', '+1 week')));

            $rand = mt_rand(2,5);
            for ($j=0 ; $j <= $rand ; $j++){
                $image = new Image;
                $image->setUrl('https://loremflickr.com/g/1000/350/building?random=' .$i)
                    ->setLegende($faker->sentence())
                    ->setAnnonce($annonce);
                //persist = pré-sauvegarde
                $manager->persist($image);
            }

            $manager->persist($annonce);
        }
        // $product = new Product();
        // $manager->persist($product);

        //Enregistrement dans la BDD
        $manager->flush();
    }
}
