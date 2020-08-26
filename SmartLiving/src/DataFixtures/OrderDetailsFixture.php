<?php

namespace App\DataFixtures;

use App\Entity\OrderDetails;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrderDetailsFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $orderDetails = new OrderDetails();
        $orderDetails->setOrderId($this->getReference(OrderFixture::FIRST_ORDER_REFERENCE));
        $orderDetails->setProduct($this->getReference(ProductFixture::AIRPODS_PRODUCT_REFERENCE));
        $orderDetails->setQuantity(1);
        $orderDetails->setUnitPrice(129.00);
        $manager->persist($orderDetails);

        $orderDetails = new OrderDetails();
        $orderDetails->setOrderId($this->getReference(OrderFixture::FIRST_ORDER_REFERENCE));
        $orderDetails->setProduct($this->getReference(ProductFixture::DRONE_PRODUCT_REFERENCE));
        $orderDetails->setQuantity(1);
        $orderDetails->setUnitPrice(274.99);
        $manager->persist($orderDetails);

        $orderDetails = new OrderDetails();
        $orderDetails->setOrderId($this->getReference(OrderFixture::FIRST_ORDER_REFERENCE));
        $orderDetails->setProduct($this->getReference(ProductFixture::ROBOT_PRODUCT_REFERENCE));
        $orderDetails->setQuantity(1);
        $orderDetails->setUnitPrice(499.00);
        $manager->persist($orderDetails);

        $orderDetails = new OrderDetails();
        $orderDetails->setOrderId($this->getReference(OrderFixture::FIRST_ORDER_REFERENCE));
        $orderDetails->setProduct($this->getReference(ProductFixture::WEBCAM_PRODUCT_REFERENCE));
        $orderDetails->setQuantity(1);
        $orderDetails->setUnitPrice(99.99);
        $manager->persist($orderDetails);

        $orderDetails = new OrderDetails();
        $orderDetails->setOrderId($this->getReference(OrderFixture::FIRST_ORDER_REFERENCE));
        $orderDetails->setProduct($this->getReference(ProductFixture::SPEAKER_PRODUCT_REFERENCE));
        $orderDetails->setQuantity(1);
        $orderDetails->setUnitPrice(99.99);
        $manager->persist($orderDetails);

        $orderDetails = new OrderDetails();
        $orderDetails->setOrderId($this->getReference(OrderFixture::SECOND_ORDER_REFERENCE));
        $orderDetails->setProduct($this->getReference(ProductFixture::AIRPODS_PRODUCT_REFERENCE));
        $orderDetails->setQuantity(1);
        $orderDetails->setUnitPrice(129.00);
        $manager->persist($orderDetails);

        $orderDetails = new OrderDetails();
        $orderDetails->setOrderId($this->getReference(OrderFixture::SECOND_ORDER_REFERENCE));
        $orderDetails->setProduct($this->getReference(ProductFixture::DRONE_PRODUCT_REFERENCE));
        $orderDetails->setQuantity(1);
        $orderDetails->setUnitPrice(274.99);
        $manager->persist($orderDetails);

        $orderDetails = new OrderDetails();
        $orderDetails->setOrderId($this->getReference(OrderFixture::SECOND_ORDER_REFERENCE));
        $orderDetails->setProduct($this->getReference(ProductFixture::ROBOT_PRODUCT_REFERENCE));
        $orderDetails->setQuantity(1);
        $orderDetails->setUnitPrice(499.00);
        $manager->persist($orderDetails);

        $orderDetails = new OrderDetails();
        $orderDetails->setOrderId($this->getReference(OrderFixture::SECOND_ORDER_REFERENCE));
        $orderDetails->setProduct($this->getReference(ProductFixture::WEBCAM_PRODUCT_REFERENCE));
        $orderDetails->setQuantity(1);
        $orderDetails->setUnitPrice(99.99);
        $manager->persist($orderDetails);

        $orderDetails = new OrderDetails();
        $orderDetails->setOrderId($this->getReference(OrderFixture::SECOND_ORDER_REFERENCE));
        $orderDetails->setProduct($this->getReference(ProductFixture::SPEAKER_PRODUCT_REFERENCE));
        $orderDetails->setQuantity(1);
        $orderDetails->setUnitPrice(99.99);
        $manager->persist($orderDetails);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ProductFixture::class,
            OrderFixture::class
        );
    }
}
