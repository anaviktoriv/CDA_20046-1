<?php

namespace App\DataFixtures;

use App\Entity\Order;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrderFixture extends Fixture implements DependentFixtureInterface
{
    public const FIRST_ORDER_REFERENCE = 'first-order';
    public const SECOND_ORDER_REFERENCE = 'second-order';

    public function load(ObjectManager $manager)
    {
        $order = new Order();
        $order->setDate(new \DateTime('now'));
        $order->setDiscount(0);
        $order->setTotal(1120.99);
        $order->setStatus('paid');
        $order->setCustomer($this->getReference(CustomerFixture::TANNAMURI_CUSTOMER_REFERENCE));
        $manager->persist($order);
        $this->addReference(self::FIRST_ORDER_REFERENCE, $order);

        $order = new Order();
        $order->setDate(new \DateTime('now'));
        $order->setDiscount(50);
        $order->setTotal(500.00);
        $order->setStatus('paid');
        $order->setCustomer($this->getReference(CustomerFixture::TANNAMURI_CUSTOMER_REFERENCE));
        $manager->persist($order);
        $this->addReference(self::SECOND_ORDER_REFERENCE, $order);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CustomerFixture::class,
        );
    }
}
