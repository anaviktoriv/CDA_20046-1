<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200817100438 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee CHANGE status status enum(\'stock_manager\', \'salesperson\', \'business_salesperson\' )');
        $this->addSql('ALTER TABLE `order` CHANGE status status enum(\'cart\', \'pending\', \'paid\', \'canceled\', \'disputed\', \'refunded\')');
        $this->addSql('ALTER TABLE product ADD unit_price NUMERIC(10, 2) NOT NULL, ADD stock INT NOT NULL, ADD restock_date DATE NOT NULL, ADD stock_min INT NOT NULL, ADD date_added DATE NOT NULL, CHANGE status status enum(\'in_stock\', \'out_of_stock\', \'discontinued\')');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `order` CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE product DROP unit_price, DROP stock, DROP restock_date, DROP stock_min, DROP date_added, CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
