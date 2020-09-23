<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixture extends Fixture
{
    public const COMPUTERS_CATEGORY_REFERENCE = 'computer-category';
    public const MOBILES_AND_TABLETS_CATEGORY_REFERENCE = 'mobiles-and-tablets-category';
    public const HOME_SMART_DEVICES_CATEGORY_REFERENCE = 'home-smart-devices-category';
    public const ACCESORIES_CATEGORY_REFERENCE = 'accesories-category';
    public const LAPTOPS_CATEGORY_REFERENCE = 'laptops-category';
    public const ROBOTS_CATEGORY_REFERENCE = 'robots-category';
    public const DRONES_CATEGORY_REFERENCE = 'drones-category';
    public const SPEAKERS_CATEGORY_REFERENCE = 'speakers-category';
    public const WEBCAMS_CATEGORY_REFERENCE = 'webcams-category';
    public const DESKTOPS_CATEGORY_REFERENCE = 'desktops-category';
    public const HEADPHONES_CATEGORY_REFERENCE = 'headphones-category';
    public const WATCHES_CATEGORY_REFERENCE = 'watches-category';
    public const TABLETS_CATEGORY_REFERENCE = 'tablets-category';
    public const MOBILES_CATEGORY_REFERENCE = 'mobiles-category';
    public const GAMES_CONSOLES_CATEGORY_REFERENCE = 'games-consoles-category';

    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('Ordinateurs');
        $category->setParent(null);
        $manager->persist($category);
        $this->addReference(self::COMPUTERS_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('PC portables');
        $category->setParent($this->getReference(self::COMPUTERS_CATEGORY_REFERENCE));
        $manager->persist($category);
        $this->addReference(self::LAPTOPS_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('PC de bureaux');
        $category->setParent($this->getReference(self::COMPUTERS_CATEGORY_REFERENCE));
        $manager->persist($category);
        $this->addReference(self::DESKTOPS_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Téléphones et tablettes');
        $category->setParent(null);
        $manager->persist($category);
        $this->addReference(self::MOBILES_AND_TABLETS_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Téléphones');
        $category->setParent($this->getReference(self::MOBILES_AND_TABLETS_CATEGORY_REFERENCE));
        $manager->persist($category);
        $this->addReference(self::MOBILES_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Tablettes');
        $category->setParent($this->getReference(self::MOBILES_AND_TABLETS_CATEGORY_REFERENCE));
        $manager->persist($category);
        $this->addReference(self::TABLETS_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Consoles de jeux');
        $category->setParent(null);
        $manager->persist($category);
        $this->addReference(self::GAMES_CONSOLES_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Domotique');
        $category->setParent(null);
        $manager->persist($category);
        $this->addReference(self::HOME_SMART_DEVICES_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Enceintes');
        $category->setParent($this->getReference(self::HOME_SMART_DEVICES_CATEGORY_REFERENCE));
        $manager->persist($category);
        $this->addReference(self::SPEAKERS_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Assistants vocaux');
        $category->setParent($this->getReference(self::HOME_SMART_DEVICES_CATEGORY_REFERENCE));
        $manager->persist($category);

        $category = new Category();
        $category->setName('Webcams');
        $category->setParent($this->getReference(self::HOME_SMART_DEVICES_CATEGORY_REFERENCE));
        $manager->persist($category);
        $this->addReference(self::WEBCAMS_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Drones');
        $category->setParent(null);
        $manager->persist($category);
        $this->addReference(self::DRONES_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Robots');
        $category->setParent(null);
        $manager->persist($category);
        $this->addReference(self::ROBOTS_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Accesoires connectés');
        $category->setParent(null);
        $manager->persist($category);
        $this->addReference(self::ACCESORIES_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Montres');
        $category->setParent($this->getReference(self::ACCESORIES_CATEGORY_REFERENCE));
        $manager->persist($category);
        $this->addReference(self::WATCHES_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Ecouteurs');
        $category->setParent($this->getReference(self::ACCESORIES_CATEGORY_REFERENCE));
        $manager->persist($category);
        $this->addReference(self::HEADPHONES_CATEGORY_REFERENCE, $category);

        $category = new Category();
        $category->setName('Casques');
        $category->setParent($this->getReference(self::ACCESORIES_CATEGORY_REFERENCE));
        $manager->persist($category);

        $manager->flush();
    }
}
