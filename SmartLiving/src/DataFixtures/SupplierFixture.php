<?php

namespace App\DataFixtures;

use App\Entity\Supplier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SupplierFixture extends Fixture
{
    public const LEKA_SUPPLIER_REFERENCE = 'leka-supplier';
    public const NAGASE_SUPPLIER_REFERENCE = 'nagase-supplier';
    public const LAUZON_SUPPLIER_REFERENCE = 'lauzon-supplier';
    public const DEVLING_SUPPLIER_REFERENCE = 'devling-supplier';

    public function load(ObjectManager $manager)
    {
        $supplier = new Supplier();
        $supplier->setCountry('Australia');
        $supplier->setCompanyName('Pavlova, Ltd.');
        $supplier->setCity('Melbourne');
        $supplier->setZipCode('3058');
        $supplier->setAddress('74 Rose St. Moonie Ponds');
        $supplier->setFirstName('Ian');
        $supplier->setLastName('Devling');
        $manager->persist($supplier);
        $this->addReference(self::DEVLING_SUPPLIER_REFERENCE, $supplier);

        $supplier = new Supplier();
        $supplier->setCountry('Canada');
        $supplier->setCompanyName('Ma Maison');
        $supplier->setCity('Montreal');
        $supplier->setZipCode('H1J 1C3');
        $supplier->setAddress('2960 Rue St. Laurent');
        $supplier->setFirstName('Jean-Guy');
        $supplier->setLastName('Lauzon');
        $manager->persist($supplier);
        $this->addReference(self::LAUZON_SUPPLIER_REFERENCE, $supplier);

        $supplier = new Supplier();
        $supplier->setCountry('Japan');
        $supplier->setCompanyName('Tokyo Robotics');
        $supplier->setCity('Tokyo');
        $supplier->setZipCode('100');
        $supplier->setAddress('9-8 Sekimai Musashino-shi');
        $supplier->setFirstName('Yoshi');
        $supplier->setLastName('Nagase');
        $manager->persist($supplier);
        $this->addReference(self::NAGASE_SUPPLIER_REFERENCE, $supplier);


        $supplier = new Supplier();
        $supplier->setCountry('Singapore');
        $supplier->setCompanyName('Leka Trading');
        $supplier->setCity('Singapore');
        $supplier->setZipCode('100');
        $supplier->setAddress('471 Serangoon Loop, Suite #402');
        $supplier->setFirstName('Chandra');
        $supplier->setLastName('Leka');
        $manager->persist($supplier);
        $this->addReference(self::LEKA_SUPPLIER_REFERENCE, $supplier);

        $manager->flush();
    }
}
