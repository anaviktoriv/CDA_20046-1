<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture implements DependentFixtureInterface
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('user1@smartlife.com');
        $user->setCustomer($this->getReference(CustomerFixture::TANNAMURI_CUSTOMER_REFERENCE));
        $user->setPassword($this->passwordEncoder->encodePassword($user,'test1'));
        $user->agreeTerms(new \DateTime('now'));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('user2@smartlife.com');
        $user->setCustomer($this->getReference(CustomerFixture::BERTRAND_CUSTOMER_REFERENCE));
        $user->setPassword($this->passwordEncoder->encodePassword($user,'test2'));
        $user->agreeTerms(new \DateTime('now'));
        $manager->persist($user);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CustomerFixture::class,
        );
    }
}
