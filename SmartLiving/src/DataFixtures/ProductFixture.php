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
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('macbook-pro.jpg');
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
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('robot-maon.jpg');
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
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('drone-apollo13.jpg');
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
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('enceinte-bose.jpg');
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
        $product->setPhoto('webcam-pavlola.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::DEVLING_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::WEBCAMS_CATEGORY_REFERENCE));
        $product->setUnitPrice(99.99);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $product = new Product();
        $product->setTitle('Airpods');
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('airpods.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::LEKA_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::HEADPHONES_CATEGORY_REFERENCE));
        $product->setUnitPrice(129.00);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $product = new Product();
        $product->setTitle('Apple watch');
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('apple-watch.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::LEKA_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::WATCHES_CATEGORY_REFERENCE));
        $product->setUnitPrice(189.88);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $product = new Product();
        $product->setTitle('Enceinte grise');
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('enceinte-gris.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::LAUZON_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::SPEAKERS_CATEGORY_REFERENCE));
        $product->setUnitPrice(19.99);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $product = new Product();
        $product->setTitle('Imac');
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('imac.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::LEKA_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::DESKTOPS_CATEGORY_REFERENCE));
        $product->setUnitPrice(2099.00);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $product = new Product();
        $product->setTitle('Ipad pro');
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('ipad-pro.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::LEKA_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::TABLETS_CATEGORY_REFERENCE));
        $product->setUnitPrice(330.00);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $product = new Product();
        $product->setTitle('Iphone');
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('iphone.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::LEKA_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::MOBILES_CATEGORY_REFERENCE));
        $product->setUnitPrice(612.85);
        $product->setStock(20);
        $product->setRestockDate(new \DateTime('2021-01-01'));
        $product->setStockMin(5);
        $product->setDateAdded(new \DateTime('now'));
        $manager->persist($product);

        $product = new Product();
        $product->setTitle('Enceinte Ikea');
        $product->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id nibh iaculis, rutrum enim in, egestas risus. Cras in congue ante. Nunc lobortis nunc eget varius venenatis.');
        $product->setStatus('in_stock');
        $product->setPhoto('speaker-ikea.jpg');
        $product->setSupplier($this->getReference(SupplierFixture::LAUZON_SUPPLIER_REFERENCE));
        $product->setCategory($this->getReference(CategoryFixture::SPEAKERS_CATEGORY_REFERENCE));
        $product->setUnitPrice(29.00);
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
