<?php

namespace App\DataFixtures;

use App\Entity\Group;
use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class TrickFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $groups = $manager->getRepository(Group::class)->findAll();

        for ($i = 0; $i < 10; $i ++) {
           $trick = new Trick();
           $trick->setName($faker->words(rand(2, 3), true));
           $trick->setDescription($faker->paragraph(2));
           $trick->setTrickGroup($faker->randomElement($groups));
           $manager->persist($trick);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            GroupFixtures::class
        ];
    }
}