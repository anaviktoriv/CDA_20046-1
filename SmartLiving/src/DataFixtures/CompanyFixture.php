<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompanyFixture extends Fixture
{
    public const LAUGB_COMPANY_REFERENCE = 'laugb-company';
    public const PARIS_COMPANY_REFERENCE = 'paris-company';
    public const ANATR_COMPANY_REFERENCE = 'anatr-company';
    public const RICSU_COMPANY_REFERENCE = 'riscu-company';
    public const RATTC_COMPANY_REFERENCE = 'rattc-company';

    public function load(ObjectManager $manager)
    {
        $company = new Company();
        $company->setName('Laughing Bacchus Wine Cellars');
        $company->setBusinessId('03876786');
        $company->setContactName('Yoshi Tannamuri');
        $manager->persist($company);
        $this->addReference(self::LAUGB_COMPANY_REFERENCE, $company);

        $company = new Company();
        $company->setName('Paris spcialits');
        $company->setBusinessId('04442030');
        $company->setContactName('Marie Bertrand');
        $manager->persist($company);
        $this->addReference(self::PARIS_COMPANY_REFERENCE, $company);

        $company = new Company();
        $company->setName('Ana Trujillo Computadores y telefonos');
        $company->setBusinessId('07643508');
        $company->setContactName('Ana Trujillo');
        $manager->persist($company);
        $this->addReference(self::ANATR_COMPANY_REFERENCE, $company);

        $company = new Company();
        $company->setName('Richter Supermarkt');
        $company->setBusinessId('09943300');
        $company->setContactName('Michael Holz');
        $manager->persist($company);
        $this->addReference(self::RICSU_COMPANY_REFERENCE, $company);

        $company = new Company();
        $company->setName('Rattlesnake Canyon');
        $company->setBusinessId('11213445');
        $company->setContactName('Paula Wilson');
        $manager->persist($company);
        $this->addReference(self::RATTC_COMPANY_REFERENCE, $company);

        $manager->flush();
    }
}
