<?php

namespace App\DataFixtures;

use App\Entity\CreditCard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CreditCardFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $creditCard = new CreditCard();
        $creditCard->setIsDefault(true);
        $creditCard->setCardOwnerName('Yoshi Tannamuri');
        $creditCard->setExpirationDate(new \DateTime('2022-04-01'));
        $creditCard->setNumber('4243558167438791');
        $manager->persist($creditCard);

        $creditCard = new CreditCard();
        $creditCard->setIsDefault(true);
        $creditCard->setCardOwnerName('Marie Bertrand');
        $creditCard->setExpirationDate(new \DateTime('2027-04-01'));
        $creditCard->setNumber('5497442048692340');
        $manager->persist($creditCard);

        $creditCard = new CreditCard();
        $creditCard->setIsDefault(true);
        $creditCard->setCardOwnerName('Ana Trujillo');
        $creditCard->setExpirationDate(new \DateTime('2022-08-01'));
        $creditCard->setNumber('5313218624428727');
        $manager->persist($creditCard);

        $creditCard = new CreditCard();
        $creditCard->setIsDefault(true);
        $creditCard->setCardOwnerName('Michael Holz');
        $creditCard->setExpirationDate(new \DateTime('2025-02-01'));
        $creditCard->setNumber('4084035550579178');
        $manager->persist($creditCard);

        $creditCard = new CreditCard();
        $creditCard->setIsDefault(true);
        $creditCard->setCardOwnerName('Paula Wilson');
        $creditCard->setExpirationDate(new \DateTime('2022-11-01'));
        $creditCard->setNumber('376929136996440');
        $manager->persist($creditCard);

        $manager->flush();
    }
}
