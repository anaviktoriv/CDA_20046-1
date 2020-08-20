<?php

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatusFixture extends Fixture
{
    public const PRO_STATUS_REFERENCE = 'pro-status';
    public const PAR_STATUS_REFERENCE = 'par-status';

    public function load(ObjectManager $manager)
    {
        $proStatus = new Status();
        $proStatus->setName('professionnel');
        $proStatus->setTax(19);
        $manager->persist($proStatus);
        $this->addReference(self::PRO_STATUS_REFERENCE, $proStatus);

        $parStatus = new Status();
        $parStatus->setName('particulier');
        $parStatus->setTax(21);
        $manager->persist($parStatus);
        $this->addReference(self::PAR_STATUS_REFERENCE, $parStatus);

        $manager->flush();

    }
}
