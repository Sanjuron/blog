<?php

namespace App\DataFixtures;

// use \DateTime;

use App\Entity\Post;
use App\Entity\Tag;

use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');


        for ($i = 1; $i <= 3; $i++) {
            $tag = new Tag(); //définition d'un nouveau tag
            $tag->setName($faker->words($nb = 3, $asText = true)); //associe le tag à un nom
            $manager->persist($tag); // persiste le tag
        }

        $manager->flush();

        for ($i = 1; $i <= 3; $i++) {
            $post = new Post();
            $post->setTitle($faker->sentence($nbWords = 6, $variableNbWords = true)); 
            $post->setBody($faker->text($maxNbChars = 1000) ); 
            $post->setPublishDate($faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null));
            $post->addTag($tag);
            $manager->persist($post); 
        }

        $manager->flush();
    }
}
