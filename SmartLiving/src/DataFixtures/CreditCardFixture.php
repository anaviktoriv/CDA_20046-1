<?php

namespace App\DataFixtures;

use App\Entity\CreditCard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CreditCardFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $creditCard = new CreditCard();
        $creditCard->setIsDefault(true);
        $creditCard->setCardOwnerName('Yoshi Tannamuri');
        $creditCard->setExpirationDate(new \DateTime('2022-04-01'));
        $creditCard->setNumber('4243558167438791');
        $creditCard->addCustomer($this->getReference(CustomerFixture::TANNAMURI_CUSTOMER_REFERENCE));
        $manager->persist($creditCard);

        $creditCard = new CreditCard();
        $creditCard->setIsDefault(true);
        $creditCard->setCardOwnerName('Marie Bertrand');
        $creditCard->setExpirationDate(new \DateTime('2027-04-01'));
        $creditCard->setNumber('5497442048692340');
        $creditCard->addCustomer($this->getReference(CustomerFixture::BERTRAND_CUSTOMER_REFERENCE));
        $manager->persist($creditCard);

        $creditCard = new CreditCard();
        $creditCard->setIsDefault(true);
        $creditCard->setCardOwnerName('Ana Trujillo');
        $creditCard->setExpirationDate(new \DateTime('2022-08-01'));
        $creditCard->setNumber('5313218624428727');
        $creditCard->addCustomer($this->getReference(CustomerFixture::TRUJILLO_CUSTOMER_REFERENCE));
        $manager->persist($creditCard);

        $creditCard = new CreditCard();
        $creditCard->setIsDefault(true);
        $creditCard->setCardOwnerName('Michael Holz');
        $creditCard->setExpirationDate(new \DateTime('2025-02-01'));
        $creditCard->setNumber('4084035550579178');
        $creditCard->addCustomer($this->getReference(CustomerFixture::HOLZ_CUSTOMER_REFERENCE));
        $manager->persist($creditCard);

        $creditCard = new CreditCard();
        $creditCard->setIsDefault(true);
        $creditCard->setCardOwnerName('Paula Wilson');
        $creditCard->setExpirationDate(new \DateTime('2022-11-01'));
        $creditCard->setNumber('3769291369964408');
        $creditCard->addCustomer($this->getReference(CustomerFixture::WILSON_CUSTOMER_REFERENCE));
        $manager->persist($creditCard);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CustomerFixture::class,
        );
    }
}
