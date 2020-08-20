<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        $product->setTitle('MacBook Pro 15" Retina');
        $product->setDescription('Découvrez l\'incontournable MacBook Pro, icône de la marque Apple, qui allie à la fois un design épuré et la puissance nécessaire pour vous permettre de gagner en productivité et de vous divertir.');
        $product->setStatus('in_stock');
        $product->setPhoto('macbook_pro.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::LEKA_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::LAPTOPS_CATEGORY_REFERENCE));
        $product->setUnitPrice(2500.00);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $product = new Product();
        $product->setTitle('Robot Humanoïde Familial');
        $product->setDescription('MAON est le premier robot humanoïde créé par Tokyo Robotics. Aujourd\'hui à sa 6ème version, MAON est célèbre dans le monde entier. Formidable outil de programmation, il est devenu une référence dans l\'éducation et la recherche. Egalement utilisé en tant qu\'assistant par les entreprises et établissements de santé, MAON permet d\'accueillir, informer et divertir les visiteurs.');
        $product->setStatus('in_stock');
        $product->setPhoto('robot_maon.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::NAGASE_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::ROBOTS_CATEGORY_REFERENCE));
        $product->setUnitPrice(499.00);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $product = new Product();
        $product->setTitle('Drone Apollo 13');
        $product->setDescription('Décrouvrez le Drone Apollo 13. Il vous suivra dans toutes vos aventures. Profitez d\'une portée 1800 mètres sans égal ainsi que d\'une qualité vidéo 4K impressionnante.');
        $product->setStatus('in_stock');
        $product->setPhoto('drone_apollo13.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::NAGASE_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::DRONES_CATEGORY_REFERENCE));
        $product->setUnitPrice(274.99);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $product = new Product();
        $product->setTitle('Enceinte Bluetooth Bose');
        $product->setDescription('Les enceintes portables Bluetooth Bose sont conçues pour s\'adapter à votre mode de vie actif et vous offrir un son époustouflant en toutes circonstances.');
        $product->setStatus('in_stock');
        $product->setPhoto('enceinte_bose.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::LAUZON_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::SPEAKERS_CATEGORY_REFERENCE));
        $product->setUnitPrice(99.99);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $product = new Product();
        $product->setTitle('Webcam Pavlola');
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('webcam_pavlola.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::DEVLING_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::WEBCAMS_CATEGORY_REFERENCE));
        $product->setUnitPrice(99.99);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            SupplierFixture::class,
            CategoryFixture::class
        );
    }
}
