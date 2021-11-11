<?php

namespace App\DataFixtures;

use App\Entity\Group;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    /**
     * @var UserPasswordHasherInterface
     */
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 1; $i < 5; $i ++) {
            $user = new User();
            $user->setPassword($this->encoder->hashPassword($user, 'password'));
            $user->setName($faker->name());
            $user->setEmail("user$i@email.com");
            $user->setIsVerified(true);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
