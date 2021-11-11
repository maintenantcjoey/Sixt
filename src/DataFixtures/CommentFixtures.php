<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Group;
use App\Entity\Trick;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $users = $manager->getRepository(User::class)->findAll();
        $tricks = $manager->getRepository(Trick::class)->findAll();

        for ($i = 0; $i < 50; $i ++) {
            $comment = new Comment();
            $comment->setContent($faker->paragraph(2));
            $comment->setUser($faker->randomElement($users));
            $comment->setTrick($faker->randomElement($tricks));
            $manager->persist($comment);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
       return [
           TrickFixtures::class,
           UserFixtures::class
       ];
    }
}
