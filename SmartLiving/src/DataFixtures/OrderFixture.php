<?php

namespace App\DataFixtures;

use App\Entity\Order;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrderFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $order = new Order();
        $order->setDate(new \DateTime('now'));
        $order->setDiscount(0);
        $order->setTotal(1120.99);
        $order->setCustomer($this->getReference(CustomerFixture::TANNAMURI_CUSTOMER_REFERENCE));
        $manager->persist($order);

        $order = new Order();
        $order->setDate(new \DateTime('now'));
        $order->setDiscount(50);
        $order->setTotal(500.00);
        $order->setCustomer($this->getReference(CustomerFixture::TANNAMURI_CUSTOMER_REFERENCE));
        $manager->persist($order);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CustomerFixture::class,
        );
    }
}
