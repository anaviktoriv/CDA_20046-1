<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CustomerFixture extends Fixture implements DependentFixtureInterface
{
    public const TANNAMURI_CUSTOMER_REFERENCE = 'tannamuri-customer';
    public const BERTRAND_CUSTOMER_REFERENCE = 'bertrand-customer';
    public const TRUJILLO_CUSTOMER_REFERENCE = 'trujillo-customer';
    public const HOLZ_CUSTOMER_REFERENCE = 'holz-customer';
    public const WILSON_CUSTOMER_REFERENCE = 'wilson-customer';

    public function load(ObjectManager $manager)
    {
        $customer = new Customer();
        $customer->setLastName('Tannamuri');
        $customer->setFirstName('Yoshi');
        $customer->setStatus($this->getReference(StatusFixture::PRO_STATUS_REFERENCE));
        $customer->setCompany($this->getReference(CompanyFixture::LAUGB_COMPANY_REFERENCE));
        $customer->setPhone('(604) 555-3392');
        $manager->persist($customer);
        $this->addReference(self::TANNAMURI_CUSTOMER_REFERENCE, $customer);

        $customer = new Customer();
        $customer->setLastName('Bertrand');
        $customer->setFirstName('Marie');
        $customer->setStatus($this->getReference(StatusFixture::PRO_STATUS_REFERENCE));
        $customer->setCompany($this->getReference(CompanyFixture::PARIS_COMPANY_REFERENCE));
        $customer->setPhone('(1) 42.34.22.66');
        $manager->persist($customer);
        $this->addReference(self::BERTRAND_CUSTOMER_REFERENCE, $customer);

        $customer = new Customer();
        $customer->setLastName('Trujillo');
        $customer->setFirstName('Ana');
        $customer->setStatus($this->getReference(StatusFixture::PRO_STATUS_REFERENCE));
        $customer->setCompany($this->getReference(CompanyFixture::ANATR_COMPANY_REFERENCE));
        $customer->setPhone('(5) 555-4729');
        $manager->persist($customer);
        $this->addReference(self::TRUJILLO_CUSTOMER_REFERENCE, $customer);

        $customer = new Customer();
        $customer->setLastName('Holz');
        $customer->setFirstName('Michael');
        $customer->setStatus($this->getReference(StatusFixture::PRO_STATUS_REFERENCE));
        $customer->setCompany($this->getReference(CompanyFixture::RICSU_COMPANY_REFERENCE));
        $customer->setPhone('0897-034214');
        $manager->persist($customer);
        $this->addReference(self::HOLZ_CUSTOMER_REFERENCE, $customer);

        $customer = new Customer();
        $customer->setLastName('Wilson');
        $customer->setFirstName('Paula');
        $customer->setStatus($this->getReference(StatusFixture::PRO_STATUS_REFERENCE));
        $customer->setCompany($this->getReference(CompanyFixture::RATTC_COMPANY_REFERENCE));
        $customer->setPhone('(505) 555-5939');
        $manager->persist($customer);
        $this->addReference(self::WILSON_CUSTOMER_REFERENCE, $customer);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            StatusFixture::class,
            CompanyFixture::class
        );
    }
}
