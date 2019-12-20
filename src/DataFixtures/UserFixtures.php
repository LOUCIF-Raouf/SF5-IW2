<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $user = (new User())
                ->setLastname($faker->lastName)
                ->setFirstname($faker->firstName)
                ->setGender($faker->randomElement(['a', 'f', 'm']))
                ->setPassword($faker->password)
                ->setEmail($faker->safeEmail)
            ;

            $this->setReference('user'.$i, $user);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
