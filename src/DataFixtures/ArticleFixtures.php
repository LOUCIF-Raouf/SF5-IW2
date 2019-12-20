<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        //$users = $manager->getRepository(User::class)->findAll();

        for ($i = 0; $i < 10; $i++) {
            $article = (new Article())
                ->setName($faker->sentence)
                ->setDescription($faker->sentences(10, true))
                ->setCreatedBy($this->getReference('user'.$faker->numberBetween(0, 9)))
            ;

            $manager->persist($article);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
