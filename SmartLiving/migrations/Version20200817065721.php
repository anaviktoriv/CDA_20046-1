<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200817065721 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer_address (customer_id INT NOT NULL, address_id INT NOT NULL, INDEX IDX_1193CB3F9395C3F3 (customer_id), INDEX IDX_1193CB3FF5B7AF75 (address_id), PRIMARY KEY(customer_id, address_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer_address ADD CONSTRAINT FK_1193CB3F9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE customer_address ADD CONSTRAINT FK_1193CB3FF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE address ADD country VARCHAR(25) NOT NULL, ADD full_name VARCHAR(255) DEFAULT NULL, ADD is_default TINYINT(1) NOT NULL, DROP last_name, DROP first_name');
        $this->addSql('ALTER TABLE credit_card ADD card_owner_name VARCHAR(255) NOT NULL, ADD is_default TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE customer DROP country, DROP address, DROP zip_code, DROP city');
        $this->addSql('ALTER TABLE employee CHANGE status status enum(\'stock_manager\', \'salesperson\', \'business_salesperson\' )');
        $this->addSql('ALTER TABLE `order` CHANGE status status enum(\'cart\', \'pending\', \'paid\', \'canceled\', \'disputed\', \'refunded\')');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D65AB5B96');
        $this->addSql('DROP INDEX IDX_6D28840D65AB5B96 ON payment');
        $this->addSql('ALTER TABLE payment ADD address_id INT NOT NULL, CHANGE oder_id oder_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D65AB5B96 FOREIGN KEY (oder_id_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_6D28840DF5B7AF75 ON payment (address_id)');
        $this->addSql('CREATE INDEX IDX_6D28840D65AB5B96 ON payment (oder_id_id)');
        $this->addSql('ALTER TABLE product CHANGE status status enum(\'in_stock\', \'out_of_stock\', \'discontinued\')');
        $this->addSql('ALTER TABLE shipping DROP FOREIGN KEY FK_2D1C1724FCDAEAAA');
        $this->addSql('DROP INDEX IDX_2D1C1724FCDAEAAA ON shipping');
        $this->addSql('ALTER TABLE shipping ADD address_id INT NOT NULL, CHANGE order_id order_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE shipping ADD CONSTRAINT FK_2D1C1724F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE shipping ADD CONSTRAINT FK_2D1C1724FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_2D1C1724F5B7AF75 ON shipping (address_id)');
        $this->addSql('CREATE INDEX IDX_2D1C1724FCDAEAAA ON shipping (order_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE customer_address');
        $this->addSql('ALTER TABLE address ADD last_name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD first_name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP country, DROP full_name, DROP is_default');
        $this->addSql('ALTER TABLE credit_card DROP card_owner_name, DROP is_default');
        $this->addSql('ALTER TABLE customer ADD country VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD address VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD zip_code VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD city VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE employee CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `order` CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DF5B7AF75');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D65AB5B96');
        $this->addSql('DROP INDEX IDX_6D28840DF5B7AF75 ON payment');
        $this->addSql('DROP INDEX IDX_6D28840D65AB5B96 ON payment');
        $this->addSql('ALTER TABLE payment ADD oder_id INT NOT NULL, DROP oder_id_id, DROP address_id');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D65AB5B96 FOREIGN KEY (oder_id) REFERENCES `order` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6D28840D65AB5B96 ON payment (oder_id)');
        $this->addSql('ALTER TABLE product CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE shipping DROP FOREIGN KEY FK_2D1C1724F5B7AF75');
        $this->addSql('ALTER TABLE shipping DROP FOREIGN KEY FK_2D1C1724FCDAEAAA');
        $this->addSql('DROP INDEX IDX_2D1C1724F5B7AF75 ON shipping');
        $this->addSql('DROP INDEX IDX_2D1C1724FCDAEAAA ON shipping');
        $this->addSql('ALTER TABLE shipping ADD order_id INT NOT NULL, DROP order_id_id, DROP address_id');
        $this->addSql('ALTER TABLE shipping ADD CONSTRAINT FK_2D1C1724FCDAEAAA FOREIGN KEY (order_id) REFERENCES `order` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2D1C1724FCDAEAAA ON shipping (order_id)');
    }
}
