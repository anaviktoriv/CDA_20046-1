<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AddressFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $address = new Address();
        $address->setAddress('1900 Oak Street');
        $address->setZipCode('V3F2K1');
        $address->setCity('Vancouver');
        $address->setCountry('Canada');
        $address->setFullName('Yoshi Tannamuri');
        $address->setIsDefault(true);
        $manager->persist($address);

        $address = new Address();
        $address->setAddress('43 rue St. Laurent');
        $address->setZipCode('H1J1C3');
        $address->setCity('Montreal');
        $address->setCountry('Canada');
        $address->setFullName('Yoshi Tannamuri');
        $address->setIsDefault(false);
        $manager->persist($address);

        $address = new Address();
        $address->setAddress('265, boulevard Charonne');
        $address->setZipCode('75012');
        $address->setCity('Paris');
        $address->setCountry('France');
        $address->setFullName('Marie Bertrand');
        $address->setIsDefault(true);
        $manager->persist($address);

        $address = new Address();
        $address->setAddress('67, rue des Cinquante Otages');
        $address->setZipCode('44000');
        $address->setCity('Nantes');
        $address->setCountry('France');
        $address->setFullName('Marie Bertrand');
        $address->setIsDefault(false);
        $manager->persist($address);

        $address = new Address();
        $address->setAddress('Sierras de Granada 9993');
        $address->setZipCode('05022');
        $address->setCity('Mexico D.F.');
        $address->setCountry('Mexico');
        $address->setFullName('Ana Trujillo');
        $address->setIsDefault(true);
        $manager->persist($address);

        $address = new Address();
        $address->setAddress('Avda. de la Constitucin 2222');
        $address->setZipCode('05021');
        $address->setCity('Mexico D.F.');
        $address->setCountry('Mexico');
        $address->setFullName('Ana Trujillo');
        $address->setIsDefault(false);
        $manager->persist($address);

        $address = new Address();
        $address->setAddress('Grenzacherweg 237');
        $address->setZipCode('1203');
        $address->setCity('Geneve');
        $address->setCountry('Switzerland');
        $address->setFullName('Michael Holz');
        $address->setIsDefault(true);
        $manager->persist($address);

        $address = new Address();
        $address->setAddress('Hauptstr. 29');
        $address->setZipCode('3012');
        $address->setCity('Bern');
        $address->setCountry('Switzerland');
        $address->setFullName('Michael Holz');
        $address->setIsDefault(false);
        $manager->persist($address);

        $address = new Address();
        $address->setAddress('2817 Milton Dr.');
        $address->setZipCode('87110');
        $address->setCity('Albuquerque');
        $address->setCountry('USA');
        $address->setFullName('Paula Wilson');
        $address->setIsDefault(true);
        $manager->persist($address);

        $address = new Address();
        $address->setAddress('2732 Baker Blvd.');
        $address->setZipCode('97403');
        $address->setCity('Eugene');
        $address->setCountry('USA');
        $address->setFullName('Paula Wilson');
        $address->setIsDefault(false);
        $manager->persist($address);

        $manager->flush();
    }
}
