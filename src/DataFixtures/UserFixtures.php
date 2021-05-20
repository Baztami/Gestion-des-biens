<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use function Symfony\Component\String\u;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * @param UserPasswordEncoderInterface $encoder
     * @var UserPasswordEncoderInterface
     *
     */


    public function __construct(UserPasswordEncoderInterface $encoder)
    {

            $this->encoder=$encoder;



    }
    public function load(ObjectManager $manager)
    {


         $user =new User();
         $user->setUsername('demo');
         $user->setPassword($this->encoder->encodePassword($user,'demo'));
         $manager->persist($user);
         $manager->flush();
    }
}
