<?php

namespace App\DataFixtures;

use App\Entity\Group;
use App\Service\Slug;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GroupFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            'Les Grabs',
            'Les Rotations',
            'Les Flips',
        ];

        foreach ($categories as $category) {
            $group = new Group();
            $group->setName($category);
            $group->setSlug(Slug::slug($category));
            $manager->persist($group);
        }
        $manager->flush();
    }
}
